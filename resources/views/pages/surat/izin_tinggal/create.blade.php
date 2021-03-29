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
                <img src="{{URL::asset('images/izin_tinggal.png')}}" alt=""/>
                <h3>IZIN TINGGAL</h3>
                <p>Pengajuan Surat Izin Tinggal</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Silahkan lengkapi form di bawah</h3>
                        <form class="row register-form" method="POST" action="{{route('biodata.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('nama'))
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        @endif
                                        <input type="text" disabled class="form-control" value="Pirman Abdurohman" name="nama" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('no_surat'))
                                            <span class="text-danger">{{ $errors->first('no_surat') }}</span>
                                        @endif
                                        <input type="text" disabled class="form-control" value="N-123/21" name="no_surat" />
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('tujuan'))
                                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                        @endif
                                        <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" />
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('jml_surat'))
                                            <span class="text-danger">{{ $errors->first('jml_surat') }}</span>
                                        @endif
                                        <input type="number" min="1" class="form-control" placeholder="Jumlah" name="jml_surat" />
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('tujuan'))
                                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                        @endif
                                        <textarea class="form-control" placeholder="Keperluan" name="keperluan"></textarea>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        @if ($errors->has('tanda_tangan'))
                                            <span class="text-danger">{{ $errors->first('tanda_tangan') }}</span>
                                        @endif
                                        <input type="text" min="1" class="form-control" placeholder="Tanda tangan" name="tanda_tangan" />
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
