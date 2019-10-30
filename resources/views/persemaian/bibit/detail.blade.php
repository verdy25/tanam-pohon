@extends('mylayouts.admin')

@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Detail data bibit</h4>
            <form method="GET">
                <div class="form-group">
                    <b>Bibit</b>
                    <p>{{$bibit->bibit}}</p>
                </div>
                <div class="form-group">
                    <b>Kuota</b>
                    <p>{{$bibit->kuota}}</p>
                </div>
                <div class="form-group">
                    <b>Jadwal panen</b>
                    <p>{{$bibit->panen}}</p>
                </div>
                <div class="form-group">
                    <b>Deksripsi</b>
                    <p>{{$bibit->deskripsi}}</p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection