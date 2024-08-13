<?php

namespace App\Http\Controllers;

use session;
use App\Models\Mkota;
use App\Models\Mkecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_kecamatan')->join('tbl_kota','tbl_kota.id','=','tbl_kecamatan.regency_id')->select('tbl_kecamatan.*','tbl_kota.name as nmkot','tbl_kota.id as kode')->where('tbl_kecamatan.regency_id','like','33%')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'pages.lokasi.kecamatan.action')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $kab = DB::table('tbl_kota')->where('province_id',33)->get();
        return view('pages.lokasi.kecamatan.index', compact('kab'));
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
            'regency_id'     => 'required',
            'name'           => 'required'
        ]);

        Mkecamatan::create($validateData);
        return redirect()->route('lokkecamatan.index')->with([
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
        $kota = Mkota::orderby('name','asc')->get()->pluck('name', 'id');
        $kec = Mkecamatan::find(base64_decode($id));
        return view('pages.lokasi.kecamatan.edit', compact('kec', 'kota'));
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
            'regency_id'     => 'required',
            'name'           => 'required'
        ];
        $validateData = $request->validate($rules);

        Mkecamatan::where('id', $id)->update($validateData);

        return redirect()->route('lokkecamatan.index')->with([
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
        Mkecamatan::find($id)->delete();

        return redirect()->route('lokkecamatan.index')->with([
            'message' => 'Data berhasil di hapus!', 
            'status' => 'success'
        ]);
    }
}