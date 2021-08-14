@extends('layouts.default')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <div class="col-md-4 mb-3">
        <a href="{{route('akta-lahir.index')}}" class="btn btn-danger" >
            <i class="fa fa-arrow-left"></i>
            Kembali
        </a>
    </div>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{URL::asset('images/alamat-mesir.png')}}" alt=""/>
                <h3>FORM AKTA LAHIR</h3>
                <p>Pengajuan Akta Lahir</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Silahkan lengkapi form di bawah</h3>
                        <form class="row register-form" method="POST" action="{{route('akta-lahir.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @if ($errors->has('no_surat'))
                                    <span class="text-danger">{{ $errors->first('no_surat') }}</span>
                                @endif
                                @if ($errors->has('no_permohonan'))
                                    <span class="text-danger">{{ $errors->first('no_permohonan') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Kode Surat </label>
                                        <input type="text" class="form-control" placeholder="Kode Surat" name="no_surat"
                                               readonly value="{{$no_surat}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Permohonan</label>
                                        <input type="text" class="form-control" placeholder="Nama dengan bahasa Arab" name="no_permohonan"
                                               readonly value="{{$no_permohonan}}"/>
                                    </div>

                                </div>
                            </div>
{{--                            Data Pemohon--}}
                            <div class="row mt-4">
                                <h5>Data Pelapor</h5>
                                <hr>
                                @if ($errors->has('nama_pelapor'))
                                    <span class="text-danger">{{ $errors->first('nama_pelapor') }}</span>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama pelapor </label>
                                        <input type="text" class="form-control" placeholder="Nama Pelapor"
                                               readonly name="nama_pelapor" value="{{$user->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('nik_pelapor'))
                                    <span class="text-danger">{{ $errors->first('nik_pelapor') }}</span>
                                @endif
                                @if ($errors->has('hubungan'))
                                    <span class="text-danger">{{ $errors->first('hubungan') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">NIK </label>
                                        <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan"
                                               name="nik_pelapor" value="{{old('nik_pelapor')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Hubungan Dengan Bayi </label>
                                        <input type="text" class="form-control" placeholder="Hubungan Dengan Bayi"
                                               name="hubungan" value="{{old('hubungan')}}"/>
                                    </div>
                                </div>
                            </div>


                            {{--                            Data Bayi--}}
                            <div class="row mt-4">
                                <h5>Data Bayi</h5>
                                <hr>
                                @if ($errors->has('nama_bayi'))
                                    <span class="text-danger">{{ $errors->first('nama_bayi') }}</span>
                                @endif
                                @if ($errors->has('jenis_kelamin'))
                                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                @endif
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Bayi </label>
                                        <input type="text" class="form-control" placeholder="Nama Bayi"
                                               name="nama_bayi" value="{{old('nama_bayi')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Jenis Kelamin </label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('tempat_lahir'))
                                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                                @if ($errors->has('tgl_lahir'))
                                    <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tempat Lahir </label>

                                        <input type="text" class="form-control" placeholder="Tempat Lahir"
                                               name="tempat_lahir" value="{{old('tempat_lahir')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tanggal Lahir </label>
                                        <input type="datetime-local" class="datetime form-control" placeholder="Tanggal Lahir"
                                               name="tgl_lahir" value="{{old('tgl_lahir')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('berat_kg'))
                                    <span class="text-danger">{{ $errors->first('berat_kg') }}</span>
                                @endif
                                @if ($errors->has('berat_ons'))
                                    <span class="text-danger">{{ $errors->first('berat_ons') }}</span>
                                @endif
                                @if ($errors->has('panjang'))
                                    <span class="text-danger">{{ $errors->first('panjang') }}</span>
                                @endif
                                <div class="col-md-4">
                                    <label class="mb-1">Berat Bayi - KG</label>
                                    <div class="input-group mb-2">
                                        <input type="number" min="0" class="form-control" placeholder="Berat Bayi"
                                               name="berat_kg" value="{{old('berat_kg')}}"/>                                        <div class="input-group-append">
                                        <div class="input-group-append">
                                            <span class="input-group-text">KG</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="mb-1">Berat Bayi - ONS</label>
                                    <div class="input-group mb-2">
                                        <input type="number" min="0" class="form-control" placeholder="Berat Bayi"
                                               name="berat_ons" value="{{old('berat_ons')}}"/>                                        <div class="input-group-append">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ONS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="mb-1">Panjang Bayi </label>
                                    <div class="input-group mb-2">
                                        <input type="number" min="0" class="form-control" placeholder="Panjang Bayi"
                                               name="panjang" value="{{old('panjang')}}"/>                                        <div class="input-group-append">
                                            <div class="input-group-append">
                                                <span class="input-group-text">CM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('jenis_kelahiran'))
                                    <span class="text-danger">{{ $errors->first('jenis_kelahiran') }}</span>
                                @endif
                                @if ($errors->has('kelahiran_ke'))
                                    <span class="text-danger">{{ $errors->first('kelahiran_ke') }}</span>
                                @endif
                                @if ($errors->has('anak_ke'))
                                    <span class="text-danger">{{ $errors->first('anak_ke') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Jenis Kelahiran </label>
                                        <input type="text" class="form-control" placeholder="Jenis Kelahiran"
                                               name="jenis_kelahiran" value="{{old('jenis_kelahiran')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Kelahiran ke </label>
                                        <input type="number" min="1" class="form-control" placeholder="Kelahiran ke"
                                               name="kelahiran_ke" value="{{old('kelahiran_ke')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Anak ke </label>
                                        <input type="number" min="1" class="form-control" placeholder="Anak ke"
                                               name="anak_ke" value="{{old('anak_ke')}}"/>
                                    </div>
                                </div>
                            </div>

{{--                            Data Rumah sakit--}}
                            <div class="row mt-4">
                                <h5>Data Tempat Dilahirkan</h5>
                                <hr>
                                @if ($errors->has('tempat_kelahiran'))
                                    <span class="text-danger">{{ $errors->first('tempat_kelahiran') }}</span>
                                @endif
                                @if ($errors->has('no_surat_rs'))
                                    <span class="text-danger">{{ $errors->first('no_surat_rs') }}</span>
                                @endif
                                @if ($errors->has('tgl_surat_rs'))
                                    <span class="text-danger">{{ $errors->first('tgl_surat_rs') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tempat Kelahiran </label>
                                        <input type="text" class="form-control" placeholder="Tempat Kelahiran"
                                               name="tempat_kelahiran" value="{{old('tempat_kelahiran')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Surat RS</label>
                                        <input type="text" class="form-control" placeholder="No Surat RS"
                                               name="no_surat_rs" value="{{old('no_surat_rs')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tanggal Surat RS</label>
                                        <input type="date" class="date form-control" placeholder="Tanggal Surat RS"
                                               name="tgl_surat_rs" value="{{old('tgl_surat_rs')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('nama_rs'))
                                    <span class="text-danger">{{ $errors->first('nama_rs') }}</span>
                                @endif
                                @if ($errors->has('alamat_rs'))
                                    <span class="text-danger">{{ $errors->first('alamat_rs') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Rumah Sakit </label>
                                        <input type="text" class="form-control" placeholder="Nama Rumah Sakit"
                                               name="nama_rs" value="{{old('nama_rs')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Alamat Rumah Sakit </label>
                                        <textarea class="form-control" placeholder="Alamat Lengkap Rumah Sakit"
                                                  name="alamat_rs">{{old('alamat_rs')}}</textarea>
                                    </div>
                                </div>
                            </div>

{{--                            Data Pencatatan Kelahiran--}}
                            <div class="row mt-4">
                                <h5>Data Bukti Pencatatan Kelahiran</h5>
                                <hr>
                                @if ($errors->has('no_bukti'))
                                    <span class="text-danger">{{ $errors->first('no_bukti') }}</span>
                                @endif
                                @if ($errors->has('tgl_bukti'))
                                    <span class="text-danger">{{ $errors->first('tgl_bukti') }}</span>
                                @endif
                                @if ($errors->has('penerbit'))
                                    <span class="text-danger">{{ $errors->first('penerbit') }}</span>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Bukti Pencatatan </label>
                                        <input type="text" class="form-control" placeholder="No Bukti Pencatatan"
                                               name="no_bukti" value="{{old('no_bukti')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tanggal Bukti Pencatatan </label>
                                        <input type="date" class="date form-control" placeholder="Tanggal Bukti Pencatatan"
                                               name="tgl_bukti" value="{{old('tgl_bukti')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Diterbitkan Oleh </label>
                                        <input type="text" class="form-control" placeholder="Diterbitkan Oleh"
                                               name="penerbit" value="{{old('penerbit')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('file_paspor_ayah'))
                                    <span class="text-danger">{{ $errors->first('file_paspor_ayah') }}</span>
                                @endif
                                @if ($errors->has('file_paspor_ibu'))
                                    <span class="text-danger">{{ $errors->first('file_paspor_ibu') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Scan Paspor Ayah </label>
                                        <input type="file" class="form-control"  name="file_paspor_ayah" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Scan Paspor Ibu </label>
                                        <input type="file" class="form-control"  name="file_paspor_ibu" />
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('file_izin_tinggal_ayah'))
                                    <span class="text-danger">{{ $errors->first('file_izin_tinggal_ayah') }}</span>
                                @endif
                                @if ($errors->has('file_izin_tinggal_ibu'))
                                    <span class="text-danger">{{ $errors->first('file_izin_tinggal_ibu') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Scan Surat Izin Tinggal Ayah </label>
                                        <input type="file" class="form-control"  name="file_izin_tinggal_ayah" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Scan Surat Izin Tinggal Ibu  </label>
                                        <input type="file" class="form-control"  name="file_izin_tinggal_ibu" />
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                @if ($errors->has('file_sk_dokter'))
                                    <span class="text-danger">{{ $errors->first('file_sk_dokter') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Scan Keterangan Dokter </label>
                                        <input type="file" class="form-control"  name="file_sk_dokter" />
                                    </div>
                                </div>

                            </div>

{{--                            Data Ibu--}}
                            <div class="row mt-4">
                                <h5>Data Ibu</h5>
                                <hr>
                                @if ($errors->has('nama_ibu'))
                                    <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                                @endif
                                @if ($errors->has('no_paspor_ibu'))
                                    <span class="text-danger">{{ $errors->first('no_paspor_ibu') }}</span>
                                @endif
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Ibu </label>
                                        <input type="text" class="form-control" placeholder="Nama Ibu"
                                               name="nama_ibu" value="{{old('nama_ibu')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Paspor Ibu </label>
                                        <input type="text" class="form-control" placeholder="No Paspor Ibu"
                                               name="no_paspor_ibu" value="{{old('no_paspor_ibu')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('pekerjaan_ibu'))
                                    <span class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</span>
                                @endif
                                @if ($errors->has('tgl_lahir_ibu'))
                                    <span class="text-danger">{{ $errors->first('tgl_lahir_ibu') }}</span>
                                @endif
                                @if ($errors->has('umur_ibu'))
                                    <span class="text-danger">{{ $errors->first('umur_ibu') }}</span>
                                @endif
                                <div class="col-md-7">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Pekerjaan Ibu </label>
                                        <input type="text" class="form-control" placeholder="Pekerjaan Ibu"
                                               name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tgl Lahir Ibu </label>
                                        <input type="date" class="date form-control" placeholder="Tgl Lahir Ibu"
                                               name="tgl_lahir_ibu" value="{{old('tgl_lahir_ibu')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Umur Ibu </label>
                                        <input type="number" class="form-control" min="1" placeholder="Umur Ibu"
                                               name="umur_ibu" value="{{old('umur_ibu')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('tlp_ibu_indo'))
                                    <span class="text-danger">{{ $errors->first('tlp_ibu_indo') }}</span>
                                @endif
                                @if ($errors->has('tlp_ibu_mesir'))
                                    <span class="text-danger">{{ $errors->first('tlp_ibu_mesir') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Tlp Ibu Indonesia </label>
                                        <input type="text" class="form-control" placeholder="No Tlp Ibu Indonesia"
                                               name="tlp_ibu_indo" value="{{old('tlp_ibu_indo')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Tlp Ibu Mesir </label>
                                        <input type="text" class="form-control" placeholder="No Tlp Ibu Mesir"
                                               name="tlp_ibu_mesir" value="{{old('tlp_ibu_mesir')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('alamat_indo_ibu'))
                                    <span class="text-danger">{{ $errors->first('alamat_indo_ibu') }}</span>
                                @endif
                                @if ($errors->has('alamat_mesir_ibu'))
                                    <span class="text-danger">{{ $errors->first('alamat_mesir_ibu') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Alamat Ibu Indonesia </label>
                                        <textarea class="form-control" name="alamat_indo_ibu"
                                            placeholder="Alamat Ibu Indonesia">{{old('alamat_indo_ibu')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Alamat Ibu Mesir </label>
                                        <textarea class="form-control" name="alamat_mesir_ibu"
                                                  placeholder="Alamat Ibu Mesir">{{old('alamat_mesir_ibu')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('kewarganegaraan_ibu'))
                                    <span class="text-danger">{{ $errors->first('kewarganegaraan_ibu') }}</span>
                                @endif
                                @if ($errors->has('agama_ibu'))
                                    <span class="text-danger">{{ $errors->first('agama_ibu') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Kewarganegaraan </label>
                                        <input type="text" class="form-control" placeholder="Kewarganegaraan"
                                               name="kewarganegaraan_ibu" value="{{old('kewarganegaraan_ibu')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Agama </label>
                                        <input type="text" class="form-control" placeholder="Agama"
                                               name="agama_ibu" value="{{old('agama_ibu')}}"/>
                                    </div>
                                </div>
                            </div>

{{--                            Data Ayah--}}
                            <div class="row mt-4">
                                <h5>Data Ayah</h5>
                                <hr>
                                @if ($errors->has('nama_ayah'))
                                    <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                                @endif
                                @if ($errors->has('no_paspor_ayah'))
                                    <span class="text-danger">{{ $errors->first('no_paspor_ayah') }}</span>
                                @endif
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Ayah </label>
                                        <input type="text" class="form-control" placeholder="Nama Ayah"
                                               name="nama_ayah" value="{{old('nama_ayah')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Paspor Ayah </label>
                                        <input type="text" class="form-control" placeholder="No Paspor Ayah"
                                               name="no_paspor_ayah" value="{{old('no_paspor_ayah')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('pekerjaan_ayah'))
                                    <span class="text-danger">{{ $errors->first('pekerjaan_ayah') }}</span>
                                @endif
                                @if ($errors->has('tgl_lahir_ayah'))
                                    <span class="text-danger">{{ $errors->first('tgl_lahir_ayah') }}</span>
                                @endif
                                @if ($errors->has('umur_ayah'))
                                    <span class="text-danger">{{ $errors->first('umur_ayah') }}</span>
                                @endif
                                <div class="col-md-7">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Pekerjaan Ayah </label>
                                        <input type="text" class="form-control" placeholder="Pekerjaan Ayah"
                                               name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tgl Lahir Ayah </label>
                                        <input type="date" class="date form-control" placeholder="Tgl Lahir Ayah"
                                               name="tgl_lahir_ayah" value="{{old('tgl_lahir_ayah')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Umur Ayah </label>
                                        <input type="number" class="form-control" min="1" placeholder="Umur Ayah"
                                               name="umur_ayah" value="{{old('umur_ayah')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('tlp_ayah_indo'))
                                    <span class="text-danger">{{ $errors->first('tlp_ayah_indo') }}</span>
                                @endif
                                @if ($errors->has('tlp_ayah_mesir'))
                                    <span class="text-danger">{{ $errors->first('tlp_ayah_mesir') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Tlp Ayah Indonesia </label>
                                        <input type="text" class="form-control" placeholder="No Tlp Ayah Indonesia"
                                               name="tlp_ayah_indo" value="{{old('tlp_ayah_indo')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Tlp Ayah Mesir </label>
                                        <input type="text" class="form-control" placeholder="No Tlp Ayah Mesir"
                                               name="tlp_ayah_mesir" value="{{old('tlp_ayah_mesir')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('alamat_indo_ayah'))
                                    <span class="text-danger">{{ $errors->first('alamat_indo_ayah') }}</span>
                                @endif
                                @if ($errors->has('alamat_mesir_ayah'))
                                    <span class="text-danger">{{ $errors->first('alamat_mesir_ayah') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Alamat Ayah Indonesia </label>
                                        <textarea class="form-control" name="alamat_indo_ayah"
                                                  placeholder="Alamat Ayah Indonesia">{{old('alamat_indo_ayah')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Alamat Ayah Mesir </label>
                                        <textarea class="form-control" name="alamat_mesir_ayah"
                                                  placeholder="Alamat Ayah Mesir">{{old('alamat_mesir_ayah')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('kewarganegaraan_ayah'))
                                    <span class="text-danger">{{ $errors->first('kewarganegaraan_ayah') }}</span>
                                @endif
                                @if ($errors->has('agama_ayah'))
                                    <span class="text-danger">{{ $errors->first('agama_ayah') }}</span>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Kewarganegaraan </label>
                                        <input type="text" class="form-control" placeholder="Kewarganegaraan"
                                               name="kewarganegaraan_ayah" value="{{old('kewarganegaraan_ayah')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Agama </label>
                                        <input type="text" class="form-control" placeholder="Agama"
                                               name="agama_ayah" value="{{old('agama_ayah')}}"/>
                                    </div>
                                </div>
                            </div>

{{--                            Bukti Nikah--}}
                            <div class="row mt-4">
                                <h5>Data Bukti Pernikahan</h5>
                                <hr>
                                @if ($errors->has('no_akta_kawin'))
                                    <span class="text-danger">{{ $errors->first('no_akta_kawin') }}</span>
                                @endif
                                @if ($errors->has('tgl_kawin'))
                                    <span class="text-danger">{{ $errors->first('tgl_kawin') }}</span>
                                @endif

                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">No Akta Nikah </label>
                                        <input type="text" class="form-control" placeholder="No Akta Nikah"
                                               name="no_akta_kawin" value="{{old('no_akta_kawin')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Tanggal Nikah </label>
                                        <input type="date" class="date form-control" placeholder="Tanggal Nikah"
                                               name="tgl_kawin" value="{{old('tgl_kawin')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('instansi_kawin'))
                                    <span class="text-danger">{{ $errors->first('instansi_kawin') }}</span>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Instansi/Lembaga yang Mengeluarkan </label>
                                        <input type="text" class="form-control"
                                               placeholder="Instansi/Lembaga yang Mengeluarkan"
                                               name="instansi_kawin" value="{{old('instansi_kawin')}}"/>
                                    </div>
                                </div>
                            </div>

{{--                            Data Saksi--}}
                            <div class="row mt-4">
                                <h5>Data Saksi</h5>
                                <hr>
                                @if ($errors->has('nik_saksi_1'))
                                    <span class="text-danger">{{ $errors->first('nik_saksi_1') }}</span>
                                @endif
                                @if ($errors->has('nama_saksi_1'))
                                    <span class="text-danger">{{ $errors->first('nama_saksi_1') }}</span>
                                @endif

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">NIK Saksi 1 </label>
                                        <input type="text" class="form-control" placeholder="NIK Saksi 1"
                                               name="nik_saksi_1" value="{{old('nik_saksi_1')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Saksi 1 </label>
                                        <input type="text" class="form-control" placeholder="Nama Saksi 1"
                                               name="nama_saksi_1" value="{{old('nama_saksi_1')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('nik_saksi_2'))
                                    <span class="text-danger">{{ $errors->first('nik_saksi_2') }}</span>
                                @endif
                                @if ($errors->has('nama_saksi_2'))
                                    <span class="text-danger">{{ $errors->first('nama_saksi_2') }}</span>
                                @endif

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">NIK Saksi 2 </label>
                                        <input type="text" class="form-control" placeholder="NIK Saksi 2"
                                               name="nik_saksi_2" value="{{old('nik_saksi_2')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Nama Saksi 2 </label>
                                        <input type="text" class="form-control" placeholder="Nama Saksi 2"
                                               name="nama_saksi_2" value="{{old('nama_saksi_2')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <button type="submit" style="width: 100%; " class="mt-3 btn mybtn">Submit</button>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('.dateTime').datepicker({
            format: 'yyyy-mm-dd hh:mm:ss'
        });
    </script>
@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
