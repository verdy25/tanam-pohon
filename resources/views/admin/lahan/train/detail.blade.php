@extends('mylayouts.admin')

@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <form method="GET">
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" class="form-control @error('kondisi') is-invalid @enderror" id="kondisi"
                        placeholder="Masukkan nama kondisi lahan" name="kondisi" value="{{$kondisi->kondisi}}" disabled>
                </div>
                <div class="form-group">
                    <label for="penanganan">Penanganan</label>
                    <ul>
                        <li>{{$kondisi->penanganan}}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="ciri">Ciri-ciri</label>
                    <ul>
                        @foreach ($kondisi->ciri as $c)
                        <li>{{$c->ciri}}</li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection