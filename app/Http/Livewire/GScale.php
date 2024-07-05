<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PythonModuleController;
use App\Services\PythonService;
use Livewire\Component;

class GScale extends Component
{

    public $comport = "0";
    public $weight = "0";
    public $color = "danger";
    protected $listeners = ['weightTab' => 'testPythonScript'];

    protected $pythonService;

    public function __construct()
    {
        $this->pythonService = new PythonService();
    }

    public function mount()
    {
        session(['weight' => 0]);
        $this->testPythonScript();
    }

    public function testPythonScript()
    {
        // $this->weight = session('weight') ?? 0;

        // $weight = floatval(mt_rand(1, 25));
        // session(['weight' => $weight]);
        // $this->weight = $weight;

        // $path = app_path('PythonScripts');
        // $result = shell_exec("python " . $path . "/weight.py" . " 2>&1");
        
        $result = $this->pythonService->readings();
        if (trim($result) == trim("error")) {
            $this->weight = 0;
            $this->color = "danger";
            session(['weight' => 0]);
        } else {
            $this->weight = $result;
            $this->color = "success";
            session(['weight' => $result]);
        }
    }
    
    
    
    public function render()
    {
        return view('livewire.g-scale');
    }
}
