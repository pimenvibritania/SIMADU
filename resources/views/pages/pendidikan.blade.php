@extends('layouts.default')
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
                                    <span class="form-label">Jenjang Pendidikan</span>
                                    <input name="rp_jenjang" value="{{old('rp_jenjang')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('rp_instansi'))
                                        <span class="text-danger">{{ $errors->first('rp_instansi') }}</span>
                                    @endif
                                    <span class="form-label">Instansi Pendidikan</span>
                                    <input name="rp_instansi" value="{{old('rp_instansi')}}" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if ($errors->has('rp_tempat'))
                                        <span class="text-danger">{{ $errors->first('rp_tempat') }}</span>
                                    @endif
                                    <span class="form-label">Alamat Pendidikan</span>
                                    <input name="rp_tempat" value="{{old('rp_tempat')}}" class="form-control" required type="text">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('rp_keluar'))
                                        <span class="text-danger">{{ $errors->first('rp_keluar') }}</span>
                                    @endif
                                    <span class="form-label">Tanggal Masuk</span>
                                    <input value="{{old('rp_keluar')}}" name="rp_keluar" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($errors->has('rp_masuk'))
                                        <span class="text-danger">{{ $errors->first('rp_masuk') }}</span>
                                    @endif
                                    <span class="form-label">Tanggal Keluar</span>
                                    <input value="{{old('rp_masuk')}}" name="rp_masuk" class="form-control" type="date" required>
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
                                        <span class="form-label">Ijazah Terakhir di Indonesia</span>
                                        <input name="file_img_ijazah" value="{{old('file_img_ijazah')}}" class="form-control"
                                               required type="file">
                                    </div>
                                </div>
                        @endif

                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <a href="{{url('dashboard')}}"  class="submit-btn2
                                        @if($riwayatPendidikan->isEmpty())
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
@section('content')
    @if(session()->has('successMsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('successMsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('pendidikan.add')}}" class="btn btn-info" >
                    <i class="fa fa-plus-square"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="panel-body">
            <h3 class="text-center m-3">Surat Pindah Kuliah ke Luar Negeri yang telah di ajukan</h3>

            <div style="width: 100%;" class="p-4">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table table-hover dt-responsive display nowrap" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="10px"></th>
                            <th>Jenjang</th>
                            <th>Instansi</th>
                            <th>Alamat</th>
                            <th>Masuk</th>
                            <th>Keluar</th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({

                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('pendidikan.fill') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'rp_jenjang', name: 'rp_jenjang'},
                    {data: 'rp_instansi', name: 'rp_instansi'},
                    {data: 'rp_tempat', name: 'rp_tempat'},
                    {data: 'rp_masuk', name: 'rp_masuk'},
                    {data: 'rp_keluar', name: 'rp_keluar'},

                ],

            });

        });
    </script>

@endsection
