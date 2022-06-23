<?php

namespace App\Http\Livewire\Components;

use App\Services\Food\FoodService;
use Livewire\Component;

class FoodModel extends Component
{
    protected $data;
    protected $service;
    public function boot(FoodService $service)
    {
        $this->service = $service;
    }

    public function store()
    {
      return dd($this->data);
    }
    public function render()
    {
        return view('livewire.components.food-model');
    }
}
