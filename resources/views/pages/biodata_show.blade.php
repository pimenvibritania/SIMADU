@extends('layouts.default')

@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Profile</h6>
    </div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{URL::asset('assets/vendor/img/curved0.jpg')}}'); background-position-y: 50%;">
            <span class="mask opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{URL::asset('uploads/profile/' . $bio->img_profile)}}" onerror="this.src='https://i.stack.imgur.com/l60Hf.png'" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$bio->user->name}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{$bio->user->status == 'tki' ? 'Tenaga Kerja Indonesia' : 'Mahasiswa'}}
                        </p>
                    </div>
                </div>
                <div class="col-auto mt-3 ml-auto my-auto">
                    <a class="btn btn-secondary" href="{{route('biodata.edit')}}">
                        <i class="fas fa-pen-alt mr-3"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-4 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
{{--                            <div class="col-md-4 text-end">--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <hr class="horizontal gray-light my-1">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nama:</strong> {{$bio->user->name}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nama Arab:</strong> {{$bio->nama}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tempat Tanggal Lahir:</strong> {{$bio->tempat_lahir}}, {{$bio->tanggal_lahir->format('d/m/Y')}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nomor Induk:</strong> {{$bio->no_induk}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Jenis Kelamin:</strong> {{$bio->kelamin}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Agama:</strong> {{$bio->agama}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tinggi Badan:</strong> {{$bio->tinggi_badan}} cm
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Status:</strong> {{$bio->pernikahan}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nomor Paspor:</strong> {{$bio->no_paspor}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Jenis Paspor:</strong> {{$bio->jenis_paspor}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nomor Telefon Mesir:</strong> {{$bio->no_mesir}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nomor Telefon Indonesia:</strong> {{$bio->no_indo}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Advanced Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <hr class="horizontal gray-light my-1">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Alamat di Indonesia:</strong>
                                {{$bio->alamat_indo}} - {{$bio->desa_indo}}, {{$bio->kecamatan_indo}},
                                {{$bio->kota_indo}}, {{$bio->provinsi_indo}} {{$bio->pos_indo}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Alamat di Mesir:</strong>
                                {{$bio->alamat_mesir}}, {{$bio->kota_mesir}} - {{$bio->provinsi_mesir}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tanggal Keluar Paspor:</strong> {{$bio->keluar_paspor}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tanggal Berlaku Paspor:</strong>
                                {{$bio->berlaku_paspor_from->format('d/m/Y')}} - {{$bio->berlaku_paspor_to->format('d/m/Y')}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tanggal Tiba di Mesir:</strong> {{$bio->tiba_mesir->format('d/m/Y')}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tanggal Lapor:</strong> {{$bio->tanggal_lapor->format('d/m/y')}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Dikeluarkan Oleh:</strong> {{$bio->dikeluarkan_oleh}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Pendidikan Terakhir:</strong> {{$bio->pendidikan_akhir}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Pekerjaan:</strong> {{$bio->pekerjaan}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Tujuan di Mesir:</strong> {{$bio->tujuan_mesir}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Relationship Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <hr class="horizontal gray-light my-1">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nama Pasangan:</strong> {{$bio->nama_pasangan}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nama Ayah:</strong> {{$bio->nama_ayah}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Nama Ibu:</strong>
                                {{$bio->nama_ibu}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Alamat Ayah:</strong> {{$bio->alamat_ayah}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Alamat Ibu:</strong> {{$bio->alamat_ibu}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Pekerjaan Ayah:</strong> {{$bio->pekerjaan_ayah}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">Pekerjaan Ibu:</strong> {{$bio->pekerjaan_ibu}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">No Telfon Ayah:</strong> {{$bio->no_ayah}}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">No Telfon Ibu:</strong> {{$bio->no_ibu}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Assets</h6>
                        <p class="text-sm">Aset - aset User</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-xl-4 col-md-4 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative" style="text-align: center">
                                        <a class="d-block shadow-xl border-radius-xl pt-3 pb-3">
                                            <img
                                                style="background-size: cover;
                                                       background-repeat: no-repeat;
                                                       background-position: center center;
                                                       cursor: pointer;
                                                       height: 200px;"
                                                onclick="window.open(this.src, '_blank');"
                                                src="{{URL::asset('uploads/ktp/' . $bio->img_ktp)}}" onerror="this.src='https://martialartsplusinc.com/wp-content/uploads/2017/04/default-image-620x600.jpg'" alt="Image Asset" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0 text-center">
                                        <a href="javascript:;">
                                            <h5>
                                                Foto KTP
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative" style="text-align: center">
                                        <a class="d-block shadow-xl border-radius-xl pt-3 pb-3" id="single-image">
                                            <img
                                                style="background-size: cover;
                                                       background-repeat: no-repeat;
                                                       background-position: center center;
                                                       cursor: pointer;
                                                       height: 200px;"
                                                onclick="window.open(this.src, '_blank');"
                                                src="{{URL::asset('uploads/paspor/' . $bio->img_paspor)}}" onerror="this.src='https://martialartsplusinc.com/wp-content/uploads/2017/04/default-image-620x600.jpg'"  alt="Image Asset" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0 text-center">
                                        <a href="javascript:;">
                                            <h5>
                                                Foto Paspor
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative" style="text-align: center">
                                        <a class="d-block shadow-xl border-radius-xl pt-3 pb-3">
                                            <img
                                                style="background-size: cover;
                                                       background-repeat: no-repeat;
                                                       background-position: center center;
                                                       cursor: pointer;
                                                       height: 200px;"
                                                onclick="window.open(this.src, '_blank');"
                                                src="{{URL::asset('uploads/akte/' . $bio->img_akte)}}" onerror="this.src='https://martialartsplusinc.com/wp-content/uploads/2017/04/default-image-620x600.jpg'"  alt="Image Asset" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0 text-center">
                                        <a href="javascript:;">
                                            <h5>
                                                Foto Akta Kelahiran
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
