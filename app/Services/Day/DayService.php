<?php

namespace App\Services\Day;

use App\Repositories\Day\DayRepository;
use App\Services\Service;

class DayService extends Service{

    public function __construct(DayRepository $repository)
    {
        $this->repository = $repository;
    }

}
