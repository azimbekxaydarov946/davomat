<?php

namespace App\Http\Livewire\Components;

use App\Models\Day\Day;
use App\Models\Food\Food;
use App\Models\User;
use Livewire\Component;

class UserDay extends Component
{
    public function render()
    {
        $foods = Food::get();
         $days =  Day::get();
         $users = User::get();
        return view('livewire.components.user-day', compact('foods', 'days', 'users'));
    }
}
