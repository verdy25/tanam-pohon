@extends('mylayouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    @error('nama')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('tempat_lahir')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('tanggal_lahir')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('hp')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('email')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('provinsi')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @error('alamat')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{$message}}
    </div>
    @enderror
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="form-contact contact_form" method="post" action="{{route('update.profil.admin')}}">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" name="nama" id="nama" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama'"
                                    placeholder='Masukkan nama' value="{{$profile->nama}}">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat lahir</label>
                                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan tempat lahir'"
                                    placeholder='Masukkan tempat lahir' value="{{$profile->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal lahir</label>
                                <input class="form-control" name="tanggal_lahir" id="tanggal_lahir" type="date"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'dd/mm/yyyy'"
                                    placeholder='dd/mm/yyyy' value="{{$profile->tanggal_lahir}}"
                                    pattern="\d{1,2}-\d{1,2}-\d{4}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="hp">Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+62</div>
                                        <input class="form-control" name="hp" id="hp" type="text"
                                            id="inlineFormInputGroupUsername" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Masukkan nomor hp'"
                                            placeholder='Masukkan nomor hp' value="{{$profile->hp}}" maxlength="12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">email</label>
                                <input class="form-control" name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan email'"
                                    placeholder='Masukkan email' value="{{$profile->email}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option>Pilih provinsi</option>
                                    @foreach ($provinces as $key => $p)
                                    @if ($profile->provinsi_id == $key)
                                    <option value="{{$key}}" selected>{{ $p }}</option>
                                    @else
                                    <option value="{{$key}}">
                                        {{$p}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <select name="kota" id="kota" class="form-control">
                                    @if ($profile->kabupaten_id != null)
                                    <option value="{{$profile->kabupaten_id}}" selected>{{$profile->kabupaten->name}}
                                    </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    @if ($profile->kecamatan_id != null)
                                    <option value="{{$profile->kecamatan_id}}" selected>{{$profile->kecamatan->name}}
                                    </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control" name="alamat" id="alamat" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan alamat'"
                                    placeholder='Masukkan alamat' value="{{$profile->alamat}}">
                            </div>
                        </div>
                    </div>
                    <input type="text" id="kcmtn" value="{{$profile->kecamatan_id}}" hidden>
                    <input type="text" id="kbptn" value="{{$profile->kabupaten_id}}" hidden>
                    <div class="form-group mt-3">
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection