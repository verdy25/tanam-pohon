@extends('mylayouts.app')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb bibit_bg align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <div class="breadcrumb_tittle">
                    <h2>Permintaan bibit saya</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Data permintaan anda</h2>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID pengajuan</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>NIK</th>
                                <th>No handphone</th>
                                <th>Tujuan</th>
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
                            <td>{{$p->tujuan}}</td>
                            <td>{{$p->bibit->bibit}}</td>
                            <td>{{$p->jumlah_bibit}}</td>
                            <td>{{$p->luas_lahan}}</td>
                            <td><a href="{{ url('/ktp/'.$p->ktp) }}">ktp</a></td>
                            <td><a href="{{ url('/spptpbb/'.$p->spptpbb) }}">SPPT PBB</a></td>
                            <td><a href="{{ url('/permohonan/'.$p->permohonan) }}" target="_blank">Surat Permohonan</a></td>
                            <td>{{$p->statuspengajuan->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection