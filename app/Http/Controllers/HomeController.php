<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\Kelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 2){

            return redirect('/kelas');
        }
        $mahasiswa=Mahasiswa::all();
        $kelas=Kelas::all();
        return view('home', compact('mahasiswa','kelas'));
    }
}
