<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Category';
        $data = Category::all();
        return view('category.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Category';
        return view('category.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $data = new Category();
        $data->nama = $request->nama;
        $data->save();

        \Session::flash('sukses', 'Category berhasil di tambahkan');

        return redirect('category');
    }

    public function edit($id)
    {
        $title = 'Edit Category';
        $dt = Category::find($id);
        return view('category.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $data = Category::find($id);
        $data->nama = $request->nama;
        $data->save();

        \Session::flash('sukses', 'Category berhasil di tambahkan');

        return redirect('category');
    }

    public function delete($id)
    {
        try {
            Category::find($id)->delete();

            \Session::flash('sukses', 'Category berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Hapus terlebih dahulu nama kandidat yang mempunyai category tersebut');
        }

        return redirect()->back();
    }
}
