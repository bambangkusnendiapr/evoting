<?php

namespace App\Exports;

use App\Pemilih;
use App\Voter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PemilihExport implements FromView
{
    public function view(): View
    {
        return view('voter.export', [
            'export' => Pemilih::all()
        ]);
    }
}
