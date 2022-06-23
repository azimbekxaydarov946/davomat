<?php

namespace App\Repositories\UserDay;

use App\Models\UserDay\UserDay;
use App\Repositories\Repository;

class UserDayRepository extends Repository
{
    public function __construct(UserDay $model)
    {
        $this->model = $model;
    }
}
