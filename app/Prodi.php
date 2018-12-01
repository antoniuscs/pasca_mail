<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public $table = "prodi";
    protected $primaryKey= 'id';
    public $timestamps = true;
    protected $fillable = [
        'nama_prodi',
        'inisial_prodi',
        'kode_prodi',
        'status',
    ];
}
