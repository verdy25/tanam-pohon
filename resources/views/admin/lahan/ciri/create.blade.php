@extends('mylayouts.admin')

@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Masukkan data ciri-ciri lahan</h4>
            <form method="POST" action="{{route('lahan.ciri.store')}}">
                @csrf
                <div class="form-group">
                    <label for="ciri">Ciri-Ciri</label>
                    <input type="text" class="form-control @error('ciri') is-invalid @enderror" id="ciri"
                        placeholder="Masukkan ciri-ciri" name="ciri" value="{{old('ciri')}}">
                    @error('ciri')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan"
                        placeholder="Masukkan pertanyaan" name="pertanyaan" value="{{old('pertanyaan')}}">
                    @error('pertanyaan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label><br>
                    <input type="radio" name="bobot" value="1"> Biasa<br>
                    <input type="radio" name="bobot" value="3"> Sedang<br>
                    <input type="radio" name="bobot" value="5"> Penting
                </div>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </form>
        </div>
    </div>
</div>
@endsection