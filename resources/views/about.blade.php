@extends('mylayouts.app')

@section('breadcrumb')
@include('mylayouts.breadcrumb.modify')
@endsection
@section('content')
<style>
    ol.number {
        list-style-type: decimal;
    }

    ol.point {
        list-style-type: circle;
    }
</style>
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Tata cara permohonan bibit persemaian permanen Jember</h2>
            </div>
            <div class="col-lg-12">
                <ol class="number">
                    <li><strong>Mengajukan surat permohonan kepada BPDASHL Brantas Sampean.</strong><br> Alamat kantor :
                        Jl.
                        RM
                        Mangundiprojo No. 1 Buduran - Sidoarjo 61252, Telp./Fax : 031-99034969</li>
                    <li><strong>Surat permohonan</strong> ditandatangani oleh :
                        <ol class="point">
                            <li>Perorangan : RT/RW/Kepala Desa</li>
                            <li>Kelompok Tani/ORMAS/LSM : RT/RW/Kepala Desa dan atau diketahui oleh penyuluh kehutanan
                                setempat</li>
                            <li>Instansi/Perguruan tinggi/Sekolah : Kepala instansi/Perguruan tinggi/Sekolah</li>
                        </ol>
                    </li>
                    <li><strong>Surat permohonan WAJIB</strong> mencantumkan dan melampirkan hal-hal sebagai berikut
                        <ol class="point">
                            <li>Perorangan/Kelompok tani/LSM:
                                <ol class="number">
                                    <li>Foto copy KTP</li>
                                    <li>Foto copy SPT PBB</li>
                                    <li>Tujuan permohonan bantuan bibit</li>
                                    <li>Luas (ha) dan letak calon lokasi penanaman</li>
                                    <li>Nama dan nomor HP yang bisa dihubungi</li>
                                </ol>
                            </li>
                            <li>Instansi/Perguruan tinggi/Sekolah
                                <ol class="number">
                                    <li>Tujuan permohonan bantuan bibit</li>
                                    <li>Jumlah dan jenis bibit yang dibutuhkan</li>
                                    <li>Luas (ha) dan letak calon lokasi penanaman</li>
                                    <li>Nama dan nomor HP yang bisa dihubungi</li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li>Pemohon dapat mengambil bibit setelah mendapat konfirmasi dari kantor BPDASHL Brans Sampean</li>
                    <li>Pemohon melakukan konfirmasi jumlah dan waktu pengambilan minimal 2 hari sebelumnya dengan menghubungi sdr. Danny Tlp. 085-230-481-596</li>
                    <li>Pengambilan bibit menjadi tanggung jawab pemohon dan dapat dilakukan di Persemaian Permanen jember yang terletak di Desa Karangpring, Kecamatan Sukorambi, Kabupaten Jember pada hari Senin - Sabtu jam 07.00 - 16.00</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection