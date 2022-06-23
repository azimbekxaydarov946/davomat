<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Hash::make('1');

        User::create([
            'firstname' => 'Teacher',
            'phone' => '1',
            'is_admin' => true,
            'password' => $data
        ]);
    }
}
