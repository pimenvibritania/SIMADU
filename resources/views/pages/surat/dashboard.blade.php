@extends('layouts.default')
@section('content')
    <div class="container">

        {{--        Surat menyurat--}}
        <div class="card mb-5">
            <div class="row card-header">
                <div class="col-md-6">
                    Surat - Menyurat
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
