<?php

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
//        $this->call(OrderstatSeeder::class);
//        $this->call(PaymentstatSeeder::class);
        $this->call(ProductCatSeeder::class);
        $this->call(RegistermodeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
