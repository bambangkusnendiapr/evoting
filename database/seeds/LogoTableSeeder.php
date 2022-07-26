<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logos')->insert([
            'id' => '1',
            'nama' => 'PP Pemuda Persis',
            'about' => 'E-Voting adalah web aplikasi sistem pemilihan Ketua PP, PW, PD, PC & PJ di jam’iyyah Pemuda Persatuan Islam.
                        Dengan Web Aplikasi ini diharapkan dapat memangkas waktu dalam proses pemilihan Ketua',
            'photo' => 'kominfo.png'
        ]);
    }
}
