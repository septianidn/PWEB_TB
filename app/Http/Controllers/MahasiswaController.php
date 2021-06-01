<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = User::with('mahasiswa')->get();
        $mhs = Mahasiswa::whereIn('user_id', $mahasiswa->pluck('id'))->paginate(5);

        return view('mahasiswa.index', [ 'mahasiswa' => $mhs, 'user' => $mahasiswa]);
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
            'min' => 'Minimal Karakter adalah 6!',
            'size' => 'Jumlah karakter adalah 10',
            'alpha_num' => 'gunakan kombinasi huruf dan angka',
            'confirmed' => 'Password tidak cocok',
            'digits' => 'Gunakan angka'

        ];

        $this->validate($request,[
            'nama' => 'required|max:50',
            'password' => 'required|alpha_num|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'email' => 'required|email',
            'nim' => 'required|size:10'
        ], $pesan);

    
        $cek = User::where('email' , $request->email)->first();
        $cek2 = User::where('username' , $request->nim)->first();
        if ($cek !== null || $cek2 !== null) {
            
            return redirect()->back()->with('eror','NIM atau Email Sudah pernah digunakan');
        }
    
       
        $user = new User;
        $user->email = $request->email;
        $user->username = $request->nim;
        $user->password = Hash::make($request->password);
        $user->save();
      

        
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $user->mahasiswa()->save($mahasiswa);
        $mahasiswa->save();

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
        $mahasiswa = User::findOrFail($id);

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

        
        $this->validate($request,[
            'nama' => 'required|max:50',
            'password' => 'required|max:15',
            'email' => 'required|email',
            'nim' => 'required|size:10'
        ], $pesan);

        $cek = User::where('email' , $request->email)->first();
        $cek2 = Mahasiswa::where('nim' , $request->nim)->first();
        if ($cek !== null && $cek2 !== null) {
        return redirect('/mahasiswa')->with('error','Data Mahasiswa Gagal Ditambahkan');
        }

        $user = User::find($request->id);

        $user->email = $request->email;
        $user->password = $request->password;
        $user->mahasiswa->nama = $request->nama;
        $user->mahasiswa->nim = $request->nim;

        $user->push();

      

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
        $user = User::findOrFail($id);
        $user->mahasiswa()->delete();
        $user->delete();
        return redirect('/mahasiswa')->with('status','Data Mahasiswa Berhasil Dihapus');
    }

        
}
