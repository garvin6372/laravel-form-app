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

        $data = $request->only(['full_name', 'email', 'phone', 'ni_number','utr_number', 'reason']);

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

        $webhookUrl = 'https://jinnityai.app.n8n.cloud/webhook-test/00d7a013-96e7-4bed-92a9-4ad1fdf63cfc';
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
}
