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
            <div class="col">
                <a href="{{route('izin-tawaquf.create')}}" class="btn btn-info" >
                    <i class="fa fa-plus-square"></i>
                    Ajukan
                </a>
            </div>
        </div>
        <div class="panel-body">
            <h3 class="text-center m-3">Surat Pengantar Izin Tidak Ikut Ujian (Tawaquf)</h3>

            <div style="width: 100%;" class="p-4">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table table-hover dt-responsive display nowrap" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No Surat</th>
                            <th>No Permohonan</th>
                            <th>Thn Ajaran</th>
                            <th>Jml Surat</th>
                            <th>Tgl Ambil</th>
                            <th>Diajukan</th>
                            <th>Status</th>
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
                ajax: "{{ route('izin-tawaquf.index') }}",
                columns: [
                    {data: 'no_surat', name: 'no_surat'},
                    {data: 'no_permohonan', name: 'no_permohonan'},
                    {data: 'thn_ajaran', name: 'thn_ajaran'},
                    {data: 'jml_surat', name: 'jml_surat'},
                    {data: 'tgl_ambil', name: 'tgl_ambil'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'},
                ]
            });

        });
    </script>

@endsection
