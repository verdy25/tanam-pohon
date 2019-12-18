@extends('mylayouts.admin')

@section('content')
<link href="{{ asset('leaflet/leaflet.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('leaflet/leaflet-src.js') }}"></script>
<div class="container-fluid" id="app">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan #{{$permintaan->id}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="GET">
                    <table class="table table-borderless" id="dataTable" width="100%">
                        <tr>
                            <td>Akun</td>
                            <td><a href="{{route('masyarakat.detail', $profile->id)}}" class="badge badge-primary" target="_blank">{{$profile->nama}}</a></td>
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
                            <td>Berkas</td>
                            <td>
                                <a href="{{ url('/ktp/'.$permintaan->ktp) }}" target="_blank"
                                    class="btn btn-primary"><span class="fas fa-file-image"></span> KTP</a>
                                <a href="{{ url('/spptpbb/'.$permintaan->spptpbb) }}" target="_blank"
                                    class="btn btn-secondary"><span class="fas fa-file-image"></span> SPPT PBB</a>
                                <a href="{{ url('/permohonan/'.$permintaan->permohonan) }}" target="_blank"
                                    class="btn btn-warning"><span class="fas fa-file-image"></span> Surat Permohonan</a>
                            </td>
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
                        @if (auth()->user()->role_id == 1)
                        <tr>
                            <td>Status</td>
                            <td>
                                {{$permintaan->statuspengajuan->status}}
                            </td>
                        </tr>
                        @endif
                    </table>

                </form>
            </div>
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