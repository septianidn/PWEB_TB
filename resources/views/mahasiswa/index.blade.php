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
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>


  @foreach($mahasiswa as $mhs)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$mhs->nama}}</td>
      <td>{{$mhs->nim}}</td>
      <td>
      <a href="/mahasiswa/{{ $mhs->user_id}}/edit" class="btn btn-warning btn-sm">Edit</a>

    <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Hapus
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>{{$mhs->nama}} ( {{$mhs->nim}} ) </div>
            </div>
            <div class="modal-footer">
            <form action="/mahasiswa/{{$mhs->user_id}}/hapus" method="POST">
                @csrf 
                @method('delete')
                  
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit" name="delete">Ya</button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
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