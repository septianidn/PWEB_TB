@extends('layouts.main')

@section('title', 'Halaman Pertemuan')

@section('content')

     @if(session('absen'))
        <div class="alert alert-success">
            Absen telah berhasil Ditambahkan!
        </div> 
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div> 
    @endif
    
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="mt-3">Detail Pertemuan</h1>
        </div> 
        <div class="mt-5">
            <h3>Pertemuan {{$pertemuan['pertemuan_ke']}}</h3>
            <hr>
            <div class="text-secondary">
            Materi : {{$pertemuan['materi']}} &middot;
            Tanggal : {{$pertemuan['tanggal']}} &middot;
            <div class="mb-5">
                <a href="/pertemuan/{{$pertemuan ->kelas_id}}" class="btn btn-primary">Kembali</a>
            </div>
            </div>
        </div>
        <div class="col-6">
            <form action="/absensi/{{$pertemuan['pertemuan_id']}}/{{$pertemuan['kelas_id']}}" class="form-group" method="post" enctype="multipart/form-data">
            @csrf
                <label for="csv">Input file :</label>
                <input type="file" name="csv" id="csv" class="form-control @error('csv')is-invalid @enderror">
                @error('csv')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                <button type="submit" name="submit" class="btn btn-success">Upload</button>
            </form>
        </div>

<div class="mt-5">
         <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Keluar</th>
            <th scope="col">Durasi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data_mhs as $k)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$k->nama}}</td>
            <td>{{$k->durasi > 0 ? 'Hadir' : 'Tidak Hadir'}}</td>
            <td>{{$k->jam_masuk ?? '-'}}</td>
            <td>{{$k->jam_keluar ?? '-'}}</td>
            <td>{{$k->durasi ?? '-'}}</td>
            </tr>
            
        @endforeach
        </tbody>
  
        </table>
        </div>
    </div>
<br/>

 
<br/>
	

@endsection