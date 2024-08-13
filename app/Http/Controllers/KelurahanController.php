<?php

namespace App\Http\Controllers;

use App\Models\Mdesa;
use App\Models\Mkota;
use App\Models\Mkecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_desa')->join('tbl_kecamatan','tbl_kecamatan.id','=','tbl_desa.district_id')->join('tbl_kota','tbl_kota.id','=','tbl_kecamatan.regency_id')->select('tbl_desa.*','tbl_kecamatan.name as nmkec','tbl_kecamatan.id as kodekec','tbl_kota.name as nmkot','tbl_kota.id as kode')->where('tbl_desa.district_id','like','33%')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'pages.lokasi.kelurahan.action')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $kab = DB::table('tbl_kota')->where('province_id',33)->get();
        $kec = DB::table('tbl_kecamatan')->where('regency_id','like','33%')->get();
        return view('pages.lokasi.kelurahan.index', compact('kab','kec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id'             => 'required',
            'district_id'    => 'required',
            'name'           => 'required'
        ]);

        Mdesa::create($validateData);
        return redirect()->route('lokkelurahan.index')->with([
            'message' => 'Data berhasil di tambahkan!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kec = Mkecamatan::orderby('name','asc')->get()->pluck('name', 'id');
        $desa = Mdesa::find(base64_decode($id));
        return view('pages.lokasi.kelurahan.edit', compact('kec', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
           'id'             => 'required',
            'district_id'    => 'required',
            'name'           => 'required'
        ];
        $validateData = $request->validate($rules);

        Mdesa::where('id', $id)->update($validateData);

        return redirect()->route('lokkelurahan.index')->with([
            'message' => 'Data berhasil di edit!', 
            'status' => 'success'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mdesa::find($id)->delete();

        return redirect()->route('lokkelurahan.index')->with([
            'message' => 'Data berhasil di hapus!', 
            'status' => 'success'
        ]);
    }
}