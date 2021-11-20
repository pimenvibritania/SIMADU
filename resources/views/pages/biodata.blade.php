@extends('layouts.default')

<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/form.css')}}">
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@section('biodata')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <div id="booking">
        <div>
            <div class="text-center">
                <h1>PROFIL LENGKAP</h1>
            </div>
            <div class="container mt-2">
                <div class="booking-form">
                    <h3 class="register-heading text-center mb-3">Silahkan lengkapi form di bawah</h3>

                    <form method="POST" action="{{route('biodata.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row p-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <span class="form-label">Nama Indonesia</span>
                                    <input value="{{auth()->user()->name}}" class="form-control" readonly type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">No Registrasi</span>
                                    <input name="noreg" class="form-control" readonly type="text" value="{{$noreg}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nip'))
                                        <span class="text-danger">{{ $errors->first('nip') }}</span>
                                    @endif
                                    <span class="form-label">Nomor Induk Pelajar (NIP)
                                        @if(auth()->user()->status == 'pelajar')
                                            <span style="color: red">*</span>
                                        @endif
                                    </span>
                                    <input name="nip" value="{{old('nip')}}" class="form-control"
                                        @if(auth()->user()->status == 'pelajar')
                                            required
                                        @endif
                                       type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('niw'))
                                        <span class="text-danger">{{ $errors->first('niw') }}</span>
                                    @endif
                                    <span class="form-label">Nomor Induk WNI - Non Pelajar (NIW)
                                        @if(auth()->user()->status != 'pelajar')
                                            <span style="color: red">*</span>
                                        @endif
                                    </span>
                                    <input name="niw" value="{{old('niw')}}" class="form-control"
                                           @if(auth()->user()->status == 'pelajar')
                                            required
                                           @endif
                                           type="text">
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                    <span class="form-label">Nama Arab <span style="color: red">*</span></span>
                                    <input name="nama" value="{{old('nama')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    @if ($errors->has('kelamin'))
                                        <span class="text-danger">{{ $errors->first('kelamin') }}</span>
                                    @endif
                                        <span class="form-label">Jenis Kelamin <span style="color: red">*</span></span>

                                        <select name="kelamin" class="form-control" required>
                                        <option value="laki"
                                                @if(old('kelamin') == "laki") selected="selected" @endif>
                                            Laki - laki
                                        </option>
                                        <option value="perempuan"
                                                @if(old('kelamin') == "perempuan") selected="selected" @endif>
                                            Perempuan
                                        </option>
                                        <option value="other"
                                                @if(old('kelamin') == "other") selected="selected" @endif>
                                            Other
                                        </option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('agama'))
                                        <span class="text-danger">{{ $errors->first('agama') }}</span>
                                    @endif
                                        <span class="form-label">Agama <span style="color: red">*</span></span>
                                        <select name="agama" class="form-control" required>
                                            @foreach($agama as $value)
                                                <option value="{{$value->nama}}"
                                                        @if(old('agama') == "{{$value->nama}}") selected="selected" @endif>
                                                    {{$value->nama}}
                                                </option>
                                            @endforeach
                                        </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('pernikahan'))
                                        <span class="text-danger">{{ $errors->first('pernikahan') }}</span>
                                    @endif
                                        <span class="form-label">Status Pernikahan <span style="color: red">*</span></span>

                                        <select name="pernikahan" class="form-control" required>
                                        <option value="lajang"
                                                @if(old('pernikahan') == "lajang") selected="selected" @endif>
                                            Lajang
                                        </option>
                                        <option value="menikah"
                                                @if(old('pernikahan') == "menikah") selected="selected" @endif>
                                            Menikah
                                        </option>
                                        <option value="duda"
                                                @if(old('pernikahan') == "duda") selected="selected" @endif>
                                            Duda
                                        </option>
                                        <option value="janda"
                                                @if(old('pernikahan') == "janda") selected="selected" @endif>
                                            Janda
                                        </option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tempat_lahir'))
                                        <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                    @endif
                                    <span class="form-label">Tempat Lahir <span style="color: red">*</span></span>
                                    <input name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tanggal_lahir'))
                                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                    @endif
                                    <span class="form-label">Tanggal Lahir <span style="color: red">*</span></span>
                                    <input value="{{old('tanggal_lahir')}}" name="tanggal_lahir" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tinggi_badan'))
                                        <span class="text-danger">{{ $errors->first('tinggi_badan') }}</span>
                                    @endif
                                    <span class="form-label">Tinggi Badan</span>
                                    <input name="tinggi_badan" value="{{old('tinggi_badan')}}" class="form-control" required type="number" min="1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('jenis_vipa_1'))
                                        <span class="text-danger">{{ $errors->first('jenis_vipa_1') }}</span>
                                    @endif
                                        <span class="form-label">Jenis VIPA 1 <span style="color: red">*</span></span>

                                        <select name="jenis_vipa_1" class="form-control" required>
                                        <option value="satu"
                                                @if(old('kelamin') == "laki") selected="selected" @endif>
                                            Satu
                                        </option>
                                        <option value="dua"
                                                @if(old('kelamin') == "laki") selected="selected" @endif>
                                            Dua
                                        </option>
                                        <option value="tiga"
                                                @if(old('kelamin') == "laki") selected="selected" @endif>
                                            Tiga
                                        </option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('no_paspor'))
                                        <span class="text-danger">{{ $errors->first('no_paspor') }}</span>
                                    @endif
                                    <span class="form-label">No Paspor <span style="color: red">*</span></span>
                                    <input name="no_paspor" value="{{old('no_paspor')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('jenis_paspor'))
                                        <span class="text-danger">{{ $errors->first('jenis_paspor') }}</span>
                                    @endif
                                        <span class="form-label">Jenis Paspor <span style="color: red">*</span></span>
                                        <select name="jenis_paspor" class="form-control" required>
                                            @foreach($jenisPaspor as $value)
                                                <option value="{{$value->nama}}"
                                                        @if(old('jenis_paspor') == "{{$value->nama}}") selected="selected" @endif>
                                                    {{$value->nama}}
                                                </option>
                                            @endforeach
                                        </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('keluar_paspor'))
                                        <span class="text-danger">{{ $errors->first('keluar_paspor') }}</span>
                                    @endif
                                    <span class="form-label">Tanggal Keluar Paspor <span style="color: red">*</span></span>
                                    <input value="{{old('keluar_paspor')}}" name="keluar_paspor" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('dikeluarkan_oleh'))
                                        <span class="text-danger">{{ $errors->first('dikeluarkan_oleh') }}</span>
                                    @endif
                                    <span class="form-label">Dikeluarkan Oleh <span style="color: red">*</span></span>
                                    <input name="dikeluarkan_oleh" value="{{old('dikeluarkan_oleh')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('berlaku_paspor_from'))
                                        <span class="text-danger">{{ $errors->first('berlaku_paspor_from') }}</span>
                                    @endif
                                    <span class="form-label">Berlaku Paspor Dari- <span style="color: red">*</span></span>
                                    <input value="{{old('berlaku_paspor_from')}}" name="berlaku_paspor_from" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('berlaku_paspor_to'))
                                        <span class="text-danger">{{ $errors->first('berlaku_paspor_to') }}</span>
                                    @endif
                                    <span class="form-label">Berlaku Paspor Sampai- <span style="color: red">*</span></span>
                                    <input value="{{old('berlaku_paspor_to')}}" name="berlaku_paspor_to" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tiba_mesir'))
                                        <span class="text-danger">{{ $errors->first('tiba_mesir') }}</span>
                                    @endif
                                    <span class="form-label">Tiba Di Mesir <span style="color: red">*</span></span>
                                    <input value="{{old('tiba_mesir')}}" name="tiba_mesir" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tanggal_lapor'))
                                        <span class="text-danger">{{ $errors->first('tanggal_lapor') }}</span>
                                    @endif
                                    <span class="form-label">Tanggal Lapor <span style="color: red">*</span></span>
                                    <input value="{{old('tanggal_lapor')}}" name="tanggal_lapor" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pendidikan_akhir'))
                                        <span class="text-danger">{{ $errors->first('pendidikan_akhir') }}</span>
                                    @endif
                                    <span class="form-label">Pendidikan Terakhir</span>
                                    <input name="pendidikan_akhir" value="{{old('pendidikan_akhir')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('tujuan_mesir'))
                                        <span class="text-danger">{{ $errors->first('tujuan_mesir') }}</span>
                                    @endif
                                    <span class="form-label">Tujuan Ke Mesir <span style="color: red">*</span></span>
                                    <input name="tujuan_mesir" value="{{old('tujuan_mesir')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pekerjaan'))
                                        <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
                                    @endif
                                    <span class="form-label">Pekerjaan</span>
                                    <input name="pekerjaan" value="{{old('pekerjaan')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nama_pasangan'))
                                        <span class="text-danger">{{ $errors->first('nama_pasangan') }}</span>
                                    @endif
                                    <span class="form-label">Nama Pasangan</span>
                                    <input name="nama_pasangan" value="{{old('nama_pasangan')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    @if ($errors->has('catatan'))
                                        <span class="text-danger">{{ $errors->first('catatan') }}</span>
                                    @endif
                                    <span class="form-label">Catatan</span>
                                    <textarea class="form-control" value="{{old('catatan')}}" name="catatan"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nama_ayah'))
                                        <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                                    @endif
                                    <span class="form-label">Nama Ayah <span style="color: red">*</span></span>
                                    <input name="nama_ayah" value="{{old('nama_ayah')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nama_ibu'))
                                        <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                                    @endif
                                    <span class="form-label">Nama Ibu <span style="color: red">*</span></span>
                                    <input name="nama_ibu" value="{{old('nama_ibu')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('alamat_ayah'))
                                        <span class="text-danger">{{ $errors->first('alamat_ayah') }}</span>
                                    @endif
                                    <span class="form-label">Alamat Ayah <span style="color: red">*</span></span>
                                    <textarea class="form-control" value="{{old('alamat_ayah')}}" name="alamat_ayah"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('alamat_ibu'))
                                        <span class="text-danger">{{ $errors->first('alamat_ibu') }}</span>
                                    @endif
                                    <span class="form-label">Alamat Ibu <span style="color: red">*</span></span>
                                    <textarea class="form-control" value="{{old('alamat_ibu')}}" name="alamat_ibu"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pekerjaan_ayah'))
                                        <span class="text-danger">{{ $errors->first('pekerjaan_ayah') }}</span>
                                    @endif
                                    <span class="form-label">Pekerjaan Ayah <span style="color: red">*</span></span>
                                    <input name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pekerjaan_ibu'))
                                        <span class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</span>
                                    @endif
                                    <span class="form-label">Pekerjaan Ibu <span style="color: red">*</span></span>
                                    <input name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('no_ayah'))
                                        <span class="text-danger">{{ $errors->first('no_ayah') }}</span>
                                    @endif
                                    <span class="form-label">No Telepon Ayah <span style="color: red">*</span></span>
                                    <input name="no_ayah" value="{{old('no_ayah')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('no_ibu'))
                                        <span class="text-danger">{{ $errors->first('no_ibu') }}</span>
                                    @endif
                                    <span class="form-label">No Telepon Ibu <span style="color: red">*</span></span>
                                    <input name="no_ibu" value="{{old('no_ibu')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('alamat_mesir'))
                                        <span class="text-danger">{{ $errors->first('alamat_mesir') }}</span>
                                    @endif
                                    <span class="form-label">Alamat di Mesir <span style="color: red">*</span></span></span>
                                    <textarea class="form-control" value="{{old('alamat_mesir')}}" name="alamat_mesir"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('provinsi_mesir'))
                                        <span class="text-danger">{{ $errors->first('provinsi_mesir') }}</span>
                                    @endif
                                    <span class="form-label">Provinsi di Mesir <span style="color: red">*</span></span></span>
                                    <input name="provinsi_mesir" value="{{old('provinsi_mesir')}}" class="form-control"
                                           required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('kota_mesir'))
                                        <span class="text-danger">{{ $errors->first('kota_mesir') }}</span>
                                    @endif
                                    <span class="form-label">Kota di Mesir <span style="color: red">*</span></span></span>
                                    <input name="kota_mesir" value="{{old('kota_mesir')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('no_mesir'))
                                        <span class="text-danger">{{ $errors->first('no_mesir') }}</span>
                                    @endif
                                    <span class="form-label">No Telepon di Mesir <span style="color: red">*</span></span></span>
                                    <input name="no_mesir" value="{{old('no_mesir')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('alamat_indo'))
                                        <span class="text-danger">{{ $errors->first('alamat_indo') }}</span>
                                    @endif
                                    <span class="form-label">Alamat di Indonesia <span style="color: red">*</span></span></span>
                                    <textarea class="form-control" value="{{old('alamat_indo')}}" name="alamat_indo"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('provinsi_indo'))
                                        <span class="text-danger">{{ $errors->first('provinsi_indo') }}</span>
                                    @endif
                                    <span class="form-label">Provinsi di Indonesia <span style="color: red">*</span></span></span>

                                    <select id="prov_indo" class="form-control" name="provinsi_indo">
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('kota_indo'))
                                        <span class="text-danger">{{ $errors->first('kota_indo') }}</span>
                                    @endif
                                        <span class="form-label">Kota di Indonesia <span style="color: red">*</span></span></span>

                                    <select class="form-control" id="kota_indo" name="kota_indo" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('kecamatan_indo'))
                                        <span class="text-danger">{{ $errors->first('kecamatan_indo') }}</span>
                                    @endif
                                        <span class="form-label">Kecamatan di Indonesia <span style="color: red">*</span></span></span>
                                    <select class="form-control" id="kec_indo" name="kecamatan_indo" disabled>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    @if ($errors->has('desa_indo'))
                                        <span class="text-danger">{{ $errors->first('desa_indo') }}</span>
                                    @endif
                                        <span class="form-label">Desa di Indonesia <span style="color: red">*</span></span></span>
                                    <select id="desa_indo" class="form-control" name="desa_indo" disabled>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    @if ($errors->has('pos_indo'))
                                        <span class="text-danger">{{ $errors->first('pos_indo') }}</span>
                                    @endif
                                    <span class="form-label">Kode Pos di Indonesia <span style="color: red">*</span></span></span>
                                    <input name="pos_indo" value="{{old('pos_indo')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    @if ($errors->has('no_indo'))
                                        <span class="text-danger">{{ $errors->first('no_indo') }}</span>
                                    @endif
                                    <span class="form-label">No Telepon di Indonesia <span style="color: red">*</span></span></span>
                                    <input name="no_indo" value="{{old('no_indo')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('file_img_profile'))
                                        <span class="text-danger">{{ $errors->first('file_img_profile') }}</span>
                                    @endif
                                    <span class="form-label">Foto Profil <span style="color: red">*</span></span></span>
                                    <input name="file_img_profile" value="{{old('file_img_profile')}}" class="form-control" required type="file">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('file_img_akte'))
                                        <span class="text-danger">{{ $errors->first('file_img_akte') }}</span>
                                    @endif
                                    <span class="form-label">Foto Akta Kelahiran <span style="color: red">*</span></span></span>
                                    <input name="file_img_akte" value="{{old('file_img_akte')}}" class="form-control" required type="file">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('file_img_ktp'))
                                        <span class="text-danger">{{ $errors->first('file_img_ktp') }}</span>
                                    @endif
                                    <span class="form-label">Foto KTP <span style="color: red">*</span></span></span>
                                    <input name="file_img_ktp" value="{{old('file_img_ktp')}}" class="form-control" required type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    @if ($errors->has('file_img_paspor'))
                                        <span class="text-danger">{{ $errors->first('file_img_paspor') }}</span>
                                    @endif
                                    <span class="form-label">Foto Paspor <span style="color: red">*</span></span></span>
                                    <input name="file_img_paspor" value="{{old('file_img_paspor')}}" class="form-control" required type="file">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nama_mediator'))
                                        <span class="text-danger">{{ $errors->first('nama_mediator') }}</span>
                                    @endif
                                    <span class="form-label">Nama Mediator <span style="color: red">*</span></span>
                                    <input name="nama_mediator" value="{{old('nama_mediator')}}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('kontak_mediator'))
                                        <span class="text-danger">{{ $errors->first('kontak_mediator') }}</span>
                                    @endif
                                    <span class="form-label">Kontak Mediator <span style="color: red">*</span></span>
                                    <input name="kontak_mediator" value="{{old('kontak_mediator')}}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('nama_mitra_mediator'))
                                        <span class="text-danger">{{ $errors->first('nama_mitra_mediator') }}</span>
                                    @endif
                                    <span class="form-label">Nama Mitra Mediator <span style="color: red">*</span></span>
                                    <input name="nama_mitra_mediator" value="{{old('nama_mitra_mediator')}}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('kontak_mitra_mediator'))
                                        <span class="text-danger">{{ $errors->first('kontak_mitra_mediator') }}</span>
                                    @endif
                                    <span class="form-label">Kontak Mitra Mediator <span style="color: red">*</span></span>
                                    <input name="kontak_mitra_mediator" value="{{old('kontak_mitra_mediator')}}" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('institute_id'))
                                        <span class="text-danger">{{ $errors->first('institute_id') }}</span>
                                    @endif
                                    <span class="form-label">Institute <span style="color: red">*</span></span>
                                    <select name="institute_id" class="form-control" required>
                                        @foreach($institute as $value)
                                            <option value="{{$value->id}}"
                                                    @if(old('institute_id') == "{{$value->id}}") selected="selected" @endif>
                                                {{$value->name_en}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('fakultas_id'))
                                        <span class="text-danger">{{ $errors->first('fakultas_id') }}</span>
                                    @endif
                                    <span class="form-label">Fakultas <span style="color: red">*</span></span>
                                    <select name="fakultas_id" class="form-control" required>
                                        @foreach($fakultas as $value)
                                            <option value="{{$value->id}}"
                                                    @if(old('fakultas_id') == "{{$value->id}}") selected="selected" @endif>
                                                {{$value->name_en}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('master_level_id'))
                                        <span class="text-danger">{{ $errors->first('master_level_id') }}</span>
                                    @endif
                                    <span class="form-label">Tingkat <span style="color: red">*</span></span>
                                    <select name="master_level_id" class="form-control" required>
                                        @foreach($tingkat as $value)
                                            <option value="{{$value->id}}"
                                                    @if(old('master_level_id') == "{{$value->id}}") selected="selected" @endif>
                                                {{$value->tingkat}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('jenjang_id'))
                                        <span class="text-danger">{{ $errors->first('jenjang_id') }}</span>
                                    @endif
                                    <span class="form-label">Jenjang <span style="color: red">*</span></span>
                                    <select name="jenjang_id" class="form-control" required>
                                        @foreach($jenjang as $value)
                                            <option value="{{$value->id}}"
                                                    @if(old('jenjang_id') == "{{$value->id}}") selected="selected" @endif>
                                                {{$value->name_en}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <div class="form-btn">
                                    <button type="submit" class="submit-btn">SUBMIT</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
<script >
    $(document).ready(function() {
        $.ajax({
            url: `{{route('wilayah.provinsi')}}` ,
            type: 'get',
            dataType: 'json',
            success: function(response) {
               let res = response.provinsi;
               let provinsi = "<option disabled selected>-- Pilih Provinsi--</option>"
               provinsi += res.map(function (data) {
                    return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                })

                $('#prov_indo').append(provinsi)

            }
        })

        $('#prov_indo').on('change', function () {
            let prov_id = $(this).children("option:selected").attr('id');
            $('#kota_indo').prop('disabled', false);

            $.ajax({
                url: `{{url('wilayah/kota')}}/${prov_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.kota;
                    let kota = "<option disabled selected>-- Pilih Kota/Kabupaten--</option>"
                    kota += res.map(function (data) {
                        return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                    })

                    $('#kota_indo')
                        .find('option')
                        .remove()
                        .end()
                        .append(kota)

                }
            })
            $('#kec_indo').empty();
            $('#desa_indo').empty();

        })

        $('#kota_indo').on('change', function (){
            let kota_id = $(this).children("option:selected").attr('id');
            $('#kec_indo').prop('disabled', false);

            $.ajax({
                url: `{{url('wilayah/kecamatan')}}/${kota_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.kecamatan;
                    let kecamatan = "<option disabled selected>-- Pilih Kecamatan--</option>"
                    kecamatan += res.map(function (data) {
                        return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                    })
                    $('#kec_indo')
                        .find('option')
                        .remove()
                        .end()
                        .append(kecamatan)
                }
            });
            $('#desa_indo').empty();

        })

        $('#kec_indo').on('change', function (){
            let kec_id = $(this).children("option:selected").attr('id');
            $('#desa_indo').prop('disabled', false);

            $.ajax({
                url: `{{url('wilayah/desa')}}/${kec_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.desa;
                    let desa = "<option disabled selected>-- Pilih Desa --</option>"
                    desa += res.map(function (data) {
                        return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                    })

                    $('#desa_indo')
                        .find('option')
                        .remove()
                        .end()
                        .append(desa)

                }
            })
        })
    });
</script>
@endsection
