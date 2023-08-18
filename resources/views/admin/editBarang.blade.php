@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Edit Barang')
@section('content-title', 'Edit Barang')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="{{$data->item_name}}" >
                    </div>
                    <div class="form-group">
                        <label for="descBarang">Deskripsi Barang</label>
                        <textarea class="form-control" id="descBarang" name="descBarang" value="" >{{$data->item_desc}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="jmlBarang">Jumlah</label>
                        <input type="text" class="form-control" id="jmlBarang" name="jmlBarang" value="{{$data->item_qtt}}" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan">
                        <a href="{{route('masterbarang.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection