<?php

namespace App\Models\Payment;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'date',
        'pay_type',
        'debit_cost',
        'description'
    ];

    public function user()
    {
       return  $this->belongsTo(User::class, 'user_id', 'id');
    }
}
