@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Edit Pegawai')
@section('content-title', 'Edit Pegawai')
@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                          
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{route('masterpegawai.update' , ['masterpegawai' => $item->id])}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name"  value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="NISN">ID-Roles</label>
                        <input type="text" class="form-control" id="NISN" name="id_roles"  value="{{$item->id_roles}}" >
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control"  name="no_telp"  value="{{$item->no_telp}}" >
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select form-control"  value="{{$item->jk}}" >
                        <option value="" >-</option>
                        <option value="Laki Laki" @if($item->jk == 'Laki Laki') selected @endif>Laki - Laki</option>
                        <option value="Perempuan" @if($item->jk == 'Perempuan') selected @endif >Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}" >
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control"  name="password" value="{{$item->password}}"  >
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"  value="{{$item->alamat}}" >
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input class="form-control-file" type="file" id="foto" name="foto" value="{{$item->foto}}">
                        <img src="{{asset('/template/img/'.$item->foto)}}" class="img-thumbnail" width="300px"  alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection