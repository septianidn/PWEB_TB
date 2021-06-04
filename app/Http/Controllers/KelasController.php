<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Krs;
use App\Mahasiswa;
use App\Pertemuan;
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
            'nama_matkul' => 'required|String|max:50',
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
        if(auth()->user()->role==1){
        $kelas=Kelas::findOrFail($id);
        $mahasiswa=Kelas::find($id);
        return view('kelas.detail', compact('kelas','mahasiswa'));
        }

        else{
        $kelas = Kelas::find($id);
        $data_absen = Kelas::select('pertemuan.pertemuan_ke', 'pertemuan.tanggal', 'absensi.jam_masuk', 'absensi.jam_keluar', 'absensi.durasi')
                                ->join('krs', 'kelas.id', '=', 'krs.kelas_id')
                                ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
                                ->join('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
                                ->leftjoin('absensi', function($query){
                                    $query->on('pertemuan.pertemuan_id', '=', 'absensi.pertemuan_id');
                                    $query->on('krs.krs_id', '=', 'absensi.krs_id');
                                })
                                ->where('mahasiswa.nim', auth()->user()->mahasiswa->nim)
                                ->where('krs.kelas_id', $id)
                                ->get();  
        return view('mahasiswa.halaman-absen', compact('kelas', 'data_absen'));
        }
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
            'nama_matkul' => 'required|String|max:50',
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
    public function peserta($id)
    {
        $krs = Krs::where('kelas_id',$id)->get();
        $mhs=[];
        if ($krs->isEmpty()){
            $mahasiswa = Mahasiswa::all();
        } 
        else{
            foreach ($krs as $k){
                $mhs[] = $k->mahasiswa_id;
            }
                $mahasiswa = Mahasiswa::select('*')->whereNotIn('id',$mhs) -> get();
        } 
        return view('kelas.peserta.tambah',compact('mahasiswa','id'));
    }
    public function tambahpeserta(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if ($request->mahasiswa==null){
            return \Redirect::route('Detail_Kelas',$id)->with('eror','Data Mahasiswa Kosong');
        }
        else{
            Krs::create([
                'kelas_id' => $kelas -> id,
                'mahasiswa_id' => $request -> mahasiswa
            ]);
        }
        return \Redirect::route('Detail_Kelas',$id)->with('status','Data Berhasil Ditambah');
    }
    public function hapuspeserta($kelas, $id)
    {
        // $krs = Krs::where('kelas_id',$kelas)->where('mahasiswa_id',$mhs)->first();
        //Krs::destroy($krs->krs_id);
        $mhs = Kelas::findOrFail($kelas);
        $mhs->mahasiswa()->detach($id);
        return \Redirect::route('Detail_Kelas',$kelas)->with('status','Data Berhasil Dihapus');
    }
}
