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
                <a href="{{route('izin-tawaquf.index')}}" class="btn btn-danger" >
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div>
            <div class="text-center">
                <h1>PENGANTAR IZIN TAWAQUF</h1>
                <p>Pengajuan Pengantar Tidak Mengikuti Ujian Karena Tawaquf</p>
            </div>
            <div class="container mt-5">
                <div class="booking-form">
                    <h3 class="register-heading text-center mb-3">Silahkan lengkapi form di bawah</h3>

                    <form method="POST" action="{{route('izin-tawaquf.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row p-3">

                            <div class="col-md-12">
                                <ul>
                                    @if ($errors->has('nama'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('no_surat'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_surat') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('tujuan'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('jml_surat'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('jml_surat') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('keperluan'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('keperluan') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('thn_ajaran'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('thn_ajaran') }}</span>

                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="form-label">Nama</span>
                                    <input name="nama" class="form-control" readonly type="text" value="{{$user->nama}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="form-label">No Surat</span>
                                    <input name="no_surat" class="form-control" readonly type="text" value="{{$no_surat}}">
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <span class="form-label">Tujuan</span>
                                    <input name="tujuan" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Surat</span>
                                    <input name="jml_surat" class="form-control" type="number" min="1">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">Tahun Ajaran</span>
                                    <input name="thn_ajaran" class="form-control" type="number" min="1">
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="form-group ">
                                    <span class="form-label">Keperluan</span>
                                    <textarea class="form-control" name="keperluan"></textarea>
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
    </script>
@endsection
