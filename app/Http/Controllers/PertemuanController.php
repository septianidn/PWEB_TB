<?php

namespace App\Http\Controllers;

use App\Kelas;
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
    public function show($id_kelas,$id_pertemuan)
    {
        $pertemuan = Pertemuan::where('pertemuan_id', $id_pertemuan)->first();
        $data_mhs = Kelas::select('mahasiswa.nama', 'kelas.id', 'kelas.nama_matkul', 'absensi.*')
                        ->join('krs', 'kelas.id', '=', 'krs.kelas_id')
                        ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
                        ->join('pertemuan', 'kelas.id', '=', 'pertemuan.kelas_id')
                        ->leftjoin('absensi', function($query){
                            $query->on('pertemuan.pertemuan_id', '=', 'absensi.pertemuan_id');
                            $query->on('krs.krs_id', '=', 'absensi.krs_id');
                        })
                        ->where('kelas.id', $id_kelas)
                        ->where('pertemuan.pertemuan_id', $id_pertemuan)
                        ->get();
        
        return view('pertemuan.detail', compact('pertemuan','data_mhs'));
    }
}
