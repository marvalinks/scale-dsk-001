<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
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
    public function postConfigurations(Request $request)
    {
        $data = $request->validate([
            'port' => 'required', 'script' => 'required'
        ]);
        $config = Configuration::first();
        if($config) {
            $config->update($data);
        }else{
            Configuration::create($data);
        }
        return redirect()->route('portal.configurations');
    }
    public function configurations(Request $request)
    {
        $config = Configuration::first();
        return view('pages.configuration', compact('config'));
    }
}
