<?php

namespace App\Http\Livewire;

use App\Services\PythonService;
use Livewire\Component;

class WScale extends Component
{

    public $comport = "0";
    public $weight = "0";
    public $color = "danger";

    protected $listeners = ['readWeight' => 'testPythonScript', 'weightTab' => 'testPythonScript'];

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
        return view('livewire.w-scale');
    }
}
