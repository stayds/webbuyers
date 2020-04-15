<?php

use Illuminate\Database\Seeder;

class OrderstatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['completed','pending','processing'];
        foreach ( $data as $item){
            DB::table('orderstatuses')->insert(
                ['ordstatname' => $item]
            );
        }

    }
}
