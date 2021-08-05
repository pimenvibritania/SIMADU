@php
    $ttd = \App\Models\TandaTangan::all() ?? null;
    $ganti = \App\Models\ChangableWord::all() ?? null;
    $ganti_kb = $ganti->where('type', 'tujuan');
@endphp

@if($entry->status == 'new')

    <button type="button" class="btn btn-primary"
            data-toggle="modal" data-target="#exampleModal">
        <i class="la la-eye"></i>
        Review
    </button>

    <div class="modal fade " style="top:50px; max-height: 90%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content my-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if($crud->entity_name == 'legalisir')
                        <div class="form-group ">
                            <label for="no-surat" class="col-form-label">No Permohonan</label>
                            <input readonly type="text" class="form-control" id="no-permohonan" value="{{$entry->no_permohonan}}">
                        </div>
                        <div class="form-group ">
                            <label for="nama" class="col-form-label">Nama Dokumen</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->nama}}">
                        </div>
                        <a target="_blank"
                           class="btn btn-primary"
                           href="{{asset('uploads/legalisir/'.$entry->img_docs)}}">
                            <i class="la la-eye"></i>
                            Lihat dokumen
                        </a>
                    @elseif($crud->entity_name == 'akta-lahir')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="no-surat" class="col-form-label">No Surat</label>
                                    <input readonly type="text" class="form-control" id="no-surat" value="{{$entry->no_surat}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama Pemohon</label>
                                    <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama Bayi</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->nama_bayi}}">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="no-surat" class="col-form-label">Kelamin</label>
                                    <input readonly type="text" class="form-control" id="no-surat" value="{{$entry->jenis_kelamin}}">
                                </div>
                            </div>
                            @php
                                $date = new DateTime($entry->tgl_lahir);
                                $day = $date->format('l, d/M/Y');
                                $hour = $date->format('H:i')
                            @endphp
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Tanggal Lahir</label>
                                    <input readonly type="text" class="form-control" id="nama" value="{{$day}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Jam Lahir</label>
                                    <input readonly type="text" class="form-control" id="nama" value="{{$hour}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Tempat Lahir</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->nama_rs}}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Nama Ibu</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->nama_ibu}}">
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Foto Paspor Ayah</label>
                            <a style="cursor: pointer" target="_blank"
                               href="{{asset('uploads/akta/paspor_ayah/'.$entry->img_paspor_ayah)}}">
                                <div style="">
                                    <img class="img-fluid z-depth-1 image-link"
                                         style="height:200px; width:200px;object-fit: cover"
                                         src="{{asset('uploads/akta/paspor_ayah/'.$entry->img_paspor_ayah)}}" alt="image">
                                </div>

                            </a>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Foto Paspor Ibu</label>
                            <a style="cursor: pointer" target="_blank"
                               href="{{asset('uploads/akta/paspor_ayah/'.$entry->img_paspor_ibu)}}">
                                <div style="">
                                    <img class="img-fluid z-depth-1 image-link"
                                         style="height:200px; width:200px;object-fit: cover"
                                         src="{{asset('uploads/akta/paspor_ibu/'.$entry->img_paspor_ibu)}}" alt="image">
                                </div>

                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Bukti Izin Tinggal Ayah</label>
                            <a style="cursor: pointer" target="_blank"
                               href="{{asset('uploads/akta/izin_ayah/'.$entry->img_izin_tinggal_ayah)}}">
                                <div style="">
                                    <img class="img-fluid z-depth-1 image-link"
                                         style="height:200px; width:200px;object-fit: cover"
                                         src="{{asset('uploads/akta/izin_ayah/'.$entry->img_izin_tinggal_ayah)}}" alt="image">
                                </div>

                            </a>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Bukti Izin Tinggal Ibu</label>
                            <a style="cursor: pointer" target="_blank"
                               href="{{asset('uploads/akta/izin_ibu/'.$entry->img_izin_tinggal_ibu)}}">
                                <div style="">
                                    <img class="img-fluid z-depth-1 image-link"
                                         style="height:200px; width:200px;object-fit: cover"
                                         src="{{asset('uploads/akta/izin_ibu/'.$entry->img_izin_tinggal_ibu)}}" alt="image">
                                </div>

                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Surat Keterangan Dokter</label>
                            <a style="cursor: pointer" target="_blank"
                               href="{{asset('uploads/akta/sk_dokter/'.$entry->img_sk_dokter)}}">
                                <div style="">
                                    <img class="img-fluid z-depth-1 image-link"
                                         style="height:200px; width:200px;object-fit: cover"
                                         src="{{asset('uploads/akta/sk_dokter/'.$entry->img_sk_dokter)}}" alt="image">
                                </div>

                            </a>
                        </div>
                    </div>

                    @else
                        <div class="form-group ">
                            <label for="no-surat" class="col-form-label">No Surat</label>
                            <input readonly type="text" class="form-control" id="no-surat" value="{{$entry->no_surat}}">
                        </div>

                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="keperluan" class="col-form-label">Keperluan</label>
                            <input readonly type="text" class="form-control" id="keperluan" value="{{$entry->keperluan}}">
                        </div>
                    @endif

                    <form method="POST" action="{{url($crud->route . '/' . $entry->getKey() . '/approve' )}}">
                        @csrf

