@extends('admin.app')
@section('SB ADMIN' , 'Supplier')
@section('title' , 'Supplier')
@section('main')




    <div class="container">
        @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>@foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>      
            </ul>
        </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{_('Supplier')}}</div>    
                    <div class="card-body">
                        <table class="table table-responsive-striped">
                        <thead>
                            <td>#</td>  
                            <td>Name</td>
                            <td>Call Number</td>
                            <td>Company</td>
                            <td>Company Address</td>
                            <td>Action</td>
                        </thead>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>    
                            <td>{{'0'.$item->no_telp}}</td> 
                            <td>{{$item->perusahaan}}</td>
                            <td>{{$item->alamat_perusahaan}}</td>
                            <td>
                                <a href="https://wa.me/+62{{$item->no_telp}}" target="_blank" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></a>
                                @can('admin')
                                <a href=""  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{route('supplier.destroy',$item->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @can('admin')
            <div class="col-md-4">
                <div class="card">
                <form action="{{route('supplier.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">{{_('Add Supplier')}}</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Call Number</label>
                        <input type="number" class="form-control" name="no_telp" id="" value="{{old('no_telp')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Company</label>
                        <input type="text" class="form-control" name="perusahaan" id="" value="{{old('perusahaan')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Company Address</label>
                        <input type="text" class="form-control" name="alamat_perusahaan" id="" value="{{old('alamat_perusahaan')}}">
                    </div>
                  
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
          
                </form>
                </div>
                </div>
            </div>
            @endcan
        </div>
    </div>


@endsection