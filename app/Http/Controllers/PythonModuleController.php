<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonModuleController extends Controller
{
    
    public function readings()
    {
        $comport = 'COM3';
        $endpoint = app_path('PythonScripts');
        
        $path = $endpoint."/readings.py";
        $process = new Process(['python3', $path, $comport]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();
        return response()->json(['result' => trim($output)]);
    }
}
