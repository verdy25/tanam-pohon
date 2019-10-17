@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    <a href="{{route('kondisi.create')}}" class="btn btn-primary mb-3">Tambah kondisi lahan</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data kondisi lahan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kondisi) == 0)
                        <td colspan="5" class="text-center">Data tidak ada</td>
                        @else
                        @foreach ($kondisi as $k)
                        <tr>
                            <td>{{$k->id}}</td>
                            <td>{{$k->kondisi}}</td>
                            <td>
                                <a href="{{route('kondisi.show', $k->id)}}" class="btn btn-primary"> Lihat detail</a>
                                <a href="{{route('kondisi.edit', $k->id)}}" class="btn btn-warning">Edit</a>
                                <form class="d-inline" method="POST" action="{{route('kondisi.destroy', $k->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">hapus</button>
                                </form>
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