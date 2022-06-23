<?php

namespace Database\Seeders;

use App\Models\Day\Day;
use Illuminate\Database\Seeder;

class AllDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $year = date("Y");
        $a = '';
        for ($i = 1; $i <= 12; $i++) {
            $countday = cal_days_in_month(CAL_GREGORIAN, $i, $year);
             $a = $year . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
            for ($j = 1; $j <=$countday; $j++) {
            $data = $a . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);
                Day::create([
                    'day' => $data
                ]);
            }
        }
    }
}
