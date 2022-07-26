<?php

namespace App\Http\Controllers;

use App\Exports\PemilihExport;
use App\Kandidat;
use App\Pemilih;
use Carbon\CarbonImmutable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VoterController extends Controller
{
    public function index()
    {
        $title = 'Pemilih';
        $data = Pemilih::orderBy('status_id', 'desc')->get();
        return view('voter.index', compact('data', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'expired' => 'required'
        ]);
        $jumlah = $request->jumlah;
        $expired = $request->expired;

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
                //menambahkan kadaluarsa token itungan menit
                $data->valid_until = Carbon::now()->addMinutes($expired);
                $data->save();
            }
        }
        \Session::flash('sukses', 'Token berhasil dibuat');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $kriteria = $request->kriteria_hapus;
        if ($kriteria == 0) {
            DB::table('kandidat')->update(['jumlah_suara' => 0]);
            DB::table('pemilih')->delete();
            \Session::flash('sukses', 'Token berhasil dihapus semua');
            return redirect()->back();
        } elseif ($kriteria == 1) {
            DB::table('pemilih')->where('status_id', 1)->delete();
            \Session::flash('sukses', 'Token Belum Voting berhasil dihapus semua');
            return redirect()->back();
        } elseif ($kriteria == 2) {
            DB::table('pemilih')->where('status_id', 2)->delete();
            \Session::flash('sukses', 'Token sudah Voting berhasil dihapus semua');
            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new PemilihExport, 'Token.xlsx');
    }
}
