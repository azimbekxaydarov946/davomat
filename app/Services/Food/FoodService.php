<?php

namespace App\Services\Food;


use App\Repositories\Food\FoodRepository;
use App\Services\Service;

class FoodService extends Service
{

    public function __construct(FoodRepository $repository)
    {
        $this->repository = $repository;
    }
}
