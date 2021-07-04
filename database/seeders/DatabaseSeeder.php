<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tax;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name'=>'t-shirt','price'=>50]);
        Product::create(['name'=>'shoe','price'=>120]);
        Tax::create(['name'=>'tax1','value'=>0.1]);
        Tax::create(['name'=>'tax2','value'=>0.05]);
    }
}
