<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = ['nama', 'nim', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Kelas(){
        return $this->belongsToMany(Kelas::class,'krs');
    }
}
