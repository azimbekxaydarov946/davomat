<?php

namespace App\Services\UserDay;

use App\Repositories\UserDay\UserDayRepository;
use App\Services\Service;

class UserDayService extends Service{

    public function __construct(UserDayRepository $repository)
    {
        $this->repository = $repository;
    }
}
