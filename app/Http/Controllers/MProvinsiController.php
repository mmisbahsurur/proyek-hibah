<?php

namespace App\Http\Controllers;

use App\Models\JenisHibah;
use App\Models\Mkota;
use Illuminate\Http\Request;

class MProvinsiController extends Controller
{
    public function index(Request $request)
    {
        set_time_limit(300);
        $jenis_hibahs = JenisHibah::whereNotNull('nama')
            ->orderBy('nama')
            ->get();

        $kotas = Mkota::where('province_id', '33')
            ->with(['kelompoktani.hibah' => function($query) use ($jenis_hibahs) {
                $query->whereIn('jenis_hibah', $jenis_hibahs->pluck('id'));
            }])
            ->orderBy('name')
            ->get();
        $countKota = $kotas->count();

        $hibah_totals = [];
        foreach ($kotas as $kota) {
            $hibah_totals[$kota->id] = [];
            foreach ($jenis_hibahs as $jenis_hibah) {
                $hibah_totals[$kota->id][$jenis_hibah->id] = getHibah($kota->kelompoktani, $jenis_hibah->id);
            }
        }

        return view('front-prov', compact(
            'jenis_hibahs',
            'countKota',
            'kotas',
            'hibah_totals',
        ));
    }

    // public function index(Request $request)
    // {
    //     if($request->ajax()) {
    //         $jenis_hibahs = JenisHibah::whereNotNull('nama')->orderBy('nama')->get();
    //         $kotas = Mkota::where("province_id", '33')->orderBy("name")->get();
    //         $countKota = $kotas->count();

    //         return view('front-prov', compact(
    //             'jenis_hibahs',
    //             'countKota',
    //             'kota'
    //         ));

    //     }
    // }


}
