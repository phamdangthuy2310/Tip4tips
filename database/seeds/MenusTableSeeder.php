<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            'name' => 'Community Manager',
            'code' => 'communitymanager',
            'url' => 'communities'
            ]);
        DB::table('menus')->insert([
            'name' => 'Sales Manager',
            'code' => 'salesmanagers',
            'url' => 'sales'
            ]);
        DB::table('menus')->insert([
            'name' => 'Consultants Manager',
            'code' => 'consultantmanager',
            'url' => 'consultants'
            ]);
        DB::table('menus')->insert([
            'name' => 'Tipster Manager',
            'code' => 'tipstermanager',
            'url' => 'tipsters'
            ]);


    }
}
