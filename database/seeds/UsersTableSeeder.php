<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => str_random('10'),
            'email' => 'hamongkiue@gmail.com',
            'password' => bcrypt('123456'),
            'fullname' => str_random('5').' '.str_random('3').' '.str_random('5'),
            'gender' => array_random(['female', 'male', 'other'], 1),
            'birthday' => '2017-12-12',
            'address' => 'Ho Chi Minh, Viet Nam',
            'phone' => '093893771',
            'point' => 0,
            'vote' => '',
            'region_id' => 1,
            'role_id' => random_int(1,3),

        ]);
        DB::table('users')->insert([
            'username' => str_random('10'),
            'email' => str_random(8).'@gmail.com',
            'password' => bcrypt('123456'),
            'fullname' => str_random('5').' '.str_random('3').' '.str_random('5'),
            'gender' => array_random(['female', 'male', 'other'], 1),
            'birthday' => '2017-12-12',
            'address' => 'Ho Chi Minh, Viet Nam',
            'phone' => '093893771',
            'point' => 0,
            'vote' => '',
            'region_id' => 1,
            'role_id' => random_int(1,3),
        ]);

    }
}
