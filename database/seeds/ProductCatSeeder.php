<?php

use Illuminate\Database\Seeder;

class ProductCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['cooking oil','fish & seafood','grains, beans & nuts','meat & poultry','vegetables'];
        foreach ( $data as $item){
            DB::table('productcategories')->insert(
                ['prodcatname' => $item]
            );
        }
    }
}
