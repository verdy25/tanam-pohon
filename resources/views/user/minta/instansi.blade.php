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
                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form class="form-contact contact_form" method="post" action="/minta" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama">Nama instansi</label>
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
                                    placeholder='Masukkan tujuan anda' maxlength="191">{{old('tujuan')}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="bibit_id">Bibit</label>
                                <select name="bibit_id" id="bibit_id" class="form-control">
                                    @foreach ($bibits as $bibit)
                                    @if (old('bibit_id') == $bibit->id)
                                    <option value="{{ $bibit->id }}" selected>{{ $bibit->bibit }}</option>
                                    @else
                                    <option value="{{$bibit->id}}">
                                        {{$bibit->bibit}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                                <p id="kuota"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jumlah_bibit">Jumlah bibit</label>
                                <input class="form-control" name="jumlah_bibit" id="jumlah_bibit" type="text"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Masukkan jumlah bibit maksimal 1500'"
                                    placeholder='Masukkan jumlah bibit' value="{{old('jumlah_bibit')}}">
                                <p>Maksimal hanya bisa mengambil 1500</p>
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
                                <label for="latitude">Latitude</label>
                                <input class="form-control" name="latitude" id="latitude" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan latitude'"
                                    placeholder='Masukkan latitude' value="{{old('latitude')}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input class="form-control" name="longitude" id="longitude" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan longitude'"
                                    placeholder='Masukkan longitude' value="{{old('longitude')}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div id="map" style="width: 100%; height:300px"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ktp">Scan KTP</label>
                                <input class="form-control-file" name="ktp" id="ktp" type="file">
                                <p>Maksimal file berukuran 2 Mb</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="spptpbb">Scan SPPT PBB</label>
                                <input class="form-control-file" name="spptpbb" id="spptpbb" type="file">
                                <p>Maksimal file berukuran 2 Mb</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="permohonan">Scan Surat Permohonan</label>
                                <input class="form-control-file" name="permohonan" id="permohonan" type="file">
                                <p>Maksimal file berukuran 2 Mb</p>
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
<script>
    $('#kuota').hide();
    
        var bibit = {!! json_encode($bibits->toArray(), JSON_HEX_TAG) !!};
        $('#bibit_id').change(function() {
            $('#kuota').show()
            $('#kuota').text('Tersedia: '+bibit[$(bibit_id).val()].kuota)
        });
        
</script>
<script>
    var maxBounds = L.latLngBounds(
            L.latLng(-7.468461, 112.427748), //Southwest
            L.latLng(-8.758753, 114.593636)  //Northeast
        );
    
        var options = {
            center: [-8.184486, 113.668076],
            zoom: 13,
            maxBounds: maxBounds
        }
        var map = L.map('map', options).fitBounds(maxBounds)
    
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        var marker;
        var latitude;
        var longitude;
    
        map.on('click',
            function (e) {
                var coord = e.latlng.toString().split(',');
                var lat = coord[0].split('(');
                var lng = coord[1].split(')');
                // alert("You clicked the map at LAT: " + lat[1] + " and LONG: " + lng[0]);
                // L.marker(e.latlng).addTo(map);
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = new L.Marker(e.latlng).addTo(map);
                latitude = lat[1]
                longitude = lng[0]
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude
            });
</script>
@endsection