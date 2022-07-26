<?php

namespace App\Exports;

use App\TokenBakalCalon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TokenBakalCalonExport implements FromView
{
    public function view(): View
    {
        return view('exports.token', [
            'data' => TokenBakalCalon::all()
        ]);
    }
}