<?php

namespace App\Repositories\Day;

use App\Models\Day\Day;
use App\Repositories\Repository;

class DayRepository extends Repository{

    protected Day $day;

    public function __construct(Day $day)
    {
        $this->model = $day;
    }
}
