@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Edit Categroy')
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
                <!-- Begin Page Content -->
                <div class="container">
                    <!-- Page Heading -->
                </div>
                <!-- /.container-fluid -->
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Item') }}</div>

                <div class="card-body">
                    {{-- {{route('masteritem.update' , ['masteritem' => $data->id] )}} --}}
                    <form method="POST" enctype="multipart/form-data" action="{{route('mastercategory.update',['mastercategory'=>$data->id])}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control"  name="name" value="{{$data->name}}" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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