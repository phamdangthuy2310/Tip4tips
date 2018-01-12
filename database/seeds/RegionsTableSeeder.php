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
        DB::table('regions')->insert([
            'name' => 'Ha Noi',
        ]);
        DB::table('regions')->insert([
            'name' => 'Ho Chi Minh',
        ]);
        DB::table('regions')->insert([
            'name' => 'Da Nang',
        ]);
        DB::table('regions')->insert([
            'name' => 'Nha Trang',
        ]);
    }
}
