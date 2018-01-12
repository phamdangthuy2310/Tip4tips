<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('actions')->insert([
            'name' => 'Create',
            'code' => 'create',
        ]);
        DB::table('actions')->insert([
            'name' => 'edit',
            'code' => 'Edit',
        ]);
        DB::table('actions')->insert([
            'name' => 'View',
            'code' => 'view',
        ]);
        DB::table('actions')->insert([
            'name' => 'Delete',
            'code' => 'delete',
        ]);
        DB::table('actions')->insert([
            'name' => 'List',
            'code' => 'list',
        ]);

    }
}
