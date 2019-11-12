@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')
<!-- ================ contact section start ================= -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="accordion">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <tr>
                            <th>Bibit</th>
                            <th>Bibit tersedia</th>
                            <th>Jadwal bibit siap ambil</th>
                            <th>Detail</th>
                        </tr>
                        @foreach ($bibit as $b)
                        <tr>
                            <td>{{$b->bibit}}</td>
                            <td>{{$b->kuota}}</td>
                            <td>{{$b->panen}}</td>
                            <td><button data-toggle="modal" data-target="#bibit{{$b->id}}"
                                    class="badge badge-primary">detail</button></td>
                                    
                            <div class="modal fade" id="bibit{{$b->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="bibit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bibit">Deskripsi</h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{$b->deskripsi}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
@endsection