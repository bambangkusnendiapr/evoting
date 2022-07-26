<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DaftarController extends Controller
{
    public function index()
    {
        $title = 'E-Voting | Daftar';
        return view('daftar.index', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->nim_nis = $request->nim_nis;
        $data->jurusan = $request->jurusan;

        //dd($data);
        $data->save();

        Session::flash('sukses', 'Pendaftaran telah berhasil, silahkan ');

        return redirect()->back();
    }
}
