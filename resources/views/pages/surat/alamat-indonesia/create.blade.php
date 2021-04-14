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
        <a href="{{route('alamat-indonesia.index')}}" class="btn btn-danger" >
            <i class="fa fa-arrow-left"></i>
            Kembali
        </a>
    </div>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{URL::asset('images/alamat-mesir.png')}}" alt=""/>
                <h3>KET ALAMAT INDONESIA</h3>
                <p>Pengajuan Surat <br> Keterangan Alamat di Indonesia</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Silahkan lengkapi form di bawah</h3>
                        <form class="row register-form" method="POST" action="{{route('alamat-indonesia.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
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
                                    </ul>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">

                                        <input type="text" readonly class="form-control" value="{{$user->nama}}" name="nama" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">

                                        <input type="text" readonly class="form-control" value="{{$no_surat}}" name="no_surat" />
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul>
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
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group mb-2">

                                        <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" />
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">

                                        <input type="number" min="1" class="form-control" placeholder="Jumlah" name="jml_surat" />
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('keperluan'))
                                            <span class="text-danger">{{ $errors->first('keperluan') }}</span>
                                        @endif
                                        <textarea class="form-control" placeholder="Keperluan" name="keperluan"></textarea>
                                    </div>

                                </div>
                                <div class="col-md">

                                    <button type="submit" style="width: 100%; " class="btn mybtn">Submit</button>

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
    </script>
@endsection
