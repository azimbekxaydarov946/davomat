<?php

namespace App\Repositories\Payment;

use App\Models\Payment\Payment;
use App\Repositories\Repository;

class PaymentRepository extends Repository{
    protected Payment $payment;

    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }
}
