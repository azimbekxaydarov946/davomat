<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Service;

class UserService extends Service{

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
