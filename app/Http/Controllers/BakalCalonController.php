<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BakalCalon;
use App\Exports\BakalExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BakalCalonImport;

class BakalCalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bakal_calon.index', [
            'title' => 'Bakal Calon Anggota',
            'bakalCalon' => BakalCalon::orderBy('nama', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('bakal.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npa' => 'required'
        ]);

        $bakal = new BakalCalon;
 
        $bakal->nama = $request->nama;
        $bakal->npa = $request->npa;
 
        $bakal->save();

        \Session::flash('sukses', 'Bakal Calon Ketua Berhasil Ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('bakal.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('bakal.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'npa' => 'required'
        ]);

        $bakal = BakalCalon::find($id);
 
        $bakal->nama = $request->nama;
        $bakal->npa = $request->npa;
 
        $bakal->save();

        \Session::flash('sukses', 'Bakal Calon Ketua Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BakalCalon::find($id)->delete();

        \Session::flash('sukses', 'Bakal Calon berhasil dihapus');

        return redirect()->back();
    }

    public function exportBakal() 
    {
        return Excel::download(new BakalExport, 'bakal-calon-ketua.xlsx');
    }

    public function importBakal(Request $request) 
    {
        // dd($request->all());
        $this->validate($request,[
            'filebakal' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new BakalCalonImport, $request->file('filebakal'));

        \Session::flash('sukses', 'Bakal Calon berhasil diupload');

        return redirect()->back();
    }
}
