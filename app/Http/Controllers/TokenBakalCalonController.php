<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TokenBakalCalon;
use Illuminate\Support\Facades\DB;
use App\Exports\TokenBakalCalonExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Pemilih;

class TokenBakalCalonController extends Controller
{
    public function index()
    {
        $title = 'Pemilih';
        $data = TokenBakalCalon::orderBy('status', 'desc')->get();
        return view('token_bakal.index', compact('data', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required'
        ]);

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
            $cek = TokenBakalCalon::where('token', $token)->first();
            $cek2 = Pemilih::where('username', $token)->first();

            if (empty($cek) && empty($cek2)) {
                $data = new TokenBakalCalon();
                $data->token = $token;
                $data->save();
            } else {
                $i--;
            }
        }
        \Session::flash('sukses', 'Token berhasil dibuat');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $kriteria = $request->kriteria_hapus;
        if ($kriteria == 'semua') {
            DB::table('token_bakal_calons')->delete();
            \Session::flash('sukses', 'Token berhasil dihapus semua');
            return redirect()->back();
        } 
        
        if ($kriteria == 'sudah') {
            DB::table('token_bakal_calons')->where('status', 'sudah voting')->delete();
            \Session::flash('sukses', 'Token Sudah Voting berhasil dihapus semua');
            return redirect()->back();
        } 
        
        if ($kriteria == 'belum') {
            DB::table('token_bakal_calons')->where('status', 'belum voting')->delete();
            \Session::flash('sukses', 'Token Belum Voting berhasil dihapus semua');
            return redirect()->back();
        }
    }

    public function export() 
    {
        return Excel::download(new TokenBakalCalonExport, 'token-bakal-calon.xlsx');
    }
}
