@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection
@section('content')
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Data permintaan anda</h2>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID Pengajuan</th>
                                <th>Nama</th>
                                <th>Pengajuan</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($permintaan->count() == 0)
                            <td colspan="4" class="text-center">Data kosong</td>
                            @else
                            @foreach ($permintaan as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->penanggungjawab}}</td>
                                <td>Minta {{$p->bibit->bibit}} sebanyak {{$p->jumlah_bibit}} buah</td>
                                <td><span class="badge @if($p->status === 1) badge-secondary 
                                        @elseif($p->status === 2) badge-danger 
                                        @elseif($p->status === 3) badge-primary 
                                        @elseif($p->status === 4) badge-success 
                                        @elseif($p->status === 5) badge-success 
                                        @elseif($p->status === 6) badge-danger
                                        @endif">{{$p->statuspengajuan->status}}</span>
                                </td>
                                <td><a class="badge badge-info" href="{{route('minta.show', $p->id)}}">
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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection