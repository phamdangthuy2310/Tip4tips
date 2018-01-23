<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiftCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('giftcategories')->insert([
            'name' => 'Electronic',
            'code' => 'electronic'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'House tool',
            'code' => 'housetool'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Accessories',
            'code' => 'accessories'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'activity',
            'code' => 'activity'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Bags',
            'code' => 'bags'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Bikes & Cars',
            'code' => 'bikes&cars'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Clothes',
            'code' => 'clothes'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Cosmetics',
            'code' => 'cosmetics'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Entertaiment',
            'code' => 'entertaiment'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Fine Foods',
            'code' => 'finefoods'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Furniture',
            'code' => 'furniture'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'High Tech',
            'code' => 'hightech'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'House Ware',
            'code' => 'houseware'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Jewels',
            'code' => 'jewels'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Medical',
            'code' => 'medical'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Sport items',
            'code' => 'sportitems'
        ]);
        DB::table('giftcategories')->insert([
            'name' => 'Travel',
            'code' => 'travel'
        ]);

    }
}
