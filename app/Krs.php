<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';
    protected $guarded = [];
    public function kelas() {
        return $this -> belongsTo(Kelas::class);
    }
        public function mahasiswa() {
        return $this -> belongsTo(Mahasiswa::class);
    }
}

