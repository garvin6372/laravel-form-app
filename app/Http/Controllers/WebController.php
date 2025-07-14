<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function view()
    {
        return view('ui.index');
    }
}
