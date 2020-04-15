<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();

        Role::create([
            'name' => 'Super Admin'
        ]);

        Role::create([
            'name'=>'Super Viewer'
        ]);

        Role::create([
            'name'=>'payment'
        ]);
    }
}
