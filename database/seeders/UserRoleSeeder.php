<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'id' => 1,
            'name' => 'Administrator'
        ]);

        UserRole::create([
            'id' => 2,
            'name' => 'Customer'
        ]);
    }
}
