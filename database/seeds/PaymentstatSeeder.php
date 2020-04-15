<?php

use Illuminate\Database\Seeder;

class PaymentstatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['failed','success'];
        foreach ( $data as $item){
            DB::table('paymentstatuses')->insert(
                ['paymentstatus' => $item]
            );
        }
    }
}
