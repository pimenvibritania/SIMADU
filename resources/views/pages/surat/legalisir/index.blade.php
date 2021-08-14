@extends('layouts.default')

@section('content')
    @if(session()->has('successMsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('successMsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col mb-3 ">
                <a href="{{route('surat.dashboard')}}" class="btn btn-danger text-left" >
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </a>
                <a href="{{route('legalisir.create')}}" class="btn mybtn text-right" >
                    <i class="fa fa-plus-square"></i>
                    Ajukan
                </a>
            </div>
        </div>
        <div class="panel-body">
            <h3 class="text-center m-3">Surat Keterangan alamat di Indonesia yang telah diajukan</h3>

            <div style="width: 100%;" class="p-4">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table table-hover dt-responsive display nowrap" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>No Permohonan</th>
                            <th>Nama Dokumen</th>
                            <th>Jml Surat</th>
                            <th>Tgl Ambil</th>
                            <th>Diajukan</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
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
                ajax: "{{ route('legalisir.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'no_permohonan', name: 'no_permohonan'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jml_surat', name: 'jml_surat'},
                    {data: 'tgl_ambil', name: 'tgl_ambil'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'},
                    // {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>

@endsection
