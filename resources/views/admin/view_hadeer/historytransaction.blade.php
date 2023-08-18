@extends('admin.app')
@section('SB ADMIN' , 'Sales')
@section('title' , 'Sales Report')
@section('main')

<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="card">
    <div class="card-body">
    <h4 class="ms-1">Sale Report</h4>
        <div class="row">
            <div class="col">
                <label for="time1" class="form-label">
                    <h6>From</h6>
                </label>
                <input type="date" name="date"
                    class="form-control @error('date') is-invalid @enderror" id="time1" onchange="checktime2()">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="time2" class="form-label">
                    <h6>To</h6>
                </label>
                <input type="date" name="date"
                    class="form-control @error('date') is-invalid @enderror" id="time2" onchange="checktime1()">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    <button class="btn btn-primary mt-3 ms-1" onclick="showp()" id="btnlp" disabled>Laporan Penjualan</button>
</div>
</div>
</div>
</div>

<br>
<div class="card">
    <div class="card-body" id="show">
        <div class="text-center">
            <h5>Silahkan pilih data</h5>
        </div>
    </div>

</div>

<script>
function checktime2() {
    time2 = $('#time2').val();
    if (time2 != "") {
        $('#btnlp').prop("disabled", false);
    }
}

function checktime1() {
    time1 = $('#time1').val();
    if (time1 != "") {
        $('#btnlp').prop("disabled", false);
    }
}

function showp() {
        user = {{ auth()->user()->id }};
        time1 = $('#time1').val();
        time2 = $('#time2').val();
        // console.log(time1);
        $.get('/laporan/' + time1 + '/' + time2 + '/' + user, function(data) {
            $('#show').html(data);
        })
    }
</script>
</div>
@endsection