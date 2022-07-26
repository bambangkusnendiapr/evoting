<?php

namespace App\Http\Controllers;

use App\Category;
use App\Kandidat;
use App\Logo;
use App\Pemilih;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\BakalCalon;
use App\TokenBakalCalon;

class UserController extends Controller
{
    public function index()
    {
        $title = 'E-Voting | Pemilihan Umum Berbasis Online';
        $logo = Logo::all();
        return view('user.index', compact('logo', 'title'));
    }

    public function about()
    {
        $title = 'E-voting | About';
        return view('user.about', compact('title'));
    }

    public function voting_login()
    {
        $title = 'E-voting | Voting Login';
        return view('user.voting_login', compact('title'));
    }

    public function logout_voting(Request $data)
    {
        $data->session()->forget('token');
        return view('user.logout_voting');
    }


    public function block()
    {
        return view('user.block');
    }

    public function cektoken(Request $request)
    {
        $token = $request->usertoken;
        $cek = Pemilih::where(['username' => $token])->first();
        $status = Pemilih::where(['username' => $token, 'status_id' => 2])->first();
        $valid = Pemilih::where('username', $token)->first();
        $now = Carbon::now();

        if (!$cek) {
            Session::flash('Gagal', 'Token tidak ditemukan');
            return redirect()->back();
        } else {
            if (!$status) {
                Session::flash('Gagal', 'Token telah digunakan');
                return redirect()->back();
            } elseif ($now > $valid->valid_until) {
                Session::flash('valid', 'Token Sudah kadaluarsa');
                return redirect()->back();
            } else {
                $request->session()->put('token', $token);
                return redirect('voting');
            }
        }
    }

    public function postbyCategory(Request $data, $id)
    {
        if ($data->session()->get('token')) {
            $category = Category::find($id);

            return view('voting.category', compact('category'));
        } else {
            return redirect('user/voting_login');
        }
    }
    
    public function bakalCalon()
    {
        $title = 'E-voting | Bakal Calon';
        $bakalCalon = BakalCalon::orderBy('nama', 'ASC')->get();
        return view('user.bakal_calon', compact('title', 'bakalCalon'));
    }
    
    public function bakal_calon_voting_login()
    {
        $title = 'E-voting | Bakal Calon Voting Login';
        return view('user.bakal_calon_voting_login', compact('title'));
    }

    public function bakal_calon_cektoken(Request $request)
    {
        $token = $request->usertoken;
        $cek = TokenBakalCalon::where('token', $token)->first();
        // $status = Pemilih::where(['username' => $token, 'status_id' => 2])->first();
        // $valid = Pemilih::where('username', $token)->first();
        // $now = Carbon::now();

        if (!$cek) {
            Session::flash('Gagal', 'Token tidak ditemukan');
            return redirect()->back();
        } else {
            if ($cek->status == 'sudah voting') {
                Session::flash('Gagal', 'Token telah digunakan');
                return redirect()->back();
            } else {
                $request->session()->put('token_bakal', $token);
                return redirect()->route('bakal.calon.form.voting');
            }
        }
    }
}
