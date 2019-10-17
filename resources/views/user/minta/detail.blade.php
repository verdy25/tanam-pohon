@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <form class="form-contact contact_form" method="get" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <h3>#ID<b> {{$permintaan->id}}</b></h2>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="penanggungjawab">Nama</label>
                            <input class="form-control" name="penanggungjawab" id="penanggungjawab" type="text"
                                value="{{$permintaan->penanggungjawab}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" type="text"
                                value="{{$permintaan->alamat}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input class="form-control" name="nik" id="nik" type="text" value="{{$permintaan->nik}}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="telp">Nomor HP</label>
                            <input class="form-control" name="telp" id="telp" type="text" value="{{$permintaan->telp}}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <p>{{$permintaan->tujuan}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="bibit_id">Bibit</label>
                            <input class="form-control" name="telp" id="telp" type="text"
                                value="{{$permintaan->bibit->bibit}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jumlah_bibit">Jumlah bibit</label>
                            <input class="form-control" name="jumlah_bibit" id="jumlah_bibit" type="text"
                                value="{{$permintaan->jumlah_bibit}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="luas_lahan">Luas lahan</label>
                            <input class="form-control" name="luas_lahan" id="luas_lahan" type="text"
                                value="{{$permintaan->luas_lahan}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input class="form-control" name="latitude" id="latitude" type="text"
                                value="{{$permintaan->latitude}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input class="form-control" name="longitude" id="longitude" type="text"
                                value="{{$permintaan->longitude}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <ul>
                                <li>BERKAS</li>
                                <li><a href="{{ url('/ktp/'.$permintaan->ktp) }}">KTP</a></li>
                                <li><a href="{{ url('/spptpbb/'.$permintaan->spptpbb) }}">SPPT PBB</a></li>
                                <li><a href="{{ url('/permohonan/'.$permintaan->permohonan) }}">Surat
                                        Permohonan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection