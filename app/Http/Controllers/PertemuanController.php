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
    public function index()
    {
        $pertemuan=Pertemuan::orderBy('pertemuan_ke','asc')->get();
        return view('pertemuan.index', compact('pertemuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertemuan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        Pertemuan::create($request->all());
        return redirect('/pertemuan')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pertemuan_id)
    {

        $pertemuan=Pertemuan::findOrFail($pertemuan_id);
        return view('pertemuan.detail', compact('pertemuan'));
    }
}
