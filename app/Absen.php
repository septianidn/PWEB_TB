<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['krs_id', 'pertemuan_id', 'jam_masuk', 'jam_keluar', 'durasi'];

    public function pertemuan(){
        return $this->belongsTo(Pertemuan::class);
    }
    public function krs(){
        return $this->belongsTo(Krs::class);
    }
    
}
