@extends('mylayouts.admin')

@section('content')
<link href="{{ asset('leaflet/leaflet.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('leaflet/leaflet-src.js') }}"></script>
<div id="content">
    <div class="container-fluid mt-3">
        <div class="col-lg-10 col-xl-10 col-md-10">
            <h4 class="text-dark mb-4">Ubah status permohonan</h4>
            <form method="POST" action="/pengajuan/{{$permintaan->id}}">
                @method('put')
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <td>ID pengajuan</td>
                        <td>{{$permintaan->id}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{$permintaan->penanggungjawab}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{$permintaan->alamat}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>{{$permintaan->nik}}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>{{$permintaan->telp}}</td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>{{$permintaan->tujuan}}</td>
                    </tr>
                    <tr>
                        <td>Bibit yang diminta</td>
                        <td>{{$permintaan->bibit->bibit}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah bibit</td>
                        <td>{{$permintaan->jumlah_bibit}}</td>
                    </tr>
                    <tr>
                        <td>Luas lahan</td>
                        <td>{{$permintaan->luas_lahan}}</td>
                    </tr>
                    <tr>
                        <td>Letak lahan</td>
                        <td>
                            <input type="text" id="lat" value="{{$permintaan->latitude}}" hidden>
                            <input type="text" id="lng" value="{{$permintaan->longitude}}" hidden>
                            <div id="map" style="width:100%; height:300px"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>KTP</td>
                        <td><a href="{{ url('/ktp/'.$permintaan->ktp) }}" target="_blank">ktp</a></td>
                    </tr>
                    <tr>
                        <td>SPPT PBB</td>
                        <td><a href="{{ url('/spptpbb/'.$permintaan->spptpbb) }}" target="_blank">SPPT PBB</a></td>
                    </tr>
                    <tr>
                        <td>Surat Permohonan</td>
                        <td><a href="{{ url('/permohonan/'.$permintaan->permohonan) }}" target="_blank">Surat
                                Permohonan</a></td>
                    </tr>
                    @if ($bukti->count() != 0)
                    <tr>
                        <td>Bukti</td>
                        <td>
                            @foreach ($bukti as $item)
                            <img width="300px" src="{{url('/bukti/'.$item->bukti)}}">
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>Status</td>
                        <td>
                            @foreach ($status as $s)
                            <label class="radio-inline"><input type="radio" name="status" value="{{$s->id}}" @if($s->id
                                === $permintaan->status)
                                checked
                                @endif
                                > {{$s->status}}</label>
                            @endforeach
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Ubah status</button>
            </form>
        </div>
    </div>
</div>
<script>
    var maxBounds = L.latLngBounds(
                    L.latLng(-7.468461, 112.427748), //Southwest
                    L.latLng(-8.758753, 114.593636)  //Northeast
                );
        
                var lat =  document.getElementById("lat").value
                var lng =  document.getElementById("lng").value
            
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