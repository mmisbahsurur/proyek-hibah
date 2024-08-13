<?php

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'show' : '';
}

function getHibah($poktan, $jenis_hibah)
{
    // Extract all the kelompok_tani IDs into an array
    $kelompok_tani_ids = $poktan->pluck('id')->toArray();

    // Fetch the total sum of 'jumlah' directly from the database
    $hibah = App\Models\Hibah::whereIn('id_kelompoktani', $kelompok_tani_ids)->where('jenis_hibah', $jenis_hibah)->sum('jumlah');

    return $hibah;
}
