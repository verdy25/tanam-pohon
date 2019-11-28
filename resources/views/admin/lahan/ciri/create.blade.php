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
                    <label for="kategori">Kategori</label>
                    <div class="row">
                        <div class="col-lg-9 col-xl-9 col-md-9">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih kategori</option>
                                @foreach ($kategoris as $k)
                                <option value="{{$k->id}}">
                                    {{$k->kategori}}
                                </option>
                                @endforeach
                            </select>
                            @error('pertanyaan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#newKategori">
                                Buat Kategori
                            </button>
                        </div>
                    </div>
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


<!-- Modal -->
<div class="modal fade" id="newKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('lahan.add.kategori')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="kategori" id="kategori"
                        class="form-control @error('kategori') is-invalid @enderror"
                        placeholder="Masukkan kategori baru">
                    @error('pertanyaan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection