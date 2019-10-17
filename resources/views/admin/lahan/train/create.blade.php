@extends('mylayouts.admin')

@section('content')
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Masukkan data kondisi lahan</h4>
            <form method="POST" action="{{route('lahan.store')}}">
                @csrf
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <select name="kondisi" id="kondisi" class="form-control">
                        @foreach ($kondisi as $k)
                        <option value="{{$k->id}}">{{$k->kondisi}}</option>
                        @endforeach
                    </select>
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ciri">Ciri-ciri</label>
                    <div class="row">
                        @foreach ($ciri as $c)
                        <div class="checkbox col-6">
                            <label><input type="checkbox" name="ciri[]" value="{{$c->id}}">
                                {{$c->ciri}}</label>
                        </div>
                        @endforeach
                    </div>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </form>
        </div>
    </div>
</div>
@endsection