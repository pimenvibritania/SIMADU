<?php

namespace App\Http\Controllers;

use App\Models\IzinTinggal;
use App\Helpers\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class IzinTinggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = IzinTinggal::where('user_id', backpack_auth()->id())->get() ?? null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('Y-m-d'); // human readable format
                })
                ->editColumn('status', function(IzinTinggal $izin) {

                    if ($izin->status == 'new'){

                        return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                                class="btn btn-secondary">diajukan</a>
                                ';

                    } elseif ($izin->status == 'declined'){
                       return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                               class="btn  btn-danger">ditolak</a>
                               ';
                    } else{
                        return '<a href="javascript:void(0)"
                                style="cursor: not-allowed;"
                               class="btn btn-success">disetujui</a>
                               ';
                    }

                })
                ->addColumn('action', function($row){

//                    $btn = '<a href="{{url()}}" class="edit btn btn-primary btn-sm">View</a>';

                    return $this->getActionColumn($row);
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('pages.surat.izin_tinggal.index');
    }

    private function getActionColumn($data)
    {
        $showUrl = route('izin-tinggal.show', $data->id);
        return "<a class='waves-effect btn mybtn' data-value='$data->id'
                href='$showUrl'><i class='fa fa-eye'></i> Details</a>";
//        $editUrl = route('admin.brands.edit', $data->id);
//        return "<a class='waves-effect btn btn-success' data-value='$data->id' href='$showUrl'><i class='material-icons'>visibility</i>Details</a>
//                        <a class='waves-effect btn btn-primary' data-value='$data->id' href='$editUrl'><i class='material-icons'>edit</i>Update</a>
//                        <button class='waves-effect btn deepPink-bgcolor delete' data-value='$data->id' ><i class='material-icons'>delete</i>Delete</button>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = backpack_user()->biodata;
        $no_surat = Helper::generateId(new IzinTinggal(), 'no_surat', 'K/IT', 4);
        return \view('pages.surat.izin_tinggal.create', [
            'user' => $user,
            'no_surat'   => $no_surat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $request->validate([
            'tujuan' => 'required',
            'jml_surat'    => 'required',
            'keperluan' => 'required',
            'no_surat' => 'unique:izin_tinggals'
        ]);

        $name = backpack_user()->name;

        $no_permohonan = Helper::generateId(new IzinTinggal(),
            'no_permohonan',
            strtoupper(substr($name, 0, 1)) . '/' . backpack_user()->id ,
            3);

        IzinTinggal::create([
            'user_id' => backpack_user()->id,
            'no_permohonan' => $no_permohonan,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'jml_surat'    => $request->jml_surat,
            'keperluan' => $request->keperluan,
            'status' => 'new'
        ]);

        return \redirect('surat/izin-tinggal')
        ->with('successMsg','Izin tinggal berhasil di ajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function show(IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function edit(IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function update(Request $request, IzinTinggal $izinTinggal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat\IzinTinggal  $izinTinggal
     * @return Response
     */
    public function destroy(IzinTinggal $izinTinggal)
    {
        //
    }


}
