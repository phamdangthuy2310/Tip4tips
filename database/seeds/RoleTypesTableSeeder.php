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
        DB::table('roletypes')->insert([
            'name' => 'Manager',
            'code' => 'manager'
        ]);
        DB::table('roletypes')->insert([
            'name' => 'Consultant',
            'code' => 'consultant'
        ]);
        DB::table('roletypes')->insert([
            'name' => 'Tipster',
            'code' => 'tipster'
        ]);
    }
}
