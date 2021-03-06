<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admit extends Component
{
    public function render()
    {
        return view('livewire.admit')
            ->layout('layouts.app',['header' => 'Admittance']);
    }
}
