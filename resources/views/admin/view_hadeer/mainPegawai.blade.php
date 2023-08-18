@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Master Pegawai')
@section('content-title', '')
@section('main')
 
    <div id="wrapper">
    
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        
            <!-- Main Content -->
            <div id="content">
      
                <!-- Begin Page Content -->
            
                <!-- /.container-fluid -->
            </div>
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
                <a href="{{route('masterpegawai.create')}}" class="btn btn-primary">Create</a>
                <br>
                <br>
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Master Karyawan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive-striped">
                        <thead>
                            <td>#</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Email</td>
                            <td>Nomor Telepon</td>
                            <td>Action</td>
                        </thead>
                     
                        @foreach($item as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->no_telp}}</td>
                            <td>
                                <a href="masterpegawai/{{$data->id}}" class="btn btn-info btn-circle btn-sm"> <i class="fas fa-info"></i></a>
                                <a href="masterpegawai/{{$data->id}}/edit" class="btn btn-sm btn-warning btn-circle "><i class="fas fa-edit"></i></a>
                                <form action="{{route('masterpegawai.destroy', $data->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </table>
                    <!-- {{ __('You are logged in!') }} -->
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