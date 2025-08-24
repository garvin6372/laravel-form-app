<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class FormSubmissionController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ni_number' => 'required',
            'utr_number' => 'required',
            'reason' => 'required|in:tax,self assessment,payee',
            'brp_front' => 'nullable|image',
            'brp_back' => 'nullable|image',
            'bank_statement' => 'nullable|mimes:pdf',
            'receipts' => 'nullable|mimes:pdf',
        ]);

        $data = $request->only(['full_name', 'email', 'phone', 'ni_number', 'utr_number', 'reason']);

        if ($request->hasFile('brp_front')) {
            $data['brp_front_url'] = $request->file('brp_front')->store('uploads/brp_front', 'public');
        }
        if ($request->hasFile('brp_back')) {
            $data['brp_back_url'] = $request->file('brp_back')->store('uploads/brp_back', 'public');
        }
        if ($request->hasFile('bank_statement')) {
            $data['bank_statement_url'] = $request->file('bank_statement')->store('uploads/bank_statements', 'public');
        }
        if ($request->hasFile('receipts')) {
            $data['receipts_url'] = $request->file('receipts')->store('uploads/receipts', 'public');
        }

        $submission = FormSubmission::create($data);

        $webhookUrl = 'https://jinnityai.com/ai-kit/webhook-test/00d7a013-96e7-4bed-92a9-4ad1fdf63cfc';
        // $webhookUrl = 'https://jinnityai.app.n8n.cloud/webhook/00d7a013-96e7-4bed-92a9-4ad1fdf63cfc';
        $response = Http::post($webhookUrl, [
            'id' =>  $submission->id,
        ]);
        // 
        return back()->with('success', 'Form submitted successfully!');
    }

    // API: Get form submission by ID (GET /api/form-submissions/{id})
    public function show($id)
    {
        $formSubmission = FormSubmission::find($id);

        if (!$formSubmission) {
            return response()->json([
                'status'  => false,
                'message' => 'Form submission not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data'   => $formSubmission,
        ]);
    }

    public function formSa($id)
    {
        $formSubmission = FormSubmission::find($id);

        if (!$formSubmission) {
            return response()->json([
                'status'  => false,
                'message' => 'Form submission not found',
            ], 404);
        }

        return view('sa100', compact('formSubmission'));
    }

    public function showBankGraph($id)
    {
        $formSubmission = FormSubmission::find($id);
        if(!empty($formSubmission->bank_statement_json)) {

            $json = json_decode(stripslashes($formSubmission->bank_statement_json), true);
            $transactions = $json['output']['transactions'];
    
            return view('bank-graph', compact('transactions'));
        } else {
             return response()->json([
                'status'  => false,
                'message' => 'Bank Statement Not Found',
            ], 404);
        }
    }

    // USA Form
    public function usaForm()
    {
        return view('usa-form');
    }

    public function uploadUsaForm(Request $request)
    {

        $request->validate([
            'files.*' => 'required|mimes:pdf|max:2048', // only pdf allowed
        ]);

        $fileUrls = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads/use_pdf', 'public'); // store in storage/app/public/uploads
                $fileUrls[] = asset('storage/' . $path);
            }
        }
        // dd($files);
        // Call FastAPI
        $response = Http::post('http://pdf_extractor:8000/extract', [
            'urls' => $fileUrls,
        ]);
        
        if ($response->failed()) {
            return back()->withErrors(['api_error' => 'Failed to process PDFs.']);
        }

        $results = $response->json();

        // return back with uploaded files
        return view('usa-form', ['files' => $fileUrls, 'success' => 'Files uploaded successfully!', 'results' => compact('results')]);
    }

    public function sendToWebhook(Request $request)
    {
        $files = $request->input('files', []);

        // Example webhook call
        $response = Http::post('https://jinnityai.com/ai-kit/webhook-test/aac82a15-5da3-49bd-bb1c-39a2fe50a9a7', [
            'files' => $files,
        ]);

        return response()->json([
            'success' => true,
            'response' => $response->json(),
        ]);
    }
}
