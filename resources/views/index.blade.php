@extends('mylayouts.app')

@section('content')
<!-- banner part start-->
<section class="banner_part">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 offset-lg-1">
        <div class="banner_text">
          <div class="banner_text_iner">
            <h5>tanam pohonmu, biar tumbuh pohon</h5>
            <h1>Ajukan bibit pohon</h1>
            <button data-toggle="modal" data-target="#ajukanModal" class="btn_1">Ajukan!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner part start-->

<div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="ajukanModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ajukanModalLabel">Pengajuan untuk?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Pilih pengajuan</div>
        <div class="modal-footer">
            {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
            <a class="btn btn-primary" href="{{ route('minta.individu') }}">Perorangan</a>
            <a class="btn btn-primary" href="{{ route('minta.kelompok') }}">Kelompok</a>
            <a class="btn btn-primary" href="{{ route('minta.instansi') }}">Institusi</a>
        </div>
    </div>
</div>
</div>

@endsection