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
                    Pengajuan dan Permohonan
                </div>
               <div class="col-md-6">
                  <a href="{{route('surat.dashboard')}}" class="link-dashboard">
                      <i class="fa fa-hand-o-right"></i>
                      Lainnya ...
                  </a>
               </div>
           </div>
           @if(auth()->user()->hasROle('tki'))
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

               </div>
           </div>
           @else
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
                           <a href="{{route('pengampunan.index')}}" style="text-decoration: none">
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
                           <a href="{{route('alamat-mesir.index')}}" style="text-decoration: none">
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

                   </div>
               </div>
           @endif
       </div>

    </div>

@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
