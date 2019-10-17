@extends('mylayouts.admin')
@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Ubah ciri-ciri</h4>
            <form method="POST" action="{{route('ciri.update', $ciri->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="ciri">Ciri</label>
                    <input type="text" class="form-control @error('ciri') is-invalid @enderror" id="ciri"
                        placeholder="Masukkan ciri-ciri" name="ciri" value="{{$ciri->ciri}}">
                    @error('bibit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan"
                        placeholder="Masukkan pertanyaan" name="pertanyaan" value="{{$ciri->pertanyaan}}">
                    @error('pertanyaan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label><br>
                    <input type="radio" name="bobot" value="1" @if ($ciri->bobot == 1) checked @endif> Biasa<br>
                    <input type="radio" name="bobot" value="3" @if ($ciri->bobot == 3) checked @endif> Sedang<br>
                    <input type="radio" name="bobot" value="5" @if ($ciri->bobot == 5) checked @endif> Penting
                </div>
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </form>
        </div>
    </div>
</div>
@endsection