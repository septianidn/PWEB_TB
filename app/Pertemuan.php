<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuan';
    protected $fillable = ['krs_id','kelas_id','pertemuan_ke','tanggal','materi'];
}
