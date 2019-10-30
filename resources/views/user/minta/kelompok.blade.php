@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Isi data-data dibawah ini</h2>
            </div>
            <div class="col-lg-8">
                @error('nama')
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
                @error('nik')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('telp')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('tujuan')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('bibit_id')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('jumlah_bibit')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('luas_lahan')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('latitude')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('longitude')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('ktp')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('spptpbb')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                @error('permohonan')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                <form class="form-contact contact_form" method="post" action="/minta" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama">Nama ketua kelompok</label>
                                <input class="form-control" name="nama" id="nama" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama'"
                                    placeholder='Masukkan nama' value="{{old('nama')}}">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control" name="alamat" id="alamat" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan alamat'"
                                    placeholder='Masukkan alamat' value="{{old('alamat')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input class="form-control" name="nik" id="nik" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan NIK'"
                                    placeholder='Masukkan NIK' value="{{old('nik')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telp">Nomor HP</label>
                                <input class="form-control" name="telp" id="telp" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nomor hp'"
                                    placeholder='Masukkan nomor hp' value="{{old('telp')}}">
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <textarea class="form-control w-100" name="tujuan" id="tujuan" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan tujuan anda'"
                                        placeholder='Masukkan tujuan anda'
                                        maxlength="191">{{old('tujuan')}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bibit_id">Bibit</label>
                                    <select name="bibit_id" id="bibit_id" class="form-control">
                                        @foreach ($bibits as $bibit)
                                            @if (old('bibit_id') ==  $bibit->id)
                                            <option value="{{ $bibit->id }}" selected>{{ $bibit->bibit }}</option>
                                            @else
                                            <option value="{{$bibit->id}}">
                                                    {{$bibit->bibit}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jumlah_bibit">Jumlah bibit</label>
                                <input class="form-control" name="jumlah_bibit" id="jumlah_bibit" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan jumlah bibit maksimal 1500'"
                                    placeholder='Masukkan jumlah bibit' value="{{old('jumlah_bibit')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="luas_lahan">Luas lahan (hektar)</label>
                                <input class="form-control" name="luas_lahan" id="luas_lahan" type="text"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Masukkan luas lahan (hektar)'"
                                    placeholder='Masukkan luas lahan (hektar)' value="{{old('luas_lahan')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="latitude">Latitude <a
                                        href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DAndroid&hl=id"
                                        data-toggle="latitude" class="fas fa-question-circle"
                                        target="_blank"></a></label>
                                <input class="form-control" name="latitude" id="latitude" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan latitude'"
                                    placeholder='Masukkan latitude' value="{{old('latitude')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="longitude">Longitude <a
                                        href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DAndroid&hl=id"
                                        class="fas fa-question-circle" target="_blank"></a></label>
                                <input class="form-control" name="longitude" id="longitude" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan longitude'"
                                    placeholder='Masukkan longitude' value="{{old('longitude')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ktp">Scan KTP</label>
                                <input class="form-control-file" name="ktp" id="ktp" type="file">
                                @error('ktp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="spptpbb">Scan SPPT PBB</label>
                                <input class="form-control-file" name="spptpbb" id="spptpbb" type="file">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="permohonan">Scan Surat Permohonan</label>
                                <input class="form-control-file" name="permohonan" id="permohonan" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" value="upload" class="button button-contactForm btn_1">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Buttonwood, California.</h3>
                        <p>Rosemead, CA 91770</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>00 (440) 9865 562</h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>support@colorlib.com</h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection