<?php

use Illuminate\Database\Seeder;

class RegistermodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['mobile','web'];
        foreach ( $data as $item){
            DB::table('registermodes')->insert(
                ['regmode' => $item]
            );
        }
    }
}
