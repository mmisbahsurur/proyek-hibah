<?php

namespace App\Http\Controllers;

use App\Models\JenisHibah;
use App\Models\Mkota;
use Illuminate\Http\Request;

class MProvinsiController extends Controller
{
    public function index(Request $request) 
    {
        $jenis_hibahs = JenisHibah::whereNotNull('nama')
            ->orderBy('nama')
            ->get();
        
        $kotas = Mkota::where("province_id", '33')
            ->orderBy("name")
            ->get();
        $countKota = $kotas->count();

        return view('front-prov', compact(
            'jenis_hibahs',
            'countKota',
            'kotas',
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