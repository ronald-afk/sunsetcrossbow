@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Show Pegawai')
@section('content-title', 'Show Pegawai')
@section('main')


<div class="row">
    <div class="col-lg-3">
            <div class="card shadow mb-4">
            <div class="card-body">
                <img src="{{asset('/template/img/'.$data->foto)}}" class="img-thumbnail" width="300"  alt="" >
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama : {{$data->name}}</li>
                <li class="list-group-item">Id-Roles : {{$data->id_roles}}</li>
                <li class="list-group-item">Alamat : {{$data->alamat}}</li>
                <li class="list-group-item">Email : {{$data->email}}</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-lg-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i>Contact</h6>
            </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">       
                    <li class="list-group-item">Contact: {{$data->no_telp}}</li>
                </ul>
                </div>
        </div>

    
    </div>
    
</div>
@endsection