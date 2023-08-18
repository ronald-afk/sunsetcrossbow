@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Create Pegawai')
@section('main')


    
<div class="row justify-content-center">
    <div class="col-lg-10">
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
                <form method="POST" action="{{route('masterpegawai.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name"  value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                    <label for="id_roles">Role</label>
                    <select name="id_roles" id="id_roles" class="custom-select">   
                        <option selected>-</option>                    
                        @foreach ($item as $ctg)
                        <option value="{{$ctg->id_roles}}">{{$ctg->id_roles}}</option>
                        @endforeach                   
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="number" class="form-control"  name="no_telp"  value="{{old('no_telp')}}" >
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select form-control"  value="{{old('jk')}}" >
                        <option value="" >-</option>
                        <option value="Laki - Laki" >Laki - Laki</option>
                        <option value="Perempuan" >Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" >
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control"  name="password" value="{{old('password')}}" >
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"  value="{{old('alamat')}}" >
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input class="form-control-file" type="file" id="foto" name="foto" value="{{old('foto')}}" >
                        
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