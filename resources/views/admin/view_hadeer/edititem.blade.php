@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Edit Item')
@section('main')

<!DOCTYPE html>
<html lang="en">
<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">
     
        <!-- Content Wrapper -->
        <div id="content-wrapper" class=" flex-column">
        
            <!-- Main Content -->
            <div id="content">
            </div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                <div class="card-header">{{ __('Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="{{route('masteritem.update' , ['masteritem' => $item->id] )}}"  method="POST" >
                        @csrf
                        {{@method_field('put')}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="inputGroupSelect01" class="input-group-text">Jenis Kontak</label>
                            </div>
                            <select name="category_id" id="inputGroupSelect01" class="custom-select">
                                <option selected>-</option>                    
                                @foreach ($category as $ctg) 
                                @if ($ctg->id == $item->category_id )
                                <option selected value="{{$ctg->id}}">{{$ctg->name}}</option>
                                @else 
                                <option value="{{$ctg->id}}">{{$ctg->name}}</option>
                                @endif
                                
                                @endforeach                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Item</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{$item->stock}}" >
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{$item->price}}" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Simpan</button>
                            <a href="{{route('masteritem.index')}}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- End of Main Content -->
            
        

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda ingin keluar dari aplikasi? Klik Logout jika ingin
                </div>
                <div class="modal-footer">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Logout"></input>
                        </form>
                </div>
            </div>
        </div>
    </div>

    @endsection