<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Inventory;
use App\Models\Customer;
use App\Models\Payment_method;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Item::factory(10)->create();
//        Inventory::factory(30)->create();
//        Customer::factory(5)->create();
        Payment_method::factory(3)->create();
        Sale::factory(20)->create();
    }
}