{{--                        CUSTOM LETTER--}}

                        @if($crud->entity_name == 'customletter')
                            <div class="form-group mt-3">
                                <label for="changable-word" class="col-form-label">Ganti Kata Surat</label>
                                <select class="form-control" id="changable-word" name="changable-word-id">
                                    @if(!$ganti->isEmpty())
                                        <option value=""> Select option</option>
                                    @foreach($ganti as $word)
                                            <option value="{{$word->id}}" >
                                                {{$word->judul}}
                                            </option>
                                        @endforeach
                                    @else
                                        <option disabled >Data kosong</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="preview-word" class="col-form-label">Preview Kata</label>
                                <textarea readonly rows="7" class="form-control" id="preview-word">

                                </textarea>
                            </div>
                            <script>
                                $('#changable-word').change(function(){
                                    $('#preview-word').val('');
                                    word_id = this.value
                                    console.log(word_id)
                                    if (word_id !== ''){
                                        $.ajax({
                                            url: `{{backpack_url('changable-word')}}/${word_id}`,
                                            type: 'GET',
                                            success: function(result) {
                                                // Show an alert with the result
                                                console.log(result.response)
                                                $('#preview-word').val(result.response.deskripsi);

                                            },
                                            error: function(result) {
                                                // Show an alert with the result
                                                new Noty({
                                                    text: "The new entry could not be created. Please try again.",
                                                    type: "warning"
                                                }).show();

                                                console.log(result);
                                            }
                                        })

                                    }
                                });
                            </script>
                        @endif

{{--                        MASUK KULIAH--}}
                        @if($crud->entity_name == ('masukkuliah' || 'kuliahiftha'))
                            <div class="form-group mt-3">
                                <label for="changable-word" class="col-form-label">Ditunjukan Kepada:</label>
                                <select class="form-control" id="changable-word" name="changable-word-id">
                                    @if(!$ganti->isEmpty())
                                        <option value=""> Select option</option>
                                        @foreach($ganti_kb as $word)
                                            <option value="{{$word->id}}" >
                                                {{$word->judul}}
                                            </option>
                                        @endforeach
                                    @else
                                        <option disabled >Data kosong</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="preview-word" class="col-form-label">Preview Tujuan</label>
                                <textarea readonly rows="4" class="form-control" id="preview-word">

                                </textarea>
                            </div>

                            <script>
                                $('#changable-word').change(function(){
                                    $('#preview-word').val('');
                                    word_id = this.value
                                    console.log(word_id)
                                    if (word_id !== ''){
                                        $.ajax({
                                            url: `{{backpack_url('changable-word')}}/${word_id}`,
                                            type: 'GET',
                                            success: function(result) {
                                                // Show an alert with the result
                                                console.log(result.response)
                                                $('#preview-word').val(result.response.deskripsi);

                                            },
                                            error: function(result) {
                                                // Show an alert with the result
                                                new Noty({
                                                    text: "The new entry could not be created. Please try again.",
                                                    type: "warning"
                                                }).show();

                                                console.log(result);
                                            }
                                        })

                                    }
                                });
                            </script>
                        @endif
                        @if($crud->entity_name != 'legalisir')
                            <div class="form-group mt-3">
                                <label for="tanda-tangan" class="col-form-label">Petugas</label>
                                <select class="form-control" id="tanda-tangan" name="tanda_tangan_id">
                                    @if(!$ttd->isEmpty())
                                        @foreach($ttd as $tanda)
                                            <option value="{{$tanda->id}}" >
                                                {{$tanda->nama . ' - ' . $tanda->jabatan}}
                                            </option>
                                        @endforeach
                                    @else
                                        <option disabled >Data kosong</option>
                                    @endif
                                </select>
                            </div>

                        @endif

                        <div class="form-group">
                            <label for="tgl_ambil" class="col-form-label">Tanggal ambil</label>
                            <input type="date" class="date form-control"
                                   name="tgl_ambil">
                        </div>
                        <div class="modal-footer">
                            @if($crud->entity_name == 'akta-lahir')
                                <button type="button" id="dcModal" class="btn btn-danger"
                                        data-toggle="modal" data-target="#declineModal">
                                    <i class="la la-ban"></i>
                                    Decline
                                </button>
                            @else
                                <a href="javascript:void(0)" onclick="decline(this)"
                                   data-route="{{ url($crud->route . '/' . $entry->getKey() . '/decline' ) }}"
                                   class="btn btn-danger" data-button-type="decline">
                                    <i class="la la-remove"></i>
                                    Decline
                                </a>
                            @endif
                            <button type="submit" class="btn btn-success">
                                <i class="la la-check-double"></i>
                                Approve
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

