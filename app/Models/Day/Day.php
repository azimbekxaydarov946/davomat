<?php

namespace App\Models\Day;

use App\Models\Food\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
