<?php

namespace App\Exports;

use App\Models\Items;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class stockExport implements FromView
{

    public function view(): View
    {
       return view('admin.view_hadeer.stock',[
        'stock' => Items::all()
       ]);
    }
}
