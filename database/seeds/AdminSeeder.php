<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('admins')->insert([
            'fname' => 'developer',
            'lname' => 'bulkbuyer',
            'password'=> Hash::make('password1'),
            'email' => 'dev@bulkbuyer.com',
            'phone' => '09011111111',
            'address' => $faker->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);



    }
}
