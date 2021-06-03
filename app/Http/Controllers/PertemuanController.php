<?php

namespace App\Http\Controllers;

use App\Pertemuan;

use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas)
    {
        $pertemuan=Pertemuan::orderBy('pertemuan_ke','asc')->get();
        return view('pertemuan.index', compact('pertemuan','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kelas)
    {
        return view('pertemuan.tambah', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $kelas)
    {
        $pesan = [

            'required' => 'Field ini harus diisi!',
            'max' => 'Maksimal Karakter adalah :max!',
            'integer' => 'Gunakan angka!',
            'regex' => 'Gunakan kombinasi huruf besar dan angka!',
            'min' => 'Minimal Karakter adalah :min!',

        ];

        $this->validate($request,[
            'pertemuan_ke' => 'required|integer|min:1|max:16',
            'materi',
            'tanggal',
        ], $pesan);

        Pertemuan::create([
            'kelas_id' => $kelas,
            'pertemuan_ke' => $request -> pertemuan_ke,
            'tanggal' => $request -> tanggal,
            'materi' => $request -> materi
        ]);
        return redirect('/pertemuan/{{$kelas}}')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pertemuan_id)
    {
        $pertemuan=Pertemuan::where('pertemuan_id', $pertemuan_id) -> first();
        $kelas=$pertemuan -> kelas;
        return view('pertemuan.detail', compact('pertemuan','kelas'));
    }
}
