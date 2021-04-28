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

<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{URL::asset('images/biodata.png')}}" alt=""/>
            <h3>BIODATA</h3>
            <p>Sistem Informasi MADU</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Silahkan lengkapi data diri</h3>
                    <form class="row register-form" method="POST" action="{{route('biodata.store')}}" enctype="multipart/form-data">
                        @csrf

                {{--LEFT SIDE--}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                            <label class="mb-1">Nama</label>
                            @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Nama dengan bahasa Arab" name="nama"
                                       value="{{old('nama')}}"/>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Jenis Kelamin</label>
                                @if ($errors->has('kelamin'))
                                    <span class="text-danger">{{ $errors->first('kelamin') }}</span>
                                @endif
                                <select class="form-control" name="kelamin">
                                    <option class="hidden"  selected disabled> -- Pilih Jenis kelamin -- </option>
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
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Agama</label>
                                @if ($errors->has('agama'))
                                    <span class="text-danger">{{ $errors->first('agama') }}</span>
                                @endif
                                <select class="form-control" name="agama">
                                    <option class="hidden"  selected disabled> -- Pilih Agama -- </option>
                                    <option value="islam"
                                            @if(old('agama') == "islam") selected="selected" @endif>
                                            Islam
                                    </option>
                                    <option value="kristen"
                                            @if(old('agama') == "kristen") selected="selected" @endif>
                                            Kristen
                                    </option>
                                    <option value="budha"
                                            @if(old('agama') == "budha") selected="selected" @endif>
                                            Budha
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Status</label>
                                @if ($errors->has('pernikahan'))
                                    <span class="text-danger">{{ $errors->first('pernikahan') }}</span>
                                @endif
                                <select class="form-control" name="pernikahan">
                                    <option class="hidden"  selected disabled> -- Pilih Status pernikahan -- </option>
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
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tempat Lahir</label>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Tempat lahir"
                                       value="{{old('tempat_lahir')}}" name="tempat_lahir" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tanggal Lahir</label>
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                                <input type="date" class="date form-control" placeholder="Tanggal lahir"
                                       value="{{old('tanggal_lahir')}}" name="tanggal_lahir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tinggi Badan</label>
                                @if ($errors->has('tinggi_badan'))
                                    <span class="text-danger">{{ $errors->first('tinggi_badan') }}</span>
                                @endif
                                <input type="number" min="0" class="form-control" placeholder="Tinggi badan"
                                       value="{{old('tinggi_badan')}}" name="tinggi_badan" />
                            </div>

{{--                            JENIS VIPA--}}
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Jenis Vipa</label>
                                @if ($errors->has('jenis_vipa_1'))
                                    <span class="text-danger">{{ $errors->first('jenis_vipa_1') }}</span>
                                @endif
                                <select class="form-control mb-2" name="jenis_vipa_1">
                                    <option class="hidden" selected disabled> -- Jenis VIPA 1 -- </option>
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
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Nomor Paspor</label>
                                @if ($errors->has('no_paspor'))
                                    <span class="text-danger">{{ $errors->first('no_paspor') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="No Paspor"
                                       value="{{old('tinggi_badan')}}" name="no_paspor">
                            </div>

{{--                            JENIS PASPOR--}}
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Jenis Paspor</label>
                                @if ($errors->has('jenis_paspor'))
                                    <span class="text-danger">{{ $errors->first('jenis_paspor') }}</span>
                                @endif
                                <select class="form-control mb-2" name="jenis_paspor">
                                    <option class="hidden"  selected disabled> -- Jenis Paspor -- </option>
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
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tanggal Keluar Paspor</label>
                                @if ($errors->has('keluar_paspor'))
                                    <span class="text-danger">{{ $errors->first('keluar_paspor') }}</span>
                                @endif
                                <input type="date" class="date form-control" placeholder="Tanggal keluar Paspor"
                                       value="{{old('keluar_paspor')}}" name="keluar_paspor">
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Dikeluarkan Oleh</label>
                                @if ($errors->has('dikeluarkan_oleh'))
                                    <span class="text-danger">{{ $errors->first('dikeluarkan_oleh') }}</span>
                                @endif
                                <input type="text" class="date form-control" placeholder="Dikeluarkan paspor oleh"
                                       value="{{old('dikeluarkan_oleh')}}" name="dikeluarkan_oleh">
                            </div>

                            <div class="row text-center">
                                @if ($errors->has('berlaku_paspor_from'))
                                    <span class="text-danger">{{ $errors->first('berlaku_paspor_from') }}</span>
                                @endif
                                <br>
                                @if ($errors->has('berlaku_paspor_to'))
                                    <span class="text-danger">{{ $errors->first('berlaku_paspor_to') }}</span>
                                @endif
                                <label class="mb-2 mt-2">Tanggal Berlaku Paspor</label>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-2" style="text-align: center">Dari</label>
                                        <input type="date" class="date form-control" placeholder="Dari"
                                               value="{{old('berlaku_paspor_from')}}" name="berlaku_paspor_from">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-2" style="text-align: center">Sampai</label>
                                        <input type="date" class="date form-control" placeholder="Sampai"
                                               value="{{old('berlaku_paspor_to')}}" name="berlaku_paspor_to">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tanggal Tiba di Mesir</label>
                                @if ($errors->has('tiba_mesir'))
                                    <span class="text-danger">{{ $errors->first('tiba_mesir') }}</span>
                                @endif
                                <input type="date" class="date form-control" placeholder="Tiba di Mesir"
                                       value="{{old('tiba_mesir')}}" name="tiba_mesir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tanggal Lapor</label>
                                @if ($errors->has('tanggal_lapor'))
                                    <span class="text-danger">{{ $errors->first('tanggal_lapor') }}</span>
                                @endif
                                <input type="date" class="date form-control" placeholder="Tanggal lapor"
                                       value="{{old('tanggal_lapor')}}" name="tanggal_lapor">
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Pendidikan terakhir</label>
                                @if ($errors->has('pendidikan_akhir'))
                                    <span class="text-danger">{{ $errors->first('pendidikan_akhir') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Pendidikan Terakhir"
                                       value="{{old('pendidikan_akhir')}}" name="pendidikan_akhir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Tujuan ke Mesir</label>
                                @if ($errors->has('tujuan_mesir'))
                                    <span class="text-danger">{{ $errors->first('tujuan_mesir') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Tujuan di Mesir"
                                       value="{{old('tujuan_mesir')}}" name="tujuan_mesir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Pekerjaan"
                                       value="{{old('pekerjaan')}}" name="pekerjaan">
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Nama Pasangan</label>
                                <input type="text" class="form-control" placeholder="Nama pasangan"
                                       value="{{old('nama_pasangan')}}" name="nama_pasangan">
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Catatan</label>
                                <textarea class="form-control" placeholder="Catatan" name="catatan"
                                      value="{{old('catatan')}}"rows="4"></textarea>
                            </div>
                            <div class="form-group mb-2 text-center">
                                <label for="file_img_profile" class="mb-2" >Foto Profil</label>
                                @if ($errors->has('file_img_profile'))
                                    <br>
                                    <span class="text-danger">{{ $errors->first('file_img_profile') }}</span>
                                @endif
                                <input type="file" class="form-control" value="{{old('file_img_profile')}}"  name="file_img_profile" />
                            </div>
                            <div class="form-group mb-2 text-center">
                                <label for="file_img_akte" class="mb-2 mt-2" >Akta Lahir (PDF)</label>
                                @if ($errors->has('file_img_akte'))
                                    <br>
                                    <span class="text-danger">{{ $errors->first('file_img_akte') }}</span>
                                @endif
                                <input type="file" class="form-control" value="{{old('file_img_profile')}}"  name="file_img_akte" />
                            </div>
                        </div>

{{--                        RIGHT SIDE--}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="mb-1">Nama Ayah</label>
                                @if ($errors->has('nama_ayah'))
                                    <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                                @endif
                                <input type="text" value="{{old('nama_ayah')}}" class="form-control" placeholder="Nama Ayah" name="nama_ayah" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Nama Ibu</label>
                                @if ($errors->has('nama_ibu'))
                                    <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                                @endif
                                <input type="text" value="{{old('nama_ibu')}}" class="form-control" placeholder="Nama Ibu" name="nama_ibu" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Alamat Ayah</label>
                                @if ($errors->has('alamat_ayah'))
                                    <span class="text-danger">{{ $errors->first('alamat_ayah') }}</span>
                                @endif
                                <textarea class="form-control" placeholder="Alamat Ayah" name="alamat_ayah" rows="3">{{old('alamat_ayah')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Alamat Ibu</label>
                                @if ($errors->has('alamat_ibu'))
                                    <span class="text-danger">{{ $errors->first('alamat_ibu') }}</span>
                                @endif
                                <textarea class="form-control" placeholder="Alamat Ibu" name="alamat_ibu" rows="3">{{old('alamat_ibu')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Pekerjaan Ayah</label>
                                @if ($errors->has('pekerjaan_ayah'))
                                    <span class="text-danger">{{ $errors->first('pekerjaan_ayah') }}</span>
                                @endif
                                <input type="text" value="{{old('pekerjaan_ayah')}}" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Pekerjaan Ibu</label>
                                @if ($errors->has('pekerjaan_ibu'))
                                    <span class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</span>
                                @endif
                                <input type="text" value="{{old('pekerjaan_ibu')}}" class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">No Telepon Ayah</label>
                                @if ($errors->has('no_ayah'))
                                    <span class="text-danger">{{ $errors->first('no_ayah') }}</span>
                                @endif
                                <input type="text" value="{{old('no_ayah')}}" class="form-control" placeholder="No telepon ayah " name="no_ayah" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">No Telepon Ibu</label>
                                @if ($errors->has('no_ibu'))
                                    <span class="text-danger">{{ $errors->first('no_ibu') }}</span>
                                @endif
                                <input type="text" value="{{old('no_ibu')}}" class="form-control" placeholder="No telepon ibu " name="no_ibu" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Alamat di Mesir</label>
                                @if ($errors->has('alamat_mesir'))
                                    <span class="text-danger">{{ $errors->first('alamat_mesir') }}</span>
                                @endif
                                <textarea class="form-control" placeholder="Alamat di Mesir" name="alamat_mesir" rows="3">{{old('alamat_mesir')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Provinsi di Mesir</label>
                                @if ($errors->has('provinsi_mesir'))
                                    <span class="text-danger">{{ $errors->first('provinsi_mesir') }}</span>
                                @endif
                                <input type="text" value="{{old('provinsi_mesir')}}" class="form-control" placeholder="Provinsi di Mesir " name="provinsi_mesir" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Kota di Mesir</label>
                                @if ($errors->has('kota_mesir'))
                                    <span class="text-danger">{{ $errors->first('kota_mesir') }}</span>
                                @endif
                                <input type="text" value="{{old('kota_mesir')}}" class="form-control" placeholder="Kota di Mesir " name="kota_mesir" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">No Telepon di Mesir</label>
                                @if ($errors->has('no_mesir'))
                                    <span class="text-danger">{{ $errors->first('no_mesir') }}</span>
                                @endif
                                <input type="text" class="form-control" value="{{old('no_mesir')}}" placeholder="Nomor telpon Mesir " name="no_mesir" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Alamat di Indonesia</label>
                                @if ($errors->has('alamat_indo'))
                                    <span class="text-danger">{{ $errors->first('alamat_indo') }}</span>
                                @endif
                                <textarea class="form-control" placeholder="Alamat di Indonesia" name="alamat_indo" rows="3">{{old('alamat_indo')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Provinsi di Indonesia</label>
                                @if ($errors->has('provinsi_indo'))
                                    <span class="text-danger">{{ $errors->first('provinsi_indo') }}</span>
                                @endif
                                <select id="prov_indo" class="form-control" name="provinsi_indo">
                                    <option class="hidden"  selected disabled> -- Provinsi di Indonesia -- </option>

                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Kota di Indonesia</label>
                                @if ($errors->has('kota_indo'))
                                    <span class="text-danger">{{ $errors->first('kota_indo') }}</span>
                                @endif
                                <select class="form-control" id="kota_indo" name="kota_indo" disabled>
                                    <option class="hidden"  selected disabled> -- Kota / Kabupaten di Indonesia -- </option>

                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Kecamatan di Indonesia</label>
                                @if ($errors->has('kecamatan_indo'))
                                    <span class="text-danger">{{ $errors->first('kecamatan_indo') }}</span>
                                @endif
                                <select class="form-control" id="kec_indo" name="kecamatan_indo" disabled>
                                    <option class="hidden"  selected disabled> -- Kecamatan di Indonesia -- </option>

                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Desa di Indonesia</label>
                                @if ($errors->has('desa_indo'))
                                    <span class="text-danger">{{ $errors->first('desa_indo') }}</span>
                                @endif
                                <select id="desa_indo" class="form-control" name="desa_indo" disabled>
                                    <option class="hidden"  selected disabled> -- Desa di Indonesia -- </option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">Kode Pos Indonesia</label>
                                @if ($errors->has('pos_indo'))
                                    <span class="text-danger">{{ $errors->first('pos_indo') }}</span>
                                @endif
                                <input type="text" value="{{old('pos_indo')}}" class="form-control" placeholder="Kode Pos " name="pos_indo" />
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1 mt-2">No Telepon Indonesia</label>
                                @if ($errors->has('no_indo'))
                                    <span class="text-danger">{{ $errors->first('no_indo') }}</span>
                                @endif
                                <input type="text" class="form-control" value="{{old('no_indo')}}" placeholder="No telpon Indonesia " name="no_indo" />
                            </div>
                            <div class="form-group mb-2 text-center">
                                <label for="img_ktp" class="mb-2" >Foto KTP</label>
                                @if ($errors->has('file_img_ktp'))
                                    <br>
                                    <span class="text-danger">{{ $errors->first('file_img_ktp') }}</span>
                                @endif
                                <input type="file" class="form-control"  name="file_img_ktp" />
                            </div>
                            <div class="form-group mb-2 text-center">
                                <label for="file_img_paspor" class="mb-2 mt-2" >Foto Paspor</label>
                                @if ($errors->has('file_img_paspor'))
                                    <br>
                                    <span class="text-danger">{{ $errors->first('file_img_paspor') }}</span>
                                @endif
                                <input type="file" class="form-control"  name="file_img_paspor" />
                            </div>
                        </div>
                        <div class="col-md">

                            <button type="submit" style="width: 100%; " class="mt-3 btn mybtn">Submit</button>

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
<script >
    $(document).ready(function() {
        $.ajax({
            // url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
            url: `{{route('wilayah.provinsi')}}` ,
            type: 'get',
            dataType: 'json',
            success: function(response) {
               let res = response.provinsi;
               console.log(res);
               let provinsi = res.map(function (data) {
                    return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                })

                $('#prov_indo').append(provinsi)

            }
        })

        $('#prov_indo').on('change', function () {
            let prov_id = $(this).children("option:selected").attr('id');
            $('#kota_indo').prop('disabled', false);
            console.log(prov_id)

            $.ajax({
                // url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${prov_id}`,
                url: `{{url('wilayah/kota')}}/${prov_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.kota;
                    console.log(res);
                    let kota = res.map(function (data) {
                        return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                    })

                    $('#kota_indo')
                        .find('option')
                        .remove()
                        .end()
                        .append(kota)

                }
            })

        })

        $('#kota_indo').on('change', function (){
            let kota_id = $(this).children("option:selected").attr('id');
            $('#kec_indo').prop('disabled', false);
            console.log(kota_id)

            $.ajax({
                // url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${kota_id}`,
                url: `{{url('wilayah/kecamatan')}}/${kota_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.kecamatan;
                    console.log(res);
                    let kecamatan = res.map(function (data) {
                        return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                    })
                    $('#kec_indo')
                        .find('option')
                        .remove()
                        .end()
                        .append(kecamatan)
                }
            })
        })

        $('#kec_indo').on('change', function (){
            let kec_id = $(this).children("option:selected").attr('id');
            $('#desa_indo').prop('disabled', false);
            console.log(kec_id)

            $.ajax({
                // url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${kec_id}`,
                url: `{{url('wilayah/desa')}}/${kec_id}`,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    let res = response.desa;
                    console.log(res);
                    let desa = res.map(function (data) {
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
