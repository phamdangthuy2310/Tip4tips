<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
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
            'name' => 'Ha Noi',
        ]);
        DB::table('roles')->insert([
            'name' => 'Ho Chi Minh',
        ]);
        DB::table('roles')->insert([
            'name' => 'Da Nang',
        ]);

    }
}
