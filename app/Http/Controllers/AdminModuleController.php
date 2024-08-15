<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\WeightReading;
use App\Models\WeightReadingSecond;
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
    public function deleteReadings(Request $request, $id)
    {
        $reading = WeightReading::where('readingId', $id)->first();
        $reading->delete();
        $second = WeightReadingSecond::where('readingId', $id)->first();
        if($second)
        {
            $second->delete();
        }
        return back();
    }
    public function secondReadings(Request $request, $id)
    {
        $reading = WeightReading::where('readingId', $id)->first();
        return view('pages.second-data', compact('reading'));
    }
    public function secondReadingsPost(Request $request, $id)
    {
        $reading = WeightReading::where('readingId', $id)->first();
        $data = $request->validate([
            'weight' => 'required', 'sourceName' => 'required', 'driverName' => 'required',
            'commodityName' => 'required', 'destinationName' => 'required'
        ]);
        if(floatval($data['weight']) == floatval(0)){
            return back();
        }
        $data['accountName'] = auth()->user()->name;
        $data['readingId'] = $reading->readingId;
        WeightReadingSecond::create($data);
        return redirect()->route('portal.readings');
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
        if(floatval($data['weight']) == floatval(0)){
            return back();
        }
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
