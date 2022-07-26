<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\Hasilvote;
use App\Kandidat;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KandidatController extends Controller
{
    public function index()
    {
        $title = 'Kandidat';
        $kandidat = Kandidat::all();
        $category = Category::all();
        return view('candidat.index', compact('title', 'kandidat', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'photo' => 'required'
        ]);
        $data = new Kandidat();
        $data->nama = $request->nama;
        $data->visi = $request->visi;
        $data->misi = $request->misi;
        $data->category_id = $request->category_id;
        $file = $request->file('photo');
        if ($file) {
            $file->move('kandidat', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }
        $data->save();
        \Session::flash('sukses', 'Data Kandidat Berhasil ditambahkan');

        return redirect()->back();
    }

    public function detail($id)
    {
        $title = 'Detail Kandidat';
        $detail = Kandidat::find($id);
        return view('candidat.detail', compact('title', 'detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        $data = Kandidat::find($id);
        $data->nama = $request->nama;
        $data->visi = $request->visi;
        $data->misi = $request->misi;
        $data->category_id = $request->category_id;
        $file = $request->file('photo');
        if ($file) {
            $file->move('kandidat', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }
        $data->save();
        \Session::flash('sukses', 'Data Kandidat Berhasil diubah');

        return redirect()->back();
    }

    public function delete($id)
    {
        Kandidat::find($id)->delete();
        \Session::flash('sukses', 'Kandidat Berhasil dihapus');

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new Hasilvote, 'hasil_suara.xlsx');
    }

    public function postbyCategory($id)
    {
        $title = 'Category Kandidat';
        $category = Category::find($id);

        return view('candidat.category', compact('category', 'title'));
    }
}
