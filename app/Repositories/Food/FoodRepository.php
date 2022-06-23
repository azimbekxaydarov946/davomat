<?php

namespace App\Repositories\Food;

use App\Models\Food\Food;
use App\Repositories\Repository;

class FoodRepository extends Repository{
    protected Food $food;

    public function __construct(Food $food)
    {
        $this->model = $food;
    }
}
