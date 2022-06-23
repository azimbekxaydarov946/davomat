<?php

namespace App\Services\Department;

use App\Repositories\Department\DepartmentRepository;
use App\Services\Service;

class DepartmentService extends Service{

    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

}

