@extends('admin.app')
@section('SB ADMIN' , 'Item Return')
@section('title' , 'Item Return')
@section('main')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Ajax Autocomplete Dynamic Search with select2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
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
    <a href="/returnExport" class="btn btn-success mb-2 mt-3 btn-sm"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></i>Export</a>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">List</div>
            <div class="card-body">
                <table class="table table-responsive-striped">
                    <thead>
                        <td>#</td>
                        <td>Item</td>
                        <td>Qty</td>
                        <td>Reason</td>
                        <td>Action</td>
                    </thead>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->item->name}}</td>
                        <td>{{$d->qtt}}</td>
                        <td>{{$d->alasan}}</td>
                        <td>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal-{{$d->id}}">
    <i class="fas fa-edit"></i>
  </button>
                        <form action="{{route('itemReturn.destroy',$d->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                  <!-- Modal -->
  @foreach ($item as $t)
  <div class="modal fade" id="exampleModal-{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('itemReturn.update',['itemReturn' => $t->id])}}" method="POST">
            @csrf
            {{method_field('put')}}
          <div class="form-group">
            <label for="qtt">Qty</label>
            <input type="number" name="qtt" id="qtt" class="form-control" value="{{$t->qtt}}">
          </div>
          <div class="form-group">
            <label for="alasan">Reason</label>
            <textarea name="alasan" id="alasan" class="form-control" aria-label="With textarea" >{{$t->alasan}}</textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{_('Add')}}</div>
            <div class="card-body">
                <form action="{{route('itemReturn.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row justify-content-between">
                    <div class="col-md-12">
                    <select class="livesearch form-control" name="item_id"></select>
                </div>  
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Qty</span>
                            </div>
                            <input type="number" name="qtt" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="alasan">Reason</label>
                        <textarea name="alasan" id="alasan" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select Item',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
</html>



@endsection