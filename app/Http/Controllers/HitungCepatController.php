<?php

namespace App\Http\Controllers;

use App\Kandidat;
use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\BakalCalon;
use App\TokenBakalCalon;

class HitungCepatController extends Controller
{
    public function index()
    {
        $title = 'Realtime Quick Qount';
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

        return view('hitung_cepat.index', compact('title', 'kandidat', 'jumlahhaksuara', 'sudahvoting', 'belumvoting', 'usersChart'));
    }
    
    public function bakalCalon()
    {
        return view('hitung_cepat.bakal_calon', [
            'title' => 'Hitung Bakal Calon Ketua',
            'kandidat' => BakalCalon::all(),
            'bakalCalon' => BakalCalon::orderBy('votes', 'DESC')->paginate(10),
            'jumlahhaksuara' => TokenBakalCalon::count(),
            'sudahvoting' => TokenBakalCalon::where('status', 'sudah voting')->count(),
            'belumvoting' => TokenBakalCalon::where('status', 'belum voting')->count(),
        ]);
    }
}
