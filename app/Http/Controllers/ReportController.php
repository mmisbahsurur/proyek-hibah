<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
           
            if(!empty($request->kota) && empty($request->kecamatan) && empty( $request->desa) && empty($request->kelompok)) {
                $data = DB::table('tbl_kelompoktani')
                ->join('tbl_hibah2', 'tbl_hibah2.id_kelompoktani', '=', 'tbl_hibah2.id')
                ->join('tbl_jenishibah', 'tbl_jenishibah.id', '=', 'tbl_hibah2.jenis_hibah')
                ->join('tbl_kota', 'tbl_kota.id', '=', 'tbl_kelompoktani.kota')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id', '=', 'tbl_kelompoktani.kecamatan')
                ->join('tbl_desa', 'tbl_desa.id', '=', 'tbl_kelompoktani.desa')
                ->select('tbl_hibah2.*','tbl_kelompoktani.nama_kelompok as namakelom', 'tbl_kelompoktani.nomer_register as noreg','tbl_jenishibah.satuan as namasat','tbl_jenishibah.nama as namajen', 'tbl_kota.name as kota', 'tbl_kecamatan.name as kecamatan', 'tbl_desa.name as desa')
                ->where('tbl_kelompoktani.kota', $request->kota)
                ->get();
            } elseif (!empty($request->kota) && !empty($request->kecamatan) && empty($request->desa) && empty($request->kelompok)) {
                $data = DB::table('tbl_kelompoktani')
                ->join('tbl_hibah2', 'tbl_hibah2.id_kelompoktani', '=', 'tbl_hibah2.id')
                ->join('tbl_jenishibah', 'tbl_jenishibah.id', '=', 'tbl_hibah2.jenis_hibah')
                ->join('tbl_kota', 'tbl_kota.id', '=', 'tbl_kelompoktani.kota')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id', '=', 'tbl_kelompoktani.kecamatan')
                ->join('tbl_desa', 'tbl_desa.id', '=', 'tbl_kelompoktani.desa')
                ->select('tbl_hibah2.*','tbl_kelompoktani.nama_kelompok as namakelom', 'tbl_kelompoktani.nomer_register as noreg','tbl_jenishibah.satuan as namasat','tbl_jenishibah.nama as namajen', 'tbl_kota.name as kota', 'tbl_kecamatan.name as kecamatan', 'tbl_desa.name as desa')
                ->where('tbl_kelompoktani.kota', $request->kota)
                ->where('tbl_kelompoktani.kecamatan', $request->kecamatan)
                ->get();
            } elseif (!empty($request->kota) && !empty($request->kecamatan) && !empty( $request->desa) && empty($request->kelompok)) {
                $data = DB::table('tbl_kelompoktani')
                ->join('tbl_hibah2', 'tbl_hibah2.id_kelompoktani', '=', 'tbl_hibah2.id')
                ->join('tbl_jenishibah', 'tbl_jenishibah.id', '=', 'tbl_hibah2.jenis_hibah')
                ->join('tbl_kota', 'tbl_kota.id', '=', 'tbl_kelompoktani.kota')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id', '=', 'tbl_kelompoktani.kecamatan')
                ->join('tbl_desa', 'tbl_desa.id', '=', 'tbl_kelompoktani.desa')
                ->select('tbl_hibah2.*','tbl_kelompoktani.nama_kelompok as namakelom', 'tbl_kelompoktani.nomer_register as noreg','tbl_jenishibah.satuan as namasat','tbl_jenishibah.nama as namajen', 'tbl_kota.name as kota', 'tbl_kecamatan.name as kecamatan', 'tbl_desa.name as desa')
                ->where('tbl_kelompoktani.kota', $request->kota)
                ->where('tbl_kelompoktani.kecamatan', $request->kecamatan)
                ->where('tbl_kelompoktani.desa', $request->desa)
                ->get();
            }  elseif (!empty($request->kota) && !empty($request->kecamatan) && !empty( $request->desa) && !empty($request->kelompok)) {
                $data = DB::table('tbl_kelompoktani')
                ->join('tbl_hibah2', 'tbl_hibah2.id_kelompoktani', '=', 'tbl_hibah2.id')
                ->join('tbl_jenishibah', 'tbl_jenishibah.id', '=', 'tbl_hibah2.jenis_hibah')
                ->join('tbl_kota', 'tbl_kota.id', '=', 'tbl_kelompoktani.kota')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id', '=', 'tbl_kelompoktani.kecamatan')
                ->join('tbl_desa', 'tbl_desa.id', '=', 'tbl_kelompoktani.desa')
                ->select('tbl_hibah2.*','tbl_kelompoktani.nama_kelompok as namakelom', 'tbl_kelompoktani.nomer_register as noreg','tbl_jenishibah.satuan as namasat','tbl_jenishibah.nama as namajen', 'tbl_kota.name as kota', 'tbl_kecamatan.name as kecamatan', 'tbl_desa.name as desa')
                ->where('tbl_kelompoktani.kota', $request->kota)
                ->where('tbl_kelompoktani.kecamatan', $request->kecamatan)
                ->where('tbl_kelompoktani.desa', $request->desa)
                ->where('tbl_kelompoktani.nama_kelompok', $request->kelompok)
                ->get();
            }  elseif (empty($request->kota) && empty($request->kecamatan) && empty($request->desa) && !empty($request->kelompok)) {
                $data = DB::table('tbl_kelompoktani')
                ->join('tbl_hibah2', 'tbl_hibah2.id_kelompoktani', '=', 'tbl_hibah2.id')
                ->join('tbl_jenishibah', 'tbl_jenishibah.id', '=', 'tbl_hibah2.jenis_hibah')
                ->join('tbl_kota', 'tbl_kota.id', '=', 'tbl_kelompoktani.kota')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id', '=', 'tbl_kelompoktani.kecamatan')
                ->join('tbl_desa', 'tbl_desa.id', '=', 'tbl_kelompoktani.desa')
                ->select('tbl_hibah2.*','tbl_kelompoktani.nama_kelompok as namakelom', 'tbl_kelompoktani.nomer_register as noreg','tbl_jenishibah.satuan as namasat','tbl_jenishibah.nama as namajen', 'tbl_kota.name as kota', 'tbl_kecamatan.name as kecamatan', 'tbl_desa.name as desa')
                ->where('tbl_kelompoktani.nama_kelompok', $request->kelompok)
                ->get();
            } else {
                $data = DB::table('tbl_report')
                ->get();
            }
            return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
        }
        $kab = DB::table('tbl_kota')->where('province_id',33)->get();
        $kec = DB::table('tbl_kecamatan')->where('regency_id','like','33%')->get();
        $des = DB::table('tbl_desa')->where('district_id','like','33%')->get();
        $kel = DB::table('tbl_kelompoktani')->where('nama_kelompok', 'like', '%')->get();
        return view('front', compact('kab','kec', 'des','kel'));
    }
}