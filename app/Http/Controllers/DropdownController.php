<?php

namespace App\Http\Controllers;

use App\Models\Mdesa;
use App\Models\Mkecamatan;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function apiKecamatan(Request $request)
    {
        $data['kecamatan'] = Mkecamatan::where("regency_id", $request->regency_id)
        ->get(["name", "id"]);
        return response()->json($data);
    }

    public function apiDesa(Request $request)
    {
        $data['desa'] = Mdesa::where("district_id", $request->district_id)
        ->get(["name","id"]);
        
        return response()->json($data);
    
    }
}