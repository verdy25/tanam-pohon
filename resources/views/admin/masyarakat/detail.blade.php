@extends('mylayouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail profil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="GET">
                    <table class="table table-borderless" id="dataTable" width="100%" border="0">
                        <tr>
                            <td>Nama</td>
                            <td>: {{$masyarakat->nama}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{$masyarakat->email}}</td>
                        </tr>
                        <tr>
                            <td>HP</td>
                            <td>: {{$masyarakat->hp}}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal lahir</td>
                            <td>: {{$masyarakat->tempat_lahir}}, {{$masyarakat->tanggal_lahir}} </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{$masyarakat->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            @if ($masyarakat->kecamatan_id == null)
                            <td></td>
                            @else
                            <td>: {{$masyarakat->kecamatan->name}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Kabupaten</td>
                            @if ($masyarakat->kabupaten_id == null)
                            <td></td>
                            @else
                            <td>: {{$masyarakat->kabupaten->name}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            @if ($masyarakat->provinsi_id == null)
                            <td></td>
                            @else
                            <td>: {{$masyarakat->provinsi->name}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Riwayat Permintaan</td>
                            <td>@foreach ($permintaan as $p)
                                <a href="{{route('permintaan', $p->id)}}" class="badge badge-primary"
                                    target="_blank">#{{$p->id}}</a>
                                @endforeach</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection