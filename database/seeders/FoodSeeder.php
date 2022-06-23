<?php

namespace Database\Seeders;

use App\Models\Food\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Tok', 'Makaron', 'Lag\'mon', 'Chuchvara', 'Manti', 'Osh', 'Mastava'];
        for ($i = 0; $i < sizeof($data); $i++) {

    Food::create([
        'name' => $data[$i]
    ]);
}
    }
}
