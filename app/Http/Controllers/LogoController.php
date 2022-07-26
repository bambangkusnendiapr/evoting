<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    public function index()
    {
        $title = 'Profile Sekolah / Instansi';
        $dt = Logo::first();
        return view('logo.index', compact('title', 'dt'));
    }

    public function update(Request $request)
    {
        $data = Logo::first();
        $data->nama = $request->nama;
        $data->about = $request->about;
        $file = $request->file('photo');
        if ($file) {
            $nama = time() . '-' . $file->getClientOriginalName();
            $file->move('frontend', $nama);
            $data->photo = $nama;
        }

        $data->save();

        \Session::flash('sukses', 'Data Berhasil di update');

        return redirect()->back();
    }
}
