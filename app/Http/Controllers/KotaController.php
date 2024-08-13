<?php

namespace App\Http\Controllers;

use App\Models\Mkota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_kota')->where('province_id',33)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'pages.lokasi.kota.action')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.lokasi.kota.index');
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
            'id'            => 'required',
            'province_id'   => 'required',
            'name'          => 'required',
        ]);
        

        Mkota::create($validateData);

        return redirect()->route('lokkota.index')->with([
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
        //
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
            'id'            => 'required',
            'province_id'   => 'required',
            'name'          => 'required',
        ];

        $validateData = $request->validate($rules);

        Mkota::where('id', $id)->update($validateData);

        return redirect()->route('lokkota.index')->with([
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
        Mkota::find($id)->delete();

        return redirect()->route('lokkota.index')->with([
            'message' => 'Data berhasil di hapus!', 
            'status' => 'success'
        ]);
    }
}