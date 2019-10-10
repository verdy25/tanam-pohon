@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="{{url('bibit/create')}}" class="btn btn-primary mb-3">Tambah bibit</a>

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
                                <a href="/bibit/{{$bit->id}}/edit" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="POST" action="/bibit/{{$bit->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">hapus</button>
                                </form>
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