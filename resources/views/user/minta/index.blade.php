@extends('mylayouts.app')

@section('content')

<style>
    .breadcrumb {
        height: 100px;
    }

    .section_padding {
        padding-top: 50px;
    }
</style>

<!-- breadcrumb start-->
<section class="breadcrumb">
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
                                <th colspan="2">ID Pengajuan</th>
                                <th colspan="4">Nama</th>
                                <th colspan="6">Tujuan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaan as $p)
                            <tr>
                                <td colspan="2">{{$p->id}}</td>
                                <td colspan="4">{{$p->penanggungjawab}}</td>
                                <td colspan="6">{{$p->tujuan}}</td>
                                <td><a class="badge badge-primary" href="{{route('minta.show', $p->id)}}">
                                        detail</a></td>
                                {{-- <td>{{$p->bibit->bibit}}</td>
                                <td>{{$p->jumlah_bibit}}</td>
                                <td>{{$p->luas_lahan}}</td>
                                <td><a href="{{ url('/ktp/'.$p->ktp) }}">ktp</a></td>
                                <td><a href="{{ url('/spptpbb/'.$p->spptpbb) }}">SPPT PBB</a></td>
                                <td><a href="{{ url('/permohonan/'.$p->permohonan) }}" target="_blank">Surat
                                        Permohonan</a></td>
                                <td>{{$p->statuspengajuan->status}}</td> --}}
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