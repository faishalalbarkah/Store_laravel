<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make(123456),
            'address' => 'Citra Raya',
            'phone' => "085921311291",
            'status' => 1,
            'user_role_id' => 1,
        ]);
    }
}
