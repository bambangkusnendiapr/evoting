<?php

namespace App\Exports;

use App\Kandidat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Hasilvote implements FromView
{
    public function view(): View
    {
        return view('hitung_cepat.export', [
            'export' => Kandidat::all()
        ]);
    }
}
