<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function upload(Request $request, $pertemuan_id, $id_kelas){

        
            $this->validate($request,[
                'csv' => 'required'
            ]);
            $fileName = $_FILES["csv"]["tmp_name"];
            $nama_file = $_FILES["csv"]["name"];
            $ext = 'csv';
            $ext_file = explode('.', $nama_file);
            $ext_file = strtolower(end($ext_file));
            if ($ext_file != $ext) {
                return redirect()->back()->with('error','Masukkan format file dengan benar!');
            } else {
                $file = fopen($fileName, "r");
                $skipLines = 7;
                $lineNum = 1;
                while (fgetcsv($file)) {
                    if ($lineNum > $skipLines) {
                        break;
                    }
                    $lineNum++;
                }
                $data = array();

                $i=0;
                while (($column = fgetcsv($file, 1000, ";")) !== FALSE) {

                    $num = count($column);
                    $num--;
                    for ($c = 0 ; $c < $num ; $c++){
                        if ($c == 0) {
                            $data[$i][$c] = substr($column[$c], -10);
                        }
                        if ($c == 1) {
                            $data[$i][$c] = explode(",", $column[$c]);
                                if ($c == 1) {
                                    $data[$i][$c] = explode(" ", $column[$c]);
                                }
                        }
                        if ($c == 2) {
                            $data[$i][$c] = explode(",",$column[$c]);
                            if ($c == 2) {
                                $data[$i][$c] = explode(" ", $column[$c]);
                            }
                        }
                        
                            $data[$i][] = $column[$c];
                        
                    
                    }
                   
                    $i++;
                }
                

                
                $check = count ($data);
                
                foreach ($data as $dt) {
                    
                    $cek = DB::table('krs')
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
                    ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                    ->where('kelas.id', $id_kelas)
                    ->where('mahasiswa.email', $dt[5])
                    ->get('krs.krs_id');
                    
              
                    $jml = count($cek);
                    


                    $durasi=(strtotime($dt[2][1])-strtotime($dt[1][1]))/60;
                    
                    if($jml > 0){
                        
                        foreach ($cek as $c) {
                            
                            Absen::firstOrCreate([
                                'krs_id' => $c->krs_id,
                                'pertemuan_id' => $pertemuan_id,
                                'jam_masuk' => $dt[1][1],
                                'jam_keluar' =>$dt[2][1],
                                'durasi' => (int)$durasi
                            ]);
                            
                        }
                        
                    }
                }
                return redirect()->back()->with('absen');
            }
            }
}
