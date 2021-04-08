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
                        <a href="{{route('izin-tinggal.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN TINGGAL</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-home ex-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pengampunan.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PENGAMPUNAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-hammer"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('alamat-mesir.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KETERANGAN ALAMAT DI MESIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-flag-o"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('masuk-mesir.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN MASUK MESIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-institution ex-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('pengampunan.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PENGAMPUNAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-hammer"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{route('alamat-mesir.create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        KETERANGAN ALAMAT DI MESIR</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-flag-o"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{url('/surat/izin-tinggal/create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN TINGGAL</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-home ex-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="#" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PERPINDAHAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-walking"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="#" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>KELUARGA</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri anngota
                                        Keluarga yang berada di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-group ex-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{url('/surat/izin-tinggal/create')}}" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        IZIN TINGGAL</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika Anda
                                        pulang dan menetap kembali di Indonesia
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-home ex-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="#" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>
                                        PERPINDAHAN</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri jika
                                        Anda pindah antar Negara di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="ex-card fa fa-walking"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 column">
                        <a href="#" style="text-decoration: none">
                            <div class="card gr-1">
                                <div class="txt">
                                    <h1>PENGAJUAN </br>KELUARGA</h1>
                                    <p>
                                        Digunakan untuk melakukan lapor diri anngota
                                        Keluarga yang berada di luar negeri
                                    </p>
                                </div>
                                <div class="ico-card">
                                    <i class="fa fa-group ex-card"></i>
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
