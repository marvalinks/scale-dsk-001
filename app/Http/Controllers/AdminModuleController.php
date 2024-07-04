<?php

namespace App\Http\Controllers;

use App\Models\WeightReading;
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
    public function readings(Request $request)
    {
        $readings = WeightReading::latest()->paginate(100);
        return view('pages.readings', compact('readings'));
    }
    public function captureDataSave(Request $request)
    {
        $data = $request->validate([
            'weight' => 'required', 'sourceName' => 'required', 'driverName' => 'required',
            'commodityName' => 'required', 'destinationName' => 'required'
        ]);
        $data['accountName'] = auth()->user()->name;
        WeightReading::create($data);
        return redirect()->route('portal.readings');
    }
}
