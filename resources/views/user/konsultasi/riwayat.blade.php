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
                <h2 class="contact-title">Riwayat konsultasi</h2>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Hasil konsultasi</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($konsultasi->count() == 0)
                            <td colspan="3" class="text-center">Anda belum pernah konsultasi</td>
                            @else
                            @foreach ($konsultasi as $k)
                            <tr>
                                <td>{{$k->created_at}}</td>
                                <td>{{$k->kondisi->kondisi}}</td>
                                <td><button data-toggle="modal" data-target="#detailKondisi{{$k->id}}"
                                        class="badge badge-primary">detail</button></td>
                                        
                                <div class="modal fade" id="detailKondisi{{$k->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="detailKondisi" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailKondisi">Detail informasi hasil
                                                    konsultasi</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Lahan anda termasuk
                                                <b>{{$k->kondisi->kondisi}}</b><br>
                                                {{$k->kondisi->penanganan}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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