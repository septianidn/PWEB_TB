@extends('layouts.main')

@section('title', 'Halaman Mahasiswa')

@section('content')
    <div class="d-flex justify-content-between">
      <h1>Halaman Mahasiswa</h1>
      <div>
      <a href="/mahasiswa/tambah" class="btn btn-sm btn-primary">Tambah Data</a>
      </div>
    </div>
@if($mahasiswa->count())

@include('layouts.alert')

<div class="row justify-content-center">
<div class="col-auto">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>


  @foreach($mahasiswa as $mhs)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$mhs->nama}}</td>
      <td>{{$mhs->nim}}</td>
      <td>{{$mhs->email}}</td>
      <td>
      <a href="/mahasiswa/{{ $mhs->user_id}}/edit" class="btn btn-warning btn-sm">Edit</a>     
        <a href="/mahasiswa/{{$mhs->user_id}}/hapus" onclick="return confirm('Data akan dihapus\nApakah anda yakin?');" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
    <br/>
      Halaman : {{ $mahasiswa->currentPage() }} <br/>
      Jumlah Data : {{ $mahasiswa->total() }} <br/>
      Data Per Halaman : {{ $mahasiswa->perPage() }} <br/>

      <div class="d-flex justify-content-center">
        {{ $mahasiswa->links() }}
      </div>
@else
  <div class="alert alert-info">
    Tidak ada data
  </div>
@endif
<br/>

 

@endsection