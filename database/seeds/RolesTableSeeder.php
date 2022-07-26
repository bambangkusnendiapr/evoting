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
        DB::table('roles')->insert([
            'id' => '1',
            'nama' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'nama' => 'Panitia',
        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'nama' => 'Pemilih',
        ]);
    }
}
