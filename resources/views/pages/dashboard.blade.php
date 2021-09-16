@extends('layouts.default')

@php
    $notification = \Illuminate\Support\Facades\DB::table('notifications')
        ->where('notifiable_id', backpack_user()->id);
    $notif = $notification->whereYear('created_at', '=', now()->format('Y'))
        ->whereMonth('created_at', '=', now()->format('m'))->get();
    $allNotif = $notification->get();
    $total_notif = count($notif);
@endphp

@section('content')
    <div class="container-fluid">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </div>
        <div class="row mt-4">
            @php
                $setuju= 0;
                $tolak =0;
                foreach ($allNotif as $all){
                    json_decode($all->data)->data->status == 'disetujui'
                    ? $setuju++
                    : $tolak++;
                }
            @endphp
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Surat Yang Diajukan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{count($allNotif)}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-mail-bulk text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Surat Yang Disetujui</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$setuju}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-envelope-open text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Surat Yang Ditolak</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$tolak}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-envelope text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Projects</h6>
                                <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">Total {{$total_notif}} pengajuan</span> pada bulan ini.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Surat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengajuan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengambilan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penanda Tangan</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($notif as $not)
                                    @php
                                        $dateAmbil = date_create(json_decode($not->data)->data->tgl_ambil);
                                        $dateAjukan = date_create(json_decode($not->data)->data->created_at);
                                        if (json_decode($not->data)->data->tanda_tangan_id != null){
                                            $ttd = \App\Models\TandaTangan::find(json_decode($not->data)->data->tanda_tangan_id);
                                            $ttdName = $ttd->nama;
                                        } else {
                                            $ttdName = '-';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="text-sm text-center" style="width: 20px">
                                            <span class="text-sm font-weight-bold">  {{$index++}} </span>
                                        </td>
                                        <td class="text-sm" >
                                            <a href="{{route(json_decode($not->data)->uri)}}">
                                                <span class="text-sm font-weight-bold"> {{json_decode($not->data)->data->no_surat}}</span>
                                            </a>
                                        </td>
                                        <td class="text-sm text-center" >
                                            <span class="text-sm font-weight-bold"> {{$dateAjukan->format('d, M Y')}}</span>
                                        </td>
                                        <td class="text-sm text-center" >
                                            <span class="text-sm font-weight-bold">  {{$dateAmbil->format('d, M Y')}} </span>
                                        </td>
                                        <td class="text-sm text-center" >
                                            <span class="text-sm font-weight-bold">  {{json_decode($not->data)->data->status}} </span>
                                        </td>
                                        <td class="text-sm text-center" >
                                            <span class="text-sm font-weight-bold">  {{$ttdName}} </span>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src=""></script>
@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
