<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'id' => 1,
            'name' => 'Cookies'
        ]);
        ProductCategory::create([
            'id' => 2,
            'name' => 'Cakes'
        ]);
    }
}
