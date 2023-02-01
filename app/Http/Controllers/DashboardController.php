<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Pemilih;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Charts\UserChart;
class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $pemilih = Pemilih::where('user_id', Auth::id())->get();
        $jumlahhaksuara = \App\Pemilih::count();
        $sudahvoting = \App\Pemilih::where('status_id', 1)->count();
        $belumvoting = \App\Pemilih::where('status_id', 2)->count();

        $kandidat = Kandidat::all();
        $borderColors = [
            "rgba(255, 99, 132)",
            "rgba(22,160,133)",
            "rgba(255, 205, 86)",
            "rgba(51,105,232)",
            "rgba(244,67,54)",
            "rgba(34,198,246)",
            "rgba(153, 102, 255)",
            "rgba(255, 159, 64)",
            "rgba(233,30,99)",
            "rgba(205,220,57)"
        ];
        $fillColors = [
            "rgba(255, 99, 132)",
            "rgba(22,160,133)",
            "rgba(255, 205, 86)",
            "rgba(51,105,232)",
            "rgba(244,67,54)",
            "rgba(34,198,246)",
            "rgba(153, 102, 255)",
            "rgba(255, 159, 64)",
            "rgba(233,30,99)",
            "rgba(205,220,57)"

        ];
        $usersChart = new UserChart;
        $usersChart->labels($kandidat->pluck('nama'));
        $usersChart->dataset('Perolehan Suara', 'bar', $kandidat->pluck('jumlah_suara'))
        ->color($borderColors)
            ->backgroundcolor($fillColors);

        // dd('masuk');
        return view('dashboard.index', 
        compact('title', 
        'kandidat', 
        'pemilih', 
        'jumlahhaksuara', 
        'sudahvoting', 
        'belumvoting', 
        'usersChart'));
    }

    public function store(Request $request)
    {
        $jumlah = $request->jumlah;

        for ($i = 0; $i < $jumlah; $i++) {
            $karakter = 'ABCDEFGHIJKLMNOPQRSTUPWXYZ0123456789';
            $string = '';

            for ($x = 0; $x < 10; $x++) {
                $pos = rand(0, strlen($karakter) - 1);
                $string .= $karakter[$pos];
            }
            $token = strtoupper($string);

            //CEK TOKEN SUDAH TERDAFTAR ATAU BELUM
            $cek = Pemilih::find($token);

            if (empty($cek)) {

                $data = new Pemilih();
                $data->username = $token;
                $data->user_id = Auth::id();
                //menambahkan kadaluarsa token itungan menit
                $data->valid_until = Carbon::now()->addMinutes(480);
                $data->save();
            }

            $user = Auth::id();
            User::where('id', $user)->update(['status_pilih' => 2]);
        }
        \Session::flash('sukses', 'Token berhasil dibuat');
        return redirect()->back();
    }
}
