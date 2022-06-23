<?php

namespace App\Http\Livewire\Components;

use App\Models\Food\Food;
use Livewire\Component;

class DayModel extends Component
{
    public function render()
    {
        $foods = Food::get();
        return view('livewire.components.day-model', compact('foods'));
    }
}
