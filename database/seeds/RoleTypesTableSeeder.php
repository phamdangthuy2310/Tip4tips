<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Manager'
        ]);
        DB::table('users')->insert([
            'name' => 'Consultant'
        ]);
        DB::table('users')->insert([
            'name' => 'Tipster'
        ]);
    }
}
