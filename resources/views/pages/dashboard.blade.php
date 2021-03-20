@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row align-middle">
            <div class="col-md-6 col-lg-4 column">
                <div class="card gr-1">
                    <div class="txt">
                        <h1>PENGAJUAN </br>
                            PERPINDAHAN</h1>
                        <p>
                            Digunakan untuk melakukan lapor diri jika
                            Anda pindah antar Negara di luar negeri
                        </p>
                    </div>
                    <a href="#">
                        <span class="fa fa-hand-o-right"></span>
                        more
                    </a>
                    <div class="ico-card">
                        <i class="fa fa-walking"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 column">
                <div class="card gr-2">
                    <div class="txt">
                        <h1>PENGAJUAN </br>
                            KEPULANGAN</h1>
                        <p>
                            Digunakan untuk melakukan lapor diri jika Anda
                            pulang dan menetap kembali di Indonesia

                        </p>
                    </div>
                    <a href="#">
                        <span class="fa fa-hand-o-right"></span>
                        more
                    </a>
                    <div class="ico-card">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 column">
                <div class="card gr-3">
                    <div class="txt">
                        <h1>PENGAJUAN </br>KELUARGA</h1>
                        <p>
                            Digunakan untuk melakukan lapor diri anngota
                            Keluarga yang berada di luar negeri
                        </p>
                    </div>
                    <a href="#">
                        <span class="fa fa-hand-o-right"></span>
                        more
                    </a>
                    <div class="ico-card">
                        <i class="fa fa-group"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
