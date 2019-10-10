@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data permintaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID pengajuan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>No handphone</th>
                            <th>Bibit yang diminta</th>
                            <th>Jumlah bibit</th>
                            <th>Luas lahan</th>
                            <th>KTP</th>
                            <th>SPPT PBB</th>
                            <th>Surat Permohonan</th>
                            <th>Status pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permintaan as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->penanggungjawab}}</td>
                            <td>{{$p->alamat}}</td>
                            <td>{{$p->nik}}</td>
                            <td>{{$p->telp}}</td>
                            <td>{{$p->bibit->bibit}}</td>
                            <td>{{$p->jumlah_bibit}}</td>
                            <td>{{$p->luas_lahan}}</td>
                            <td><a href="{{ url('/ktp/'.$p->ktp) }}">ktp</a></td>
                            <td><a href="{{ url('/spptpbb/'.$p->spptpbb) }}">SPPT PBB</a></td>
                            <td><a href="{{ url('/permohonan/'.$p->permohonan) }}" target="_blank">Surat
                                    Permohonan</a>
                            </td>
                            <td>
                                <a href="/permintaan/{{$p->id}}/status" class="btn 
                                    @if ($p->id === 1)
                                    btn-danger
                                    @elseif($p->id === 2)
                                    btn-success
                                    @elseif($p->id === 3)
                                    btn-warning
                                    @else
                                    btn-secondary
                                    @endif
                                    ">{{$p->statuspengajuan->status}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection