@extends('mylayouts.admin')

@section('content')

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
                    <tr>
                        <td>Status</td>
                        <td>
                            @foreach ($status as $s)
                            @if ($s->id == 4 || $s->id==3)
                            <label class="radio-inline"><input type="radio" name="status" value="{{$s->id}}" @if($s->id
                                === $permintaan->status)
                                checked
                                @endif
                                > {{$s->status}}</label>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Ubah status</button>
            </form>
        </div>
    </div>
</div>
@endsection