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

<div id="booking">
        <div>
            <div class="text-center">
                <h1>Informasi Pendidikan</h1>
            </div>
            <div class="container mt-2">
                <div class="booking-form">

                    <form method="POST" action="{{route('pendidikan.create')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <h3 class="register-heading text-center mb-4">Riwayat Pendidikan</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('rp_jenjang'))
                                        <span class="text-danger">{{ $errors->first('rp_jenjang') }}</span>
                                    @endif
                                    <input name="rp_jenjang" value="{{old('rp_jenjang')}}" class="form-control" required type="text">
                                    <span class="form-label">Jenjang Pendidikan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('rp_instansi'))
                                        <span class="text-danger">{{ $errors->first('rp_instansi') }}</span>
                                    @endif
                                    <input name="rp_instansi" value="{{old('rp_instansi')}}" class="form-control" required type="text">
                                    <span class="form-label">Instansi Pendidikan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('rp_tempat'))
                                        <span class="text-danger">{{ $errors->first('rp_tempat') }}</span>
                                    @endif
                                    <input name="rp_tempat" value="{{old('rp_tempat')}}" class="form-control" required type="text">
                                    <span class="form-label">Alamat Pendidikan</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('rp_keluar'))
                                        <span class="text-danger">{{ $errors->first('rp_keluar') }}</span>
                                    @endif
                                    <input value="{{old('rp_keluar')}}" name="rp_keluar" class="form-control" type="date" required>
                                    <span class="form-label">Tanggal Masuk</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('rp_masuk'))
                                        <span class="text-danger">{{ $errors->first('rp_masuk') }}</span>
                                    @endif
                                    <input value="{{old('rp_masuk')}}" name="rp_masuk" class="form-control" type="date" required>
                                    <span class="form-label">Tanggal Keluar</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 class="register-heading text-center mt-4 mb-4">Pendidikan di Mesir</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pm_jenjang'))
                                        <span class="text-danger">{{ $errors->first('pm_jenjang') }}</span>
                                    @endif
                                    <input name="pm_jenjang" value="{{old('pm_jenjang')}}" class="form-control" required type="text">
                                    <span class="form-label">Jenjang Pendidikan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pm_instansi'))
                                        <span class="text-danger">{{ $errors->first('pm_instansi') }}</span>
                                    @endif
                                    <input name="pm_instansi" value="{{old('pm_instansi')}}" class="form-control" required type="text">
                                    <span class="form-label">Instansi Pendidikan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('pm_tempat'))
                                        <span class="text-danger">{{ $errors->first('pm_tempat') }}</span>
                                    @endif
                                    <input name="pm_tempat" value="{{old('pm_tempat')}}" class="form-control" required type="text">
                                    <span class="form-label">Alamat Pendidikan</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('pm_masuk'))
                                        <span class="text-danger">{{ $errors->first('pm_masuk') }}</span>
                                    @endif
                                    <input value="{{old('pm_masuk')}}" name="pm_masuk" class="form-control" type="date" required>
                                    <span class="form-label">Tanggal Masuk</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('pm_keluar'))
                                        <span class="text-danger">{{ $errors->first('pm_keluar') }}</span>
                                    @endif
                                    <input value="{{old('pm_keluar')}}" name="pm_keluar" class="form-control" type="date" required>
                                    <span class="form-label">Tanggal Keluar</span>
                                </div>
                            </div>
                        </div>

                        @if(auth()->user()->biodata->img_ijazah == null)
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if ($errors->has('file_img_ijazah'))
                                            <span class="text-danger">{{ $errors->first('file_img_ijazah') }}</span>
                                        @endif
                                        <input name="file_img_ijazah" value="{{old('file_img_ijazah')}}" class="form-control"
                                               required type="file">
                                        <span class="form-label">Ijazah</span>
                                    </div>
                                </div>
                        @endif

                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <a href="{{url('dashboard')}}"  class="submit-btn2
                                        @if($pendidikanMesir->isEmpty() && $riwayatPendidikan->isEmpty())
                                    isDisabled
                                        @endif
                                    ">
                                    <div class="submit-btn3">
                                        LEWATI
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-btn">
                                    <button type="submit" class="submit-btn">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="container mt-4">
        <h3 class="mb-4 text-center">Pendidikan di Mesir</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Jenjang</th>
                <th>Instansi</th>
                <th>Tempat</th>
                <th>Masuk</th>
                <th>Keluar</th>

            </tr>
            </thead>
            <tbody>
            @if($pendidikanMesir ?? '')
                @foreach($pendidikanMesir ?? '' as $pm)
                    <tr>
                        <td>{{$pm->pm_jenjang}}</td>
                        <td>{{$pm->pm_instansi}}</td>
                        <td>{{$pm->pm_tempat}}</td>
                        <td>{{$pm->pm_masuk}}</td>
                        <td>{{$pm->pm_keluar}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <h3 class="mb-4 mt-4 text-center">Riwayat Pendidikan</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Jenjang</th>
                <th>Instansi</th>
                <th>Tempat</th>
                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
            </thead>
            <tbody>
            @if($riwayatPendidikan ?? '')
                @foreach($riwayatPendidikan ?? '' as $rp)
                    <tr>
                        <td>{{$rp->rp_jenjang}}</td>
                        <td>{{$rp->rp_instansi}}</td>
                        <td>{{$rp->rp_tempat}}</td>
                        <td>{{$rp->rp_masuk}}</td>
                        <td>{{$rp->rp_keluar}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>





<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
@endsection
