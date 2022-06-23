<?php

namespace App\Repositories\Department;

use App\Models\Department\Department;
use App\Repositories\Repository;

class DepartmentRepository extends Repository{

    protected Department $department;

    public function __construct(Department $department)
    {
        $this->model = $department;
    }
}
