@extends('mylayouts.admin')
@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Ubah data bibit</h4>
            <form method="POST" action="{{route('bibit.update', $bibit->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="bibit">Bibit</label>
                    <input type="text" class="form-control @error('bibit') is-invalid @enderror" id="bibit"
                        placeholder="Masukkan bibit" name="bibit" value="{{$bibit->bibit}}">
                    @error('bibit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuota">Jumlah</label>
                    <input type="number" class="form-control @error('kuota') is-invalid @enderror" id="kuota"
                        placeholder="Masukkan jumlah bibit" name="kuota" value="{{$bibit->kuota}}">
                    @error('kuota')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="panen">Tanggal panen</label>
                    <input type="date" class="form-control @error('panen') is-invalid @enderror" id="panen"
                        placeholder="Masukkan jumlah bibit" name="panen" value="{{$bibit->panen}}">
                    @error('panen')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30"
                        rows="9" style="resize: none;">{{$bibit->deskripsi}}}</textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </form>
        </div>
    </div>
</div>
@endsection