@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')
<link href="{{ asset('leaflet/leaflet.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('leaflet/leaflet-src.js') }}"></script>
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>#ID<b> {{$permintaan->id}}</b></h2>
            </div>
            <form class="form-contact contact_form col-8" method="get" enctype="multipart/form-data">
                <div class="row">
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
                                value="{{$permintaan->luas_lahan}} hektar" disabled>
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div id="map" style="width:100%; height:300px"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <ul>
                                <li><strong>Berkas</strong></li>
                                <li><a href="{{ url('/ktp/'.$permintaan->ktp) }}" target="_blank"
                                        class="btn btn-primary mb-2"><span class="fas fa-file-image"></span> KTP</a>
                                </li>
                                <li><a href="{{ url('/spptpbb/'.$permintaan->spptpbb) }}" target="_blank"
                                        class="btn btn-primary mb-2"><span class="fas fa-file-image"></span> SPPT
                                        PBB</a>
                                </li>
                                <li><a href="{{ url('/permohonan/'.$permintaan->permohonan) }}" target="_blank"
                                        class="btn btn-primary mb-2"><span class="fas fa-file-image"></span> Surat
                                        Permohonan</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <ul>
                                <li><strong>Status</strong></li>
                                <li>
                                    @if ($permintaan->status != 5 && $permintaan->status != 6)
                                    <span class="badge @if($permintaan->status === 1) badge-secondary 
                                            @elseif($permintaan->status === 2) badge-danger 
                                            @elseif($permintaan->status === 3) badge-primary 
                                            @else badge-success 
                                            @endif">{{$permintaan->statuspengajuan->status}}</span>
                                    @else
                                    <span class="badge @if($permintaan->status == 5) badge-success
                                            @else badge-danger 
                                            @endif">bibit diterima - {{$permintaan->statuspengajuan->status}}</span>
                                    @endif
                                </li>
                                <li>
                                    @if ($pengambilan->count() != null)
                                    <p class="badge badge-success">
                                        Pengambilan : {{$pengambilan->tanggal_pengambilan}}
                                    </p><br>
                                    <p class="badge badge-warning">
                                        Batas : {{$pengambilan->tanggal_batas}}
                                    </p>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-4">
                @if ($permintaan->status == 4)
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @error ('bukti')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$message}}
                </div>
                @enderror
                <form class="form-contact contact_form" method="post" action="/minta/{{$permintaan->id}}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group card text-white bg-primary mb-3">
                        <div class="card-header">
                            <label for="bukti"><strong> Upload bukti tanam </strong><br>(max 4 foto, 1 foto max 2
                                mb)</label>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control-file mb-3" name="bukti">
                            <input type="text" name="permintaan_id" value="{{$permintaan->id}}" hidden>
                            <button type="submit" value="upload" class="btn btn-light">Upload</button>
                        </div>
                    </div>
                </form>
                <div class="card bg-white mb-3">
                    <div class="card-header"><strong> Bukti yang di upload </strong></div>
                    <div class="card-body">
                        @foreach ($bukti as $item)
                        <div class="img-wrap">
                            <a href="{{route('bukti.hapus', $item->id)}}" class="close">&times;</a>
                            <img width="150px" src="{{url('/bukti/'.$item->bukti)}}">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @if ($permintaan->status == 5)

            @endif
        </div>
    </div>
</section>

<style>
    .img-wrap {
        position: relative;
        display: inline-block;
        border: 1px red solid;
        font-size: 0;
    }

    .img-wrap .close {
        position: absolute;
        top: 4px;
        right: 4px;
        z-index: 100;
        background-color: #FFF;
        padding: 2px 2px;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        opacity: .2;
        text-align: center;
        font-size: 16px;
        line-height: 10px;
        border-radius: 50%;
    }

    .img-wrap:hover .close {
        opacity: 1;
    }
</style>
<script>
    var maxBounds = L.latLngBounds(
            L.latLng(-7.468461, 112.427748), //Southwest
            L.latLng(-8.758753, 114.593636)  //Northeast
        );

        var lat =  document.getElementById("latitude").value
        var lng =  document.getElementById("longitude").value
    
        var options = {
            center: [lat, lng],
            zoom: 13,
            maxBounds: maxBounds
        }
        var map = L.map('map', options).fitBounds(maxBounds)
        L.marker([lat, lng]).addTo(map);
    
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
</script>
@endsection