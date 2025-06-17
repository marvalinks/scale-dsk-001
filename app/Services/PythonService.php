<?php

namespace App\Services;

use App\Models\Configuration;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonService
{
    public function readings()
    {

        $config = Configuration::first();
        if(!$config){
            return response()->json(['result' => 0]);
        }
        
        $script = $config->script;
        
        $endpoint = app_path('PythonScripts');
        
        if($config->connection == 'comport') {
            $comport = $config->port;
            $path = $endpoint."/readings.py";
            $command = "$script $path $comport";
            $output = shell_exec($command);
            return trim($output);
        }
        if($config->connection == 'network') {
            $host = $config->ip;
            $port = $config->ip_port;
            $path = $endpoint."/network.py";
            $command = "$script $path $host $port";
            $output = shell_exec($command);
            // dd($output);
            $re = explode(' ', trim($output));
            return floatval(end($re));
        }
        
        // $process = new Process([$script, $path, $comport]);
        // // $process = new Process(['python', $path, $comport]);
        // $process->run();

        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // return trim($process->getOutput());
        
        

        // $path = app_path('PythonScripts');
        // $result = shell_exec("python " . $path . "/weight.py" . " 2>&1");

        // return trim($result);
    }
}
