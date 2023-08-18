@extends('admin.app')
@section('SB ADMIN' , 'Transaction')
@section('title' , 'Master Transaction')
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/mastertransaction" class="btn btn-primary">Back</a>
            <br>
            <br>
            <div class="card">
                <div class="card-header text-center">{{ __('Detail Transaction') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive d-flex">
                   
                        <thead>
                            <td>Transaction Date    </td>
                            <td class="text-center" >{{date ('d - F - Y' , strtotime($detail->created_at))}}</td>
                        </thead>
                        <tr>
                            <td>Served By </td>
                            <td class="text-center">{{$detail->user->name}}</td>
                        </tr>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <td>#</td>
                            <td>Nama</td>   
                            <td>Qty</td>
                            <td>Price</td>
                            <td>Subtotal</td>
                           
                        </thead>
                        @foreach ($detail->detail as $dtl)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dtl->item->name}}</td>
                            <td>
                                {{$dtl->qtt}}
                            </td>
                            <td>{{number_format($dtl->item->price)}}</td>
                            <td>{{number_format($dtl->qtt * $dtl->item->price)}}</td>
                    
                     </tr>    
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end">Grand Total :</td>
                        <td colspan="2">{{number_format($detail->total)}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end">Payment :</td>
                        <td colspan="2">{{number_format($detail->pay_total)}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end" >Change : </td>
                        <td colspan="2">{{number_format($detail->pay_total - $detail->total)}}</td>
                    </tr>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection