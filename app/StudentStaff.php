<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentStaff extends Model
{
    public $table = "student_staff";
    protected $primaryKey= 'id';
    public $timestamps = true;
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'angkatan',
        'prodi',
        'npm',
        'divisi',
        'jabatan',
        'periode_awal',
        'periode_akhir',
        'status',
    ];
}
