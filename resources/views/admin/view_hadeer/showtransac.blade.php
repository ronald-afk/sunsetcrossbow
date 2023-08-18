

@if ($history->isEmpty())
    <div class="text-center">
        <h5>Tidak ada data</h5>
    </div>
@else
    <a href="/exportTransac/{{ $time1 }}/{{$time2}}/{{$user}}" class="btn btn-success mb-2 mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></i>Export</a>
    <h4 class="text-center">Laporan Penjualan </h4>
    <h4 class="text-center">Dari: {{ date('d-M-Y', strtotime($time1))}} Sampai: {{ date('d-M-Y', strtotime($time2)) }}</h4>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Transaction Id</th>
                <th scope="col">Item</th>
                <th scope="col">Date</th>
                <th scope="col">Served By</th>
                <th scope="col">Grand Total</th>
                <th scope="col">Paytotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $p)
                @foreach ($p->detail as $d)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$d->transaction_id}}</td>
                    <td>{{$d->item->name}}</td>
                    <td>{{ $p->created_at}}</td>
                    <td>{{$p->user->name}}</td>
                    <td>Rp.{{number_format($p->total)}}</td>
                    <td>Rp.{{number_format($p->pay_total)}}</td>
                </tr>
                @endforeach
            @endforeach

        </tbody>

    </table>

@endif