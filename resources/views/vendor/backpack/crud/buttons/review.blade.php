@php
    $ttd = \App\Models\TandaTangan::all() ?? null;
@endphp


@if($entry->status == 'new')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="la la-eye"></i>
        Review
    </button>


    <div class="modal fade " style="top:50px; max-height: 90%" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                           href="{{$entry->img_docs}}">
                            <i class="la la-eye"></i>
                            Lihat dokumen
                        </a>
                    @else
                        <div class="form-group ">
                            <label for="no-surat" class="col-form-label">No Surat</label>
                            <input readonly type="text" class="form-control" id="no-surat" value="{{$entry->no_surat}}">
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                    </div>
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div><div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" value="{{$entry->user->name}}">
                        </div>

                    <div class="form-group">
                        <label for="keperluan" class="col-form-label">Keperluan</label>
                        <input readonly type="text" class="form-control" id="keperluan" value="{{$entry->keperluan}}">
                    </div>

                    <form method="POST" action="{{url($crud->route . '/' . $entry->getKey() . '/approve' )}}">
                        @csrf

                        @if($crud->entity_name != 'legalisir')
                            <div class="form-group">
                                <label for="tanda-tangan" class="col-form-label">Penanda tangan</label>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endif

@if($entry->status == 'approved')
    <a href="{{url($crud->route . '/' . $entry->getKey() . '/print')}}" class="btn btn-primary" style="width: 200px">
        <i class="la la-download "></i>
        Download
    </a>

@endif

<script>

</script>

<script>
    // $('#exampleModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var recipient = button.data('whatever') // Extract info from data-* attributes
    //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //     var modal = $(this)
    //     modal.find('.modal-title').text('New message to ' + recipient)
    //     modal.find('.modal-body input').val(recipient)
    // })

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
