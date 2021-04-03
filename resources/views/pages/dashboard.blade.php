@extends('layouts.default')
@section('content')
    <div class="container">

        @if(session()->has('successMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('successMsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    {{--Dashboard--}}
        <div class="card mb-5">
            <div class="card-header">
                    Dashboard

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="jumbotron">
                        <h1 class="display-4">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="" href="#" role="button">Learn more</a>
                    </div>

                </div>
            </div>
        </div>

        {{--        Surat menyurat--}}
       <div class="card mb-5">
           <div class="row card-header">
                <div class="col-md-6">
                    Surat - Menyurat
                </div>
               <div class="col-md-6">
                  <a href="#" class="link-dashboard">
                      <i class="fa fa-hand-o-right"></i>
                      Lainnya ...
                  </a>
               </div>
           </div>
           <div class="card-body">
               <div class="row">
                   <div class="col-md-6 col-lg-4 column">
                       <a href="{{url('/surat/izin-tinggal/create')}}" style="text-decoration: none">
                           <div class="card gr-2">
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
                           <div class="card gr-3">
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

        {{--        Another--}}
        <div class="card">
            <div class="row card-header">
                <div class="col-md-6">
                    Lapor
                </div>
                <div class="col-md-6">
                    <a href="#" class="link-dashboard">
                        <i class="fa fa-hand-o-right"></i>
                        Lainnya ...
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4 column">
                        <a href="{{url('/surat/izin-tinggal/create')}}" style="text-decoration: none">
                            <div class="card gr-2">
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
                            <div class="card gr-3">
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
