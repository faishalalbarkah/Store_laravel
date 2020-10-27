<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'id' => 1,
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make(123456),
            'address' => 'Graha Segovia',
            'phone' => "085921311291",
            'status' => 1,
            'user_role_id' => 2,
        ]);
    }
}
