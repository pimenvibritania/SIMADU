@extends('layouts.default')
@section('content')
    <div class="container">

        {{--        Surat menyurat WNI--}}
        @if(auth()->user()->roles->first()->name == 'tki')
        <div class="card mb-5">
            <div class="row card-header">
                <div class="col-md-6">
                    Layanan Pengajuan dan Permohonan bagi WNI
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('izin-tinggal.index')}}" style="text-decoration: none">
                            <div class="card izin-tinggal">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN TINGGAL</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pengampunan.index')}}" style="text-decoration: none">
                            <div class="card pengampunan">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PENGAMPUNAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('alamat-mesir.index')}}" style="text-decoration: none">
                            <div class="card mesir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KETERANGAN ALAMAT DI MESIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('alamat-indonesia.index')}}" style="text-decoration: none">
                            <div class="card indonesia">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KETERANGAN ALAMAT DI INDONESIA</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('masuk-mesir.index')}}" style="text-decoration: none">
                            <div class="card gerbang-mesir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN MASUK MESIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
{{--                                <div class="ico-card">--}}
{{--                                    <i class="fa fa-institution ex-card"></i>--}}
{{--                                </div>--}}
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('visa-haji.index')}}" style="text-decoration: none">
                            <div class="card haji">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        VISA HAJI</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('visa-umroh.index')}}" style="text-decoration: none">
                            <div class="card umroh">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        VISA UMROH</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('keterangan-lahir.index')}}" style="text-decoration: none">
                            <div class="card lahir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KETERANGAN LAHIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('kepentingan.index')}}" style="text-decoration: none">
                            <div class="card kepentingan">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        SURAT BERKEPENTINGAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('tidak-keluar-negeri.index')}}" style="text-decoration: none">
                            <div class="card airport">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                         TIDAK
                                    KELUAR NEGERI</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('tidak-keluar-negeri.index')}}" style="text-decoration: none">
                            <div class="card kepentingan">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>

                                        KELUAR NEGERI</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

{{--            SURAT MENYURAT MAHASISWA--}}
        @else
        <div class="card mb-5">
            <div class="row card-header">
                <div class="col-md-6">
                    Layanan Pengajuan dan Permohonan bagi Mahasiswa
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('keterangan-belajar.index')}}" style="text-decoration: none">
                            <div class="card izin-tinggal">
                                <div class="txt">
                                    <h1>SURAT </br>
                                        KETERANGAN BELAJAR</h1>
                                    <p>
                                        lorem ipsum
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pindah-kuliah-indonesia.index')}}" style="text-decoration: none">
                            <div class="card pengampunan">
                                <div class="txt">
                                    <h1>SURAT PINDAH</br>
                                        KULIAH KE INDONESIA</h1>
                                    <p>
                                        lorem ipsum

                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pindah-kuliah-luar-negeri.index')}}" style="text-decoration: none">
                            <div class="card mesir">
                                <div class="txt">
                                    <h1>SURAT PINDAH</br>
                                        KULIAH KE LUAR NEGERI</h1>
                                    <p>
                                        lorem ipsum

                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('masuk-kuliah.index')}}" style="text-decoration: none">
                            <div class="card pengampunan">
                                <div class="txt">
                                    <h1>DAFTAR </br>
                                        KULIAH</h1>
                                    <p>
                                       lorem
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('masuk-mahad.index')}}" style="text-decoration: none">
                            <div class="card mesir">
                                <div class="txt">
                                    <h1>MASUK </br>
                                        MA'HAD</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('kuliah-iftha.index')}}" style="text-decoration: none">
                            <div class="card indonesia">
                                <div class="txt">
                                    <h1>KULIAH </br>
                                        IFTHA</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('ket-non-beasiswa.index')}}" style="text-decoration: none">
                            <div class="card gerbang-mesir">
                                <div class="txt">
                                    <h1>KETERANGAN </br>
                                        TIDAK MENERIMA BEASISWA</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('masuk-ruak.index')}}" style="text-decoration: none">
                            <div class="card izin-tinggal">
                                <div class="txt">
                                    <h1>DAFTAR MASUK </br>
                                        RUAK</h1>
                                    <p>
                                        LOREM
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('cuti-kuliah.index')}}" style="text-decoration: none">
                            <div class="card haji">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        CUTI KULIAH</h1>
                                    <p>
                                        LOREM
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pindah-fakultas.index')}}" style="text-decoration: none">
                            <div class="card umroh">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PINDAH FAKULTAS</h1>
                                    <p>
                                      LOREM
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('cabut-berkas.index')}}" style="text-decoration: none">
                            <div class="card lahir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        CABUT BERKAS</h1>
                                    <p>
                                       LOREM
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('daftar-nilai.index')}}" style="text-decoration: none">
                            <div class="card kepentingan">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        DAFTAR NILAI</h1>
                                    <p>
                                        LOREM
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('keringanan-biaya.index')}}" style="text-decoration: none">
                            <div class="card airport">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KERINGANAN BIAYA</h1>
                                    <p>
                                        LOREM
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('minta-tashdiq.index')}}" style="text-decoration: none">
                            <div class="card kepentingan">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>

                                        PERMINTAAN TASHDIQ</h1>
                                    <p>
                                       LOREM
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('izin-libur.index')}}" style="text-decoration: none">
                            <div class="card mesir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN LIBUR</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('izin-sakit.index')}}" style="text-decoration: none">
                            <div class="card indonesia">
                                <div class="txt">
                                    <h1>PENGAJUAN TIDAK MENGIKUTI </br>
                                        UJIAN KARENA SAKIT</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('izin-tawaquf.index')}}" style="text-decoration: none">
                            <div class="card gerbang-mesir">
                                <div class="txt">
                                    <h1>PENGAJUAN TIDAK MENGIKUTI </br>
                                        UJIAN (TAWAQUF)</h1>
                                    <p>
                                        lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <div class="card mb-5">
            <div class="row card-header">
                <div class="col-md-6">
                    Layanan Umum
                </div>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('akta-lahir.index')}}" style="text-decoration: none">
                            <div class="card akta">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>

                                        AKTA KELAHIRAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('legalisir.index')}}" style="text-decoration: none">
                            <div class="card legalisir">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>

                                        LEGALISIR DOKUMEN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
