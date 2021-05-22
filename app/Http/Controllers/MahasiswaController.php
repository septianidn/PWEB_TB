<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.tambah');
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
            'max' => 'Maksimal Karakter adalah 50!',
            'size' => 'Jumlah karakter adalah 10',
            'digits' => 'Gunakan angka'

        ];

        $this->validate($request,[
            'nama' => 'required|max:50',
            'password' => 'required|max:10',
            'nim' => 'required|size:10'
        ], $pesan);

        
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nama = $request->nama;
        // $mahasiswa->nim = $request->nim;
        // $mahasiswa->email = $request->email;
        // $mahasiswa->password = $request->password;
        // $mahasiswa->tipe = 1;
        Mahasiswa::create($request->all());
        // $mahasiswa->save();

        return redirect('/mahasiswa')->with('status','Data Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        

        return view('mahasiswa.ubah', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
           $pesan = [

            'required' => 'Field ini harus diisi!',
            'max' => 'Maksimal Karakter adalah 50!',
            'size' => 'Jumlah karakter adalah 10',
            'digits' => 'Gunakan angka'

        ];

        // $rule = [
        //     'nama' => 'required|max:50',
        //     'password' => 'required|digits:11',
        //     'nim' => 'required|size:10'
        // ];
        
        $this->validate($request,[
            'nama' => 'required|max:50',
            'password' => 'required|max:11',
            'nim' => 'required|size:10'
        ], $pesan);


        Mahasiswa::where('id',$request->id)->UPDATE([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/mahasiswa')->with('status','Data Mahasiswa Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('/mahasiswa')->with('status','Data Mahasiswa Berhasil Dihapus');
    }
}
