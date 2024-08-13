<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;
    protected $table = 'tbl_kelompoktani';
    protected $guarded = [];


    public function mkota()
    {
        return $this->belongsTo(Mkota::class, 'kota', 'id');
    }

    public function mkecamatan()
    {
        return $this->belongsTo(Mkecamatan::class, 'kecamatan', 'id');
    }

    public function mdesa()
    {
        return $this->belongsTo(Mdesa::class, 'desa', 'id');
    }

    public function hibah()
    {
        return $this->hasMany(Hibah::class, 'id_kelompoktani', 'id');
    }
}
