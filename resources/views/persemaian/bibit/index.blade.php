@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @if (auth()->user()->role_id == 2)
    <a href="{{route('bibit.create')}}" class="btn btn-primary mb-3">Tambah bibit</a>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data bibit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-5">Bibit</th>
                            <th class="col-3">Kuota</th>
                            <th class="col-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($bibit) != 0)
                        @foreach ($bibit as $bit)
                        <tr class="d-flex">
                            <td class="col-5">{{$bit->bibit}}</td>
                            <td class="col-3">{{$bit->kuota}}</td>
                            <td class="col-4">
                                @if (auth()->user()->role_id == 2)
                                <a href="{{route('bibit.edit', $bit->id)}}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="POST" action="{{route('bibit.destroy', $bit->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">hapus</button>
                                </form>
                                @elseif(auth()->user()->role_id == 1)
                                <button class="btn btn-primary" data-toggle="modal" data-target="#detail">Detail</button>
                                <!-- Modal -->
                                <div class="modal fade" id="detail" tabindex="-1" role="dialog"
                                    aria-labelledby="detailLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail {{$bit->bibit}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>Jadwal panen </b>: {{$bit->panen}}</p>
                                                <p><b>Deskripsi </b>: {{$bit->deskripsi}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" class="text-center">Data kosong</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection