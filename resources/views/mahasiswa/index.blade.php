@extends('layouts.main')

@section('title', 'Halaman Mahasiswa')

@section('content')
    <h1>Hello Mahasiswa</h1>

     @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div> 
    @endif
{{ request()->is('mahasiswa') ? ' active' : ''}}
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
      <a href="/mahasiswa/{{ $mhs->id}}/edit" class="btn btn-warning">Edit</a>
      <a href="/mahasiswa/{{ $mhs->id}}/hapus" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


<br/>

 
 <br/>
	Halaman : {{ $mahasiswa->currentPage() }} <br/>
	Jumlah Data : {{ $mahasiswa->total() }} <br/>
	Data Per Halaman : {{ $mahasiswa->perPage() }} <br/>
	{{ $mahasiswa->links() }}

    <a href="/mahasiswa/tambah" class="btn btn-success">Tambah Data</a>
@endsection