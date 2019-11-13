@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    input[type="date"]::-webkit-inner-spin-button {
        display: none;
        -webkit-appearance: none;
    }
</style>
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Profil anda</h2>
            </div>
            <div class="col-lg-8">
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
                <form class="form-contact contact_form" method="post" action="{{route('update.profile')}}">
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
                        <button type="submit" value="upload" class="button button-contactForm btn_1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var path = "{{ route('search.city') }}";
    $('#tempat_lahir').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#provinsi').change(function(){
    var provinsiID = $(this).val(); 
    console.log(provinsiID)   
    if(provinsiID){
        $.ajax({
           type:"GET",
           url:"{{route('city')}}?province_id="+provinsiID,
           success:function(res){               
            if(res){
                $("#kota").empty();
                $("#kota").append('<option>Pilih kota</option>');
                $("#kecamatan").empty();
                $("#kecamatan").append('<option>Pilih kecamatan</option>');
                $.each(res,function(key,value){
                    $("#kota").append('<option value="'+key+'">'+value+'</option>');
                });
            }else{
               $("#kota").empty();
               $("#kecamatan").empty();
            }
           }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
    }});

    $('#kota').on('change',function(){
        var kotaID;
        if(document.getElementById('kbptn').val == null){
            kotaID = $(this).val();    
        }else{
            kotaID = document.getElementById('kbptn').val;    
        }  
        if(kotaID){
            $.ajax({
            type:"GET",
            url:"{{url('district')}}?city_id="+kotaID,
            success:function(res){               
                if(res){
                    $("#kecamatan").empty();
                    $("#kecamatan").append('<option>Pilih kecamatan</option>');
                    $.each(res,function(key,value){
                        $("#kecamatan").append('<option value="'+key+'">'+value+'</option>');
                    });
            
                }else{
                $("#kecamatan").empty();
                }
            }
            });
        }else{
            $("#kecamatan").empty();
        }
            
    });
});
</script>
@endsection