{{--    DECLINE MODAL--}}
    <div class="modal fade " style="top:50px; max-height: 90%;" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content my-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url($crud->route . '/' . $entry->getKey() . '/decline' )}}">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-form-label">Alasan ditolak</label>
                            <textarea class="form-control" rows="5" name="alasan_ditolak"></textarea>
                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-danger">
                                    <i class="la la-send-o"></i>
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--END DECLINE MODAL--}}

@endif

@if($entry->status == 'disetujui')
    <a href="{{url($crud->route . '/' . $entry->getKey() . '/print')}}" class="btn btn-primary" style="width: 200px">
        <i class="la la-download "></i>
        Download
    </a>

@endif
@if($entry->status == 'ditolak')
    <a href="{{url($crud->route . '/' . $entry->getKey() . '/delete')}}"
       class="btn btn-danger" style="width: 100px"
       onclick="return confirm('Data pada User juga akan terhapus, Anda yakin?');">
        <i class="la la-trash-o "></i>
        Hapus
    </a>

@endif

<script>

    $("#dcModal").on('click', function () {
        $('#exampleModal').modal('hide');
    })
</script>

<script>

    if (typeof approve != 'function') {
        $("[data-button-type=approve]").unbind('click');

        function approve(button) {

            var button = $(button);
            var route = button.attr('data-route');

            $.ajax({
                url: route,
                type: 'POST',
                beforeSend:function(){
                    return confirm("Are you sure to approve?");
                },
                success: function(result) {
                    // Show an alert with the result
                    console.log(result,route);
                    new Noty({
                        text: "Izin tinggal disetujui",
                        type: "success"
                    }).show();

                    // Hide the modal, if any
                    $('.modal').modal('hide');

                    crud.table.ajax.reload();
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        text: "The new entry could not be created. Please try again.",
                        type: "warning"
                    }).show();

                    console.log(result);
                }
            });
        }
    }

    if (typeof decline != 'function') {
        $("[data-button-type=decline]").unbind('click');

        function decline(button) {

            var button = $(button);
            var route = button.attr('data-route');

            $.ajax({
                url: route,
                type: 'POST',
                beforeSend:function(){
                    return confirm("Are you sure to decline?");
                },
                success: function(result) {
                    // Show an alert with the result
                    console.log(result,route);
                    new Noty({
                        text: "Izin tinggal berhasil di tolak",
                        type: "success"
                    }).show();

                    // Hide the modal, if any
                    $('.modal').modal('hide');

                    crud.table.ajax.reload();
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        text: "The new entry could not be created. Please try again.",
                        type: "warning"
                    }).show();

                    console.log(result);
                }
            });
        }
    }

</script>
