<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class WebController extends Controller
{
    public function view()
    {
        return view('ui.index');
    }


public function downloadByPath(Request $request)
{
    $path = $request->get('path'); // Example: uploads/brp_front/abc.jpg

    $filePath = public_path($path);

    if (File::exists($filePath)) {
        return response()->download($filePath);
    } else {
        abort(404, 'File not found.');
    }
}
}
