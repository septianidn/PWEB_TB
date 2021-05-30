<?php

namespace App\Http\Controllers;

use App\Kelas;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas=Kelas::orderBy('semester','desc')->orderBy('tahun','desc')->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.tambah');
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
            'numeric' => 'Gunakan angka!',
            'integer' => 'Gunakan angka!',
            'regex' => 'Gunakan kombinasi huruf besar dan angka!',
            'lt' => 'Maksimal SKS adalah 4!',
            'min' => 'Minimal Karakter adalah :min!',
            'alpha' => 'Gunakan huruf!',

        ];

        $this->validate($request,[
            'kode_kelas' => 'required|regex:/^(?=.*[A-Z])(?=.*\d).+$/|max:10',
            'kode_matkul' => 'required|regex:/^(?=.*[A-Z])(?=.*\d).+$/|max:10',
            'nama_matkul' => 'required|alpha|max:50',
            'tahun' => 'required|integer|min:2000|max:2030',
            'sks' => 'required|numeric|lt:5|min:1'
        ], $pesan);

        Kelas::create($request->all());
        return redirect('/kelas')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $kelas=Kelas::findOrFail($id);
        return view('kelas.detail', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas=Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pesan = [

            'required' => 'Field ini harus diisi!',
            'max' => 'Maksimal Karakter adalah :max!',
            'numeric' => 'Gunakan angka!',
            'integer' => 'Gunakan angka!',
            'regex' => 'Gunakan kombinasi huruf besar dan angka!',
            'lt' => 'Maksimal SKS adalah 4!',
            'min' => 'Minimal Karakter adalah :min!',
            'alpha' => 'Gunakan huruf!',

        ];

        $this->validate($request,[
            'kode_kelas' => 'required|regex:/^(?=.*[A-Z])(?=.*\d).+$/|max:10',
            'kode_matkul' => 'required|regex:/^(?=.*[A-Z])(?=.*\d).+$/|max:10',
            'nama_matkul' => 'required|alpha|max:50',
            'tahun' => 'required|integer|min:2000|max:2030',
            'sks' => 'required|numeric|lt:5|min:1'
        ], $pesan);

        Kelas::where('id', $id)->UPDATE([
            'kode_kelas'=>$request->kode_kelas, 
            'kode_matkul'=>$request->kode_matkul, 
            'nama_matkul'=>$request->nama_matkul, 
            'tahun'=>$request->tahun, 
            'semester'=>$request->semester, 
            'sks'=>$request->sks
        ]);
        return redirect('/kelas')->with('status','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
