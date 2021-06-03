@extends('layouts.main')

@section('title', 'Halaman Kelas')

@section('content')

@include('layouts.alert')
<a href="/kelas" class="btn btn-danger">Kembali</a>
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="mt-3">Detail Kelas</h1>
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
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nim</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach($mahasiswa->mahasiswa as $mhs)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$mhs->nama}}</td>
            <td>{{$mhs->nim}}</td>
            <td>

            <a href="/peserta/{{$mahasiswa->id}}/{{$mhs->id}}/hapus" onclick="return confirm('Data akan dihapus!\nApakah anda yakin?')" class="btn btn-danger btn-sm">Hapus</a>

            </td>
            </tr>
            @endforeach

        </tbody>
  
        </table>
    </div>
    <a href="/{{$kelas -> id}}/peserta/tambah" class="btn btn-primary">Tambah</a>

<br/>

 
<br/>

@endsection