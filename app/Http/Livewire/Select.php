<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select extends Component
{
    public $swimmer;
    public $selectedLane;

    public function mount($swimmer, $selectedLane)
    {
        $this->swimmer = $swimmer;
        $this->selectedLane = $selectedLane;
    }

    public function render()
    {
        return view('livewire.select');
    }
}