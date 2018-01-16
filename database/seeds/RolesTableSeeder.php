<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'Admin',
            'code' => 'admin',
            'roletype_id' => 1
        ]);
        DB::table('roles')->insert([
            'name' => 'Community',
            'code' => 'community',
            'roletype_id' => 1
        ]);
        DB::table('roles')->insert([
            'name' => 'Sale',
            'code' => 'sale',
            'roletype_id' => 1,
        ]);
        DB::table('roles')->insert([
            'name' => 'Insurance',
            'code' => 'insurance',
            'roletype_id' => 2,
        ]);
        DB::table('roles')->insert([
            'name' => 'Car',
            'code' => 'car',
            'roletype_id' => 2,
        ]);
        DB::table('roles')->insert([
            'name' => 'Real estate',
            'code' => 'realestate',
            'roletype_id' => 2,
        ]);
        DB::table('roles')->insert([
            'name' => 'Service',
            'code' => 'service',
            'roletype_id' => 2,
        ]);
        DB::table('roles')->insert([
            'name' => 'Ambassador',
            'code' => 'ambassador',
            'roletype_id' => 3,
        ]);
        DB::table('roles')->insert([
            'name' => 'Tipster',
            'code' => 'tipster_normal',
            'roletype_id' => 3,
        ]);


    }
}
