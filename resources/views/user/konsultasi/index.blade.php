@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection

@section('content')

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2 class="contact-title">Konsultasikan lahan anda</h2>
                @if ($konsultasi->count() > 0)
                <a href="{{route('konseling.riwayat')}}" class="btn btn-info">Riwayat konseling</a>
                @endif
                <h4 class="mb-3 mt-3">Isilah kuesioner dibawah ini sesuai dengan keadaan lahan anda</h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Isi kuesioner minimal 1
                </div>
                @endif
                <form class="form-contact contact_form" method="post" action="{{route('konseling.store')}}">
                    @csrf
                    <div class="row">
                        @foreach ($ciri as $c)
                        <div class="col-sm-5">
                            <div class="checkbox">
                                <label><input type="checkbox" name="ciri[]" value="{{$c->id}}">
                                    {{$c->ciri}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection