<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Pemilih;
use App\Category;
use Illuminate\Http\Request;
use App\BakalCalon;
use App\TokenBakalCalon;
use Illuminate\Support\Facades\Session;

class VotingController extends Controller
{
    public function index(Request $data)
    {
        if ($data->session()->get('token')) {
            $kandidat = Kandidat::all();
            $category = Category::all();
            return view('voting.index', compact('kandidat', 'category'));
        } else {
            return redirect('user/voting_login');
        }
    }

    public function voting_detail(Request $data, $id)
    {
        if ($data->session()->get('token')) {
            $kandidat_detail = Kandidat::find($id);
            return view('voting.detail', compact('kandidat_detail'));
        } else {
            return redirect('user/voting_login');
        }
    }

    public function simpan_suara($idkandidat, Request $data)
    {
        $jumlah = Kandidat::where('id', $idkandidat)->get();
        foreach ($jumlah as $key) {
            $jumlah_suara = $key->jumlah_suara;
        }

        $cek = Pemilih::where(['username' => $data->session()->get('token'), 'status_id' => 2])->first();

        if ($cek) {
            Kandidat::where('id', $idkandidat)->update(['jumlah_suara' => $jumlah_suara + 1]);
            Pemilih::where('username', $data->session()->get('token'))->update(['status_id' => 1]);
        } else {
            return redirect('user/block');
        }
        return redirect('user/logout_voting');
    }
    
    public function bakal_calon(Request $data)
    {
        if ($data->session()->get('token_bakal')) {
            $kandidat = BakalCalon::orderBy('nama', 'ASC')->get();
            return view('voting.bakal_calon', compact('kandidat'));
        } else {
            return redirect()->route('bakal.calon.voting.login');
        }
    }

    public function simpan_suara_bakal_calon($idkandidat, Request $data)
    {
        $bakalCalon = BakalCalon::find($idkandidat);
        $bakalCalon->votes = $bakalCalon->votes + 1;
        $bakalCalon->save();

        $token = TokenBakalCalon::where('token', $data->session()->get('token_bakal'))->first();
        $token->status = 'sudah voting';
        $token->save();

        $cart = session()->get('token_bakal');
        unset($cart);
        session()->put('token_bakal');

        Session::flash('success', 'Terima Kasih Telah Memilih Bakal Calon');
        return redirect()->route('bakal.calon.voting.login');
    }
}
