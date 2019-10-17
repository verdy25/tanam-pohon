@extends('mylayouts.admin')
@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Ubah data kondisi lahan</h4>
            <form method="POST" action="{{route('kondisi.update', $kondisi->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" class="form-control @error('kondisi') is-invalid @enderror" id="kondisi"
                        placeholder="Masukkan nama kondisi lahan" name="kondisi" value="{{$kondisi->kondisi}}">
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penanganan">Penanganan</label>
                    <input type="text" class="form-control @error('penanganan') is-invalid @enderror" id="penanganan"
                        placeholder="Masukkan cara menangani lahan" name="penanganan" value="{{$kondisi->penanganan}}">
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ciri">Ciri-ciri</label>
                    @foreach ($ciri as $c)
                    <div class="checkbox">
                        <label><input type="checkbox" name="ciri[]" value="{{$c->id}}">
                            {{$c->ciri}}</label>
                    </div>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </form>
        </div>
    </div>
</div>
@endsection