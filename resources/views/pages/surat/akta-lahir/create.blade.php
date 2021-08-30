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

    <div class="container" id="booking">
        <div class="row">
            <div class="col">
                <a href="{{route('akta-lahir.index')}}" class="btn btn-danger" >
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div>
            <div class="text-center">
                <h1>AKTA LAHIR</h1>
                <p>Pengajuan Akta Lahir</p>
            </div>
            <div class="container mt-5">
                <div class="booking-form">
                    <h3 class="register-heading text-center mb-3">Silahkan lengkapi form di bawah</h3>

                    <form method="POST" action="{{route('akta-lahir.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row p-3">

                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('no_surat'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_surat') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('no_permohonan'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_permohonan') }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="no_surat" class="form-control" readonly type="text" value="{{$no_surat}}">
                                    <span class="form-label">No Surat</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="no_permohonan" class="form-control" readonly type="text" value="{{$no_permohonan}}">
                                    <span class="form-label">No Permohonan</span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <h4>Data Pelapor</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nama_pelapor'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_pelapor') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('nik_pelapor'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nik_pelapor') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('hubungan'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('hubungan') }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nama_pelapor" class="form-control" readonly type="text" value="{{$user->name}}">
                                    <span class="form-label">Nama Pelapor</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nik_pelapor" class="form-control" type="text" value="{{old('nik_pelapor')}}">
                                    <span class="form-label">NIK Pelapor</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="hubungan" class="form-control" type="text" value="{{old('hubungan')}}">
                                    <span class="form-label">Hubungan dengan Anak</span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <h4>Data Bayi</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nama_bayi'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_pelapor') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('jenis_kelamin'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nik_pelapor') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tempat_lahir'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('hubungan') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_lahir'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('berat_kg'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('berat_kg') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('berat_ons'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('berat_ons') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('panjang'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('panjang') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('jenis_kelahiran'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('jenis_kelahiran') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('kelahiran_ke'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('kelahiran_ke') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('anak_ke'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('anak_ke') }}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input required name="nama_bayi" class="form-control" type="text" value="{{old('nama_bayi')}}">
                                    <span class="form-label">Nama Bayi</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Jenis Kelamin</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="tempat_lahir" class="form-control" type="text" value="{{old('tempat_lahir')}}">
                                    <span class="form-label">Tempat Lahir</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('tanggal_lahir'))
                                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                    @endif
                                    <input value="{{old('tgl_lahir')}}" name="tgl_lahir" class="form-control" type="date" required>
                                    <span class="form-label">Tanggal Lahir</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="berat_kg" placeholder="Kilogram" class="form-control" type="number" min="0" value="{{old('berat_kg')}}">
                                    <span class="form-label">Berat Bayi (KG)</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="berat_ons" placeholder="Ons" class="form-control" type="number" min="0" value="{{old('berat_ons')}}">
                                    <span class="form-label">Berat Bayi (ONS)</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="panjang" placeholder="Centimeter" class="form-control" type="number" min="0" value="{{old('panjang')}}">
                                    <span class="form-label">Panjang Bayi (CM)</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input required name="jenis_kelahiran" class="form-control" type="text" value="{{old('jenis_kelahiran')}}">
                                    <span class="form-label">Jenis Kelahiran</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="kelahiran_ke" class="form-control" type="number" min="0" value="{{old('kelahiran_ke')}}">
                                    <span class="form-label">Kelahiran ke-</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required name="anak_ke" class="form-control" type="number" min="0" value="{{old('anak_ke')}}">
                                    <span class="form-label">Anak ke-</span>
                                </div>
                            </div>



                        </div>

                        <div class="row p-3">
                            <h4>Data Tempat Dilahirkan</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('tempat_kelahiran'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tempat_kelahiran') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('no_surat_rs'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_surat_rs') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_surat_rs'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_surat_rs') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('nama_rs'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_rs') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('alamat_rs'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('alamat_rs') }}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input required name="tempat_kelahiran" class="form-control" type="text" value="{{old('tempat_kelahiran')}}">
                                    <span class="form-label">Tempat Kelahiran</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="no_surat_rs" class="form-control" type="text" value="{{old('no_surat_rs')}}">
                                    <span class="form-label">No Surat RS</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input value="{{old('tgl_surat_rs')}}" name="tgl_surat_rs" class="form-control" type="date">
                                    <span class="form-label">Tanggal Surat RS</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nama_rs" class="form-control" type="text" value="{{old('nama_rs')}}">
                                    <span class="form-label">Nama Rumah Sakit</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <textarea class="form-control" value="{{old('alamat_rs')}}" name="alamat_rs"></textarea>
                                    <span class="form-label">Alamat Rumah Sakit</span>
                                </div>
                            </div>


                        </div>

                        <div class="row p-3">
                            <h4>Data Bukti Pencatatan Kelahiran</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('no_bukti'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_bukti') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_bukti'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_bukti') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('penerbit'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('penerbit') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('file_paspor_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('file_paspor_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('file_paspor_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('file_paspor_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('file_izin_tinggal_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('file_izin_tinggal_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('file_izin_tinggal_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('file_izin_tinggal_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('file_sk_dokter'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('file_sk_dokter') }}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="no_bukti" class="form-control" type="text" value="{{old('no_bukti')}}">
                                    <span class="form-label">No Bukti Pencatatan</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="penerbit" class="form-control" type="text" value="{{old('penerbit')}}">
                                    <span class="form-label">Diterbitkan Oleh</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input value="{{old('tgl_bukti')}}" name="tgl_bukti" class="form-control" type="date">
                                    <span class="form-label">Tanggal Bukti Pencatatan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="file_paspor_ayah" class="form-control" type="file" value="{{old('file_paspor_ayah')}}">
                                    <span class="form-label">Scan Paspor Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="file_paspor_ibu" class="form-control" type="file" value="{{old('file_paspor_ibu')}}">
                                    <span class="form-label">Scan Paspor Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="file_izin_tinggal_ayah" class="form-control" type="file" value="{{old('file_izin_tinggal_ayah')}}">
                                    <span class="form-label">Scan Surat Izin Tinggal Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="file_izin_tinggal_ibu" class="form-control" type="file" value="{{old('file_izin_tinggal_ibu')}}">
                                    <span class="form-label">Scan Surat Izin Tinggal Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="file_sk_dokter" class="form-control" type="file" value="{{old('file_sk_dokter')}}">
                                    <span class="form-label">Scan Keterangan Dokter</span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <h4>Data Ibu</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nama_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('umur_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('umur_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_lahir_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_lahir_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('agama_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('agama_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('pekerjaan_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('no_paspor_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_paspor_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('kewarganegaraan_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('kewarganegaraan_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tlp_ibu_indo'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tlp_ibu_indo') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tlp_ibu_mesir'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tlp_ibu_mesir') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('alamat_indo_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('alamat_indo_ibu') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('alamat_mesir_ibu'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('alamat_mesir_ibu') }}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nama_ibu" class="form-control" type="text" value="{{old('nama_ibu')}}">
                                    <span class="form-label">Nama Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input name="umur_ibu" class="form-control" type="number" min="0" value="{{old('umur_ibu')}}">
                                    <span class="form-label">Umur Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input value="{{old('tgl_lahir_ibu')}}" name="tgl_lahir_ibu" class="form-control" type="date">
                                    <span class="form-label">Tanggal Lahir Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="agama_ibu" class="form-control" type="text" value="{{old('agama_ibu')}}">
                                    <span class="form-label">Agama Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="pekerjaan_ibu" class="form-control" type="text" value="{{old('pekerjaan_ibu')}}">
                                    <span class="form-label">Pekerjaan Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="no_paspor_ibu" class="form-control" type="text" value="{{old('no_paspor_ibu')}}">
                                    <span class="form-label">No Paspor Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="kewarganegaraan_ibu" class="form-control" type="text" value="{{old('kewarganegaraan_ibu')}}">
                                    <span class="form-label">Kewarganegaraan Ibu</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="tlp_ibu_indo" class="form-control" type="text" value="{{old('tlp_ibu_indo')}}">
                                    <span class="form-label">No Telefon Ibu (Indonesia)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="tlp_ibu_mesir" class="form-control" type="text" value="{{old('tlp_ibu_mesir')}}">
                                    <span class="form-label">No Telefon Ibu (Mesir)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <textarea class="form-control" value="{{old('alamat_indo_ibu')}}" name="alamat_indo_ibu"></textarea>
                                    <span class="form-label">Alamat Ibu (Indonesia)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <textarea class="form-control" value="{{old('alamat_mesir_ibu')}}" name="alamat_mesir_ibu"></textarea>
                                    <span class="form-label">Alamat Ibu (Mesir)</span>
                                </div>
                            </div>

                        </div>

                        <div class="row p-3">
                            <h4>Data Ayah</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nama_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('umur_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('umur_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_lahir_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_lahir_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('agama_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('agama_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('pekerjaan_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('pekerjaan_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('no_paspor_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_paspor_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('kewarganegaraan_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('kewarganegaraan_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tlp_ayah_indo'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tlp_ayah_indo') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tlp_ayah_mesir'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tlp_ayah_mesir') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('alamat_indo_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('alamat_indo_ayah') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('alamat_mesir_ayah'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('alamat_mesir_ayah') }}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nama_ayah" class="form-control" type="text" value="{{old('nama_ayah')}}">
                                    <span class="form-label">Nama Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input name="umur_ayah" class="form-control" type="number" min="0" value="{{old('umur_ayah')}}">
                                    <span class="form-label">Umur Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input value="{{old('tgl_lahir_ayah')}}" name="tgl_lahir_ayah" class="form-control" type="date">
                                    <span class="form-label">Tanggal Lahir Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="agama_ayah" class="form-control" type="text" value="{{old('agama_ayah')}}">
                                    <span class="form-label">Agama Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="pekerjaan_ayah" class="form-control" type="text" value="{{old('pekerjaan_ayah')}}">
                                    <span class="form-label">Pekerjaan Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="no_paspor_ayah" class="form-control" type="text" value="{{old('no_paspor_ayah')}}">
                                    <span class="form-label">No Paspor Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="kewarganegaraan_ayah" class="form-control" type="text" value="{{old('kewarganegaraan_ayah')}}">
                                    <span class="form-label">Kewarganegaraan Ayah</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="tlp_ayah_indo" class="form-control" type="text" value="{{old('tlp_ayah_indo')}}">
                                    <span class="form-label">No Telefon Ayah (Indonesia)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="tlp_ayah_mesir" class="form-control" type="text" value="{{old('tlp_ayah_mesir')}}">
                                    <span class="form-label">No Telefon Ayah (Mesir)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <textarea class="form-control" value="{{old('alamat_indo_ayah')}}" name="alamat_indo_ayah"></textarea>
                                    <span class="form-label">Alamat Ayah (Indonesia)</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <textarea class="form-control" value="{{old('alamat_mesir_ayah')}}" name="alamat_mesir_ayah"></textarea>
                                    <span class="form-label">Alamat Ayah (Mesir)</span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <h4>Data Bukti Pernikahan</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('no_akta_kawin'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_akta_kawin') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tgl_kawin'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tgl_kawin') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('instansi_kawin'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('instansi_kawin') }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <input name="no_akta_kawin" class="form-control" type="text" value="{{old('no_akta_kawin')}}">
                                    <span class="form-label">No Akta Nikah</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input name="instansi_kawin" class="form-control" type="text" value="{{old('instansi_kawin')}}">
                                    <span class="form-label">Instansi/Lembaga yang Mengeluarkan</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input value="{{old('tgl_kawin')}}" name="tgl_kawin" class="form-control" type="date">
                                    <span class="form-label">Tanggal Nikah</span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <h4>Data Bukti Pernikahan</h4>
                            <hr>
                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nik_saksi_1'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nik_saksi_1') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('nama_saksi_1'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_saksi_1') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('nik_saksi_2'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nik_saksi_2') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('nama_saksi_2'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama_saksi_2') }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nik_saksi_1" class="form-control" type="text" value="{{old('nik_saksi_1')}}">
                                    <span class="form-label">NIK Saksi 1</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nama_saksi_1" class="form-control" type="text" value="{{old('nama_saksi_1')}}">
                                    <span class="form-label">Nama Saksi 1</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nik_saksi_2" class="form-control" type="text" value="{{old('nik_saksi_2')}}">
                                    <span class="form-label">NIK Saksi 2</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nama_saksi_2" class="form-control" type="text" value="{{old('nama_saksi_2')}}">
                                    <span class="form-label">Nama Saksi 2</span>
                                </div>
                            </div>
                        </div>


                        <div class="col-md mb-3">
                            <div class="form-btn">
                                <button type="submit" class="submit-btn">SUBMIT</button>
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

        $('.dateTime').datepicker({
            format: 'yyyy-mm-dd hh:mm:ss'
        });
    </script>
@endsection

@section('biodata')
    @include('pages.forbidden')
@endsection
