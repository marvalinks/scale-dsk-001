<?php

namespace App\Services;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonService
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

        return trim($process->getOutput());
    }
}
