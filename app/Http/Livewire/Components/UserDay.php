<?php

namespace App\Http\Livewire\Components;

use App\Models\Day\Day;
use App\Models\User;
use Livewire\Component;

class UserDay extends Component
{
    public function render()
    {
         $days =  Day::get();
         $users = User::get();
        return view('livewire.components.user-day', compact( 'days', 'users'));
    }
}
