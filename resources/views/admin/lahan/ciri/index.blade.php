@extends('mylayouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" id="app">
    <a href="{{route('ciri.create')}}" class="btn btn-primary mb-3">Tambah ciri-ciri lahan</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data ciri-ciri lahan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ciri</th>
                            <th>Pertanyaan</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($ciri) == 0)
                        <td colspan="5" class="text-center">Data tidak ada</td>
                        @else
                        @foreach ($ciri as $c)
                        <tr>
                            <td>{{$c->ciri}}</td>
                            <td>{{$c->pertanyaan}}</td>
                            <td>{{$c->bobot}}</td>
                            <td>
                                <a href="{{route('ciri.edit', $c->id)}}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="POST" action="{{route('ciri.destroy', $c->id)}}">
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