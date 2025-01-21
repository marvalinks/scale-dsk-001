<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Configuration extends Component
{
    public $config;
    public $connection;

    public function mount($config)
    {
        $this->config = $config;
        $this->connection = $config->connection;
    }
    public function render()
    {
        return view('livewire.configuration');
    }
}
