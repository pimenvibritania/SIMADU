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
                <a href="{{route('legalisir.index')}}" class="btn btn-danger" >
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div>
            <div class="text-center">
                <h1>PENGAJUAN LEGALISIR</h1>
                <p>Permintaan Legalisir Dokumen</p>
            </div>
            <div class="container mt-5">
                <div class="booking-form">
                    <h3 class="register-heading text-center mb-3">Silahkan lengkapi form di bawah</h3>

                    <form method="POST" action="{{route('legalisir.store')}}"
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
                                    @if ($errors->has('no_permohonan'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('no_permohonan') }}</span>
                                        </li>
                                    @endif
                                    @if ($errors->has('img_docs'))
                                        <li>
                                            <span class="text-danger">{{ $errors->first('img_docs') }}</span>
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
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="form-label">Nama</span>
                                    <input name="nama" class="form-control" readonly type="text" value="{{$user->nama}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">No Permohonan</span>
                                    <input name="no_permohonan" class="form-control" readonly type="text" value="{{$no_permohonan}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Surat</span>
                                    <input name="jml_surat" class="form-control" type="number" min="1">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="form-label">Nama Dokumen</span>
                                    <input name="nama" value="{{old('nama')}}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="form-label">Upload Dokumen<small style="color: red"> (*File harus PDF)</small></span>
                                    <input name="img_docs" class="form-control" type="file">
                                </div>
                            </div>

                            <div class="col-md-12">
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
