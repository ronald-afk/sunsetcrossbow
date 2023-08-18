@extends('admin.app')
@section('SB ADMIN' , 'Transaction')
@section('title' , 'Master Transaction')
@section('main')


    <div class="row justify-content-center">
        @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>@foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              <button type="button" class="btn-close" data-bs-dismiss="aler" aria-label="Close"></button>
            </ul>
        </div>
    @endif  
        @if (session()->has('succes'))
        <div class="row">
        <div class="col-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('succes')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        </div>
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Transaction') }}</div>
                <div class="card-body">
                    <table class="table table-responsive-striped" id="dataTable">
                        <thead>
                            <td>#</td>  
                            <td>Category</td>
                            <td>Name</td>
                            <td>Stock</td>
                            <td>Price</td>
                            <td>Action</td>
                        </thead>
                        @if($item->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">There is no Item</td>
                            </tr>
                        @else
                        @foreach( $item as $data )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->Category->name}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->stock}}</td>
                            <td>{{$data->price}}</td>  
                            <form action="{{route('mastertransaction.store')}}" method="POST">
                            @csrf
                            <td>
                                <input type="hidden" name="item_id" value="{{$data->id}}">
                                <input type="hidden" name="qtt" value="1"> 
                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                            </td>
                            </form>
                        </tr>
                        @endforeach
                        @endif
                    </table>
{{--        
                    {{ $data->links() }} --}}
                  
                </div>
            
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{_('Cart')}}</div>
                <div class="card-body">
                    <table class="table table-responsive-striped">
                        <thead>
                            <td>#</td>  
                            <td>Name</td>   
                            <td>Qty</td>    
                            <td>Subtotal</td>
                            <td>Action</td>
                        </thead>

                    <tr>
                        @if($carts->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">There is no item on the chart</td>
                            </tr>
                        @else
                        @foreach ($carts as $cart)
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cart->name}}</td>
                                <form action="{{route('mastertransaction.update', $cart->cart->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input class="form-control" type="number" name="qtt" id="qtt" min="1" max="{{$cart->stock + $cart->cart->qtt}}" value="{{$cart->cart->qtt}}" onchange="ubah{{$loop->iteration}}()" >
                                    </td>
                                    <script>
                                        function ubah{{$loop->iteration}}(){
                                            document.getElementById("update{{$loop->iteration}}").style.display="inline";
                                            document.getElementById("hapus{{$loop->iteration}}").style.display="none";
                                        }
                                    </script>
                                    <td>{{number_format($cart->price*$cart->cart->qtt)}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary text-light" id="update{{$loop->iteration}}" style="display :none">Update</button>
                                 
                                </form>
                                <form  method="POST" action="{{route('mastertransaction.destroy', $cart->cart->id)}}">
                                @csrf
                                @method('delete')
                                
                                    <button type="submit" class="btn btn-sm btn-danger text-light" id="hapus{{$loop->iteration}}" >Hapus</button>
                                </td>
                                </form>
                           
                        
                    </tr>
                    @endforeach
                        @endif

                    <form action="{{route('transaction.checkout')}}" method="POST">
                    @csrf
                    <tr>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="">
                        <td colspan="3">Total :</td>
                        <td colspan="2"><input class="form-control" readonly type="number" name="total" value="{{$carts->sum(function ($item){
                            return $item->price * $item->cart->qtt;
                        })}}" ></td>
                    </tr>
                    <tr>
                        <td colspan="3">Payment :</td>
                        <td colspan="2"><input class="form-control" type="number"  name="pay_total" value="" min="{{$carts->sum(function ($item){
                            return $item->price * $item->cart->qtt;
                        })}}" required ></td>
                    </tr>

                    <tr>
                        <td><input type="submit" class="btn btn-primary btn-sm" value="Checkout"></td>
                      
                        <td><a type="reset" class="btn btn-danger btn-sm" value="" href="{{route('transaction.reset')}}">Reset</a></td>
                    </tr>
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection