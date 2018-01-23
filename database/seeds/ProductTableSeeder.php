<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Medical',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Auto/Moto',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Shops',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Factory',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Office',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Home',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Travel',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Student',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Other',
            'description' => '',
            'price' => 0,
            'quality' => 0,
            'category_id' => 5,
        ]);

    }
}
