<?php

namespace App\Http\Controllers;

use App\Exports\MyReadings;
use App\Models\WeightReading;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportModuleController extends Controller
{
    
    public function index(Request $request)
    {
        return view('pages.reports.index');
    }
    public function readingReport(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        if($request->from_date) {
            $fromDate = Carbon::parse($request->from_date);
            $toDate = Carbon::parse($request->to_date);
        }

        $readings = WeightReading::whereBetween('created_at', [$fromDate->startOfDay(), $toDate->endOfDay()])->latest()->get();

        if($request->type == 'excel') {
            $descrition = 'This report contains the scale readings from '. \Carbon\Carbon::parse($fromDate)->toFormattedDateString() .' - '. \Carbon\Carbon::parse($toDate)->toFormattedDateString() . '.';
            $name = \Carbon\Carbon::parse($fromDate)->toFormattedDateString() .' - '. \Carbon\Carbon::parse($toDate)->toFormattedDateString().' scale_reading_report.xlsx';
            return Excel::download(new MyReadings($readings, $descrition), $name);
            
        }
    }
    public function printInk(Request $request, $id)
    {
        $reading = WeightReading::where('readingId', $id)->first();
        return view('pages.reports.exports.print-ink-pdf', compact('reading'));
    }
}
