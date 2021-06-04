<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuan';
    protected $fillable = ['kelas_id','pertemuan_ke','tanggal','materi'];
    
    public function kelas(){
        return $this -> belongsTo(Kelas::class);
    }
    public function absensi(){
        return $this->hasMany(Absen::class);
    }
}
