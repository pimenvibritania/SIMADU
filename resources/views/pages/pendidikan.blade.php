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

<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{URL::asset('images/biodata.png')}}" alt=""/>
            <h3>PENDIDIKAN</h3>
            <p>Sistem Informasi MADU</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Silahkan lengkapi data diri</h3>
                    <form class="row register-form" method="POST" action="{{route('pendidikan.create')}}" enctype="multipart/form-data">
                        @csrf

{{--                        LEFT SIDE--}}
                        <div class="col-md-6 text-center">
                            <label class="mb-2 ">Riwayat Pendidikan</label>
                            <div class="form-group mb-2">
                                @if ($errors->has('rp_jenjang'))
                                    <span class="text-danger">{{ $errors->first('rp_jenjangama') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Jenjang Pendidikan" name="rp_jenjang"
                                       value="{{old('rp_jenjang')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('rp_instansi'))
                                    <span class="text-danger">{{ $errors->first('rp_instansi') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Instansi Pendidikan" name="rp_instansi"
                                       value="{{old('rp_instansi')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('rp_tempat'))
                                    <span class="text-danger">{{ $errors->first('rp_tempat') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Alamat" name="rp_tempat"
                                       value="{{old('rp_tempat')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('rp_masuk'))
                                    <span class="text-danger">{{ $errors->first('rp_masuk') }}</span>
                                @endif
                                <input type="text" class="form-control" name="rp_masuk"
                                       value="{{old('rp_masuk')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('rp_keluar'))
                                    <span class="text-danger">{{ $errors->first('rp_keluar') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Tanggal Masuk" name="rp_keluar"
                                       value="{{old('rp_keluar')}}"/>
                            </div>
                        </div>

{{--                        RIGHT SIDE--}}
                        <div class="col-md-6 text-center">
                            <label class="mb-2 ">Pendidikan Mesir</label>
                            <div class="form-group mb-2">
                                @if ($errors->has('pm_jenjang'))
                                    <span class="text-danger">{{ $errors->first('pm_jenjang') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Jenjang Pendidikan" name="pm_jenjang"
                                       value="{{old('pm_jenjang')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('pm_instansi'))
                                    <span class="text-danger">{{ $errors->first('pm_instansi') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Instansi Pendidikan" name="pm_instansi"
                                       value="{{old('pm_instansi')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('pm_tempat'))
                                    <span class="text-danger">{{ $errors->first('pm_tempat') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Alamat" name="pm_tempat"
                                       value="{{old('pm_tempat')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('pm_masuk'))
                                    <span class="text-danger">{{ $errors->first('pm_masuk') }}</span>
                                @endif
                                <input type="text" class="form-control" name="pm_masuk"
                                       value="{{old('pm_masuk')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                @if ($errors->has('pm_keluar'))
                                    <span class="text-danger">{{ $errors->first('pm_keluar') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Tanggal Masuk" name="pm_keluar"
                                       value="{{old('pm_keluar')}}"/>
                            </div>
                        </div>
                        <div class="col-md">

                            <button type="submit" style="width: 100%; " class="mt-3 btn btn-primary">Tambah</button>
                            <a href="{{url('dashboard')}}" style="width: 100%; " class="mt-3 btn mybtn">Lewati</a>

                        </div>

                    </form>
                    <div class="container">
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
                            @if($pendidikanMesir ?? '' != null)
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
                            @if($riwayatPendidikan ?? '' != null)
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
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    // $('.date').datepicker({
    //     format: 'yyyy-mm-dd'
    // });

    $('input[name="rp_masuk"]').datepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'yyyy-mm-dd'
    });

    $('input[name="rp_masuk"]').val('');
    $('input[name="rp_masuk"]').attr("placeholder","Tanggal Masuk");

    $('input[name="rp_keluar"]').datepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'yyyy-mm-dd'
    });

    $('input[name="rp_keluar"]').val('');
    $('input[name="rp_keluar"]').attr("placeholder","Tanggal Keluar");

    $('input[name="pm_masuk"]').datepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'yyyy-mm-dd'
    });

    $('input[name="pm_masuk"]').val('');
    $('input[name="pm_masuk"]').attr("placeholder","Tanggal Masuk");

    $('input[name="pm_keluar"]').datepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'yyyy-mm-dd'
    });

    $('input[name="pm_keluar"]').val('');
    $('input[name="pm_keluar"]').attr("placeholder","Tanggal Keluar");

</script>
@endsection
