<?php

namespace App\Exports;

use App\Models\itemReturn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class returnExport implements FromView
{
    public function view(): View
    {
       return view('admin.view_hadeer.returnTabel',[
        'return' => itemReturn::all()
       ]);
    }
}
