<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class transacExport implements FromView,ShouldAutoSize
{
    protected $time1,$time2,$user;

    public function __construct($time1,$time2,$user)
    {
        $this->time1 = $time1;
        $this->time2 = $time2;
        $this->user = $user;
    }

    public function view(): View
    {
       return view('admin.view_hadeer.laporanTransac',[
        'laporan' => transaction::whereBetween('waktu' , [date('d-M-Y', strtotime($this->time1)), $this->time2])->get()
       ]);
    }
}
