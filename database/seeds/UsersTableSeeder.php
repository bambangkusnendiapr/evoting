<?php

use Illuminate\Database\Seeder;
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
            'name' => 'Yuda Muhtar',
            'email' => 'yuda@gmail.com',
            'role_id' => '1',
            'status_pilih' => '2',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Hendi Santika',
            'email' => 'pp.pemuda.persis@gmail.com',
            'role_id' => '1',
            'status_pilih' => '2',
            'password' => bcrypt('naruto2020'),
        ]);
    }
}
