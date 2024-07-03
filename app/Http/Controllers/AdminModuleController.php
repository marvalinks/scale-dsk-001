<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminModuleController extends Controller
{
    
    public function dashboard(Request $request)
    {
        
        return view('pages.dashboard');
    }
    public function scaleReading(Request $request)
    {
        return view('pages.scale-reading');
    }
    public function captureData(Request $request)
    {
        return view('pages.capture-data');
    }
}
