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
            'username' => 'admin',
            'email' => 'admin@amagumolabs.com',
            'password' => bcrypt('123456'),
            'fullname' => 'Admin',
            'gender' => 1,
            'birthday' => '2017-12-12',
            'address' => 'Ho Chi Minh, Viet Nam',
            'phone' => '093893771',
            'point' => 0,
            'vote' => 0,
            'delete_is' =>1,
            'region_id' => 1,
            'role_id' => 1,

        ]);

    }
}
