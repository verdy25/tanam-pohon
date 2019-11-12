@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data pengajuan bibit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($masyarakats->count() == null)
                            <td colspan="4" class="text-center">data kosong</td>
                        @else
                        @foreach ($masyarakats as $m)
                        <tr>
                            <td>{{$m->nama}}</td>
                            <td>{{$m->email}}</td>
                            <td>
                                <a href="{{route('masyarakat.detail', $m->id), }}" class="btn btn-primary">detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection