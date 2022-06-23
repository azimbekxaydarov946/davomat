<?php

namespace App\Services\Payment;

use App\Repositories\Payment\PaymentRepository;
use App\Services\Service;

class PaymentService extends Service
{

    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }
}
