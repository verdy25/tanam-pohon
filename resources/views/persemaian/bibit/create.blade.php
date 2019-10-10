@extends('mylayouts.admin')

@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Masukkan data bibit</h4>
            <form method="POST" action="/bibit">
                @csrf
                <div class="form-group">
                    <label for="bibit">Bibit</label>
                    <input type="text" class="form-control @error('bibit') is-invalid @enderror" id="bibit"
                        placeholder="Masukkan bibit" name="bibit" value="{{old('bibit')}}">
                    @error('bibit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuota">Jumlah</label>
                    <input type="number" class="form-control @error('kuota') is-invalid @enderror" id="kuota"
                        placeholder="Masukkan jumlah bibit" name="kuota" value="{{old('kuota')}}">
                    @error('kuota')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </form>
        </div>
    </div>
</div>
@endsection