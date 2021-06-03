<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['kode_kelas','kode_matkul','nama_matkul','tahun','semester','sks'];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class,'krs');
    }

    public function pertemuan(){
        return $this->hasMany(Pertemuan::class, 'pertemuan_id');
    }
}
