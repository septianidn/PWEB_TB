@extends('layouts.main')

@section('title', 'Absensi')

@section('content')

@include('layouts.alert')
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="mt-3">Absensi Kelas</h1>
        </div> 
        <div class="mt-3">
            <h3>{{$kelas -> nama_matkul}}</h3>
            <hr>
            <div class="text-secondary">
            Kode Matkul : {{$kelas -> kode_matkul}} &middot;
            Kode Kelas : {{$kelas -> kode_kelas}} &middot;
            Tahun Ajaran : {{$kelas -> tahun}} &middot;
            Semester : {{$kelas -> semester==1?'Ganjil':'Genap'}} &middot;
            SKS : {{$kelas -> sks}} &middot;
            </div>
        </div>
        
    </div>
    <div class="mt-5">
    <h4>Peserta Kelas</h4>
        <table class="table">
        <thead class="thead-light">
            <tr>
                        <th class="text-center">Pertemuan Ke</th>
                        <th>Tanggal</th>
                        <th>Jam masuk</th>
                        <th>Jam keluar</th>
                        <th>Durasi</th>
                        <th>Status</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach($data_absen as $mhs)
            <tr>
            <th scope="row" class="text-center">{{$mhs->pertemuan_ke}}</th>
            <td>{{$mhs->tanggal}}</td>
            <td>{{$mhs->jam_masuk}}</td>
            <td>{{$mhs->jam_keluar}}</td>
            <td>{{$mhs->durasi}}</td>
            <td>{{$mhs->durasi == 0 ? 'Tidak Hadir' : 'Hadir'}}</td>
            <td>

            

            </td>
            </tr>
            @endforeach

        </tbody>
  
        </table>
    </div>

<br/>

 
<br/>

@endsection