@extends('layouts.main')

@section('title', 'Halaman Pertemuan')

@section('content')

     @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div> 
    @endif
    
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="mt-3">Detail Pertemuan</h1>
        </div> 
        <div class="mt-3">
            <a href="/pertemuan/{{$kelas -> id}}" class="btn btn-primary">Kembali</a>
            <h3>Pertemuan {{$pertemuan['pertemuan_ke']}}</h3>
            <hr>
            <div class="text-secondary">
            Materi : {{$pertemuan['materi']}} &middot;
            Tanggal : {{$pertemuan['tanggal']}} &middot;
            </div>
        </div>
        <div class="col-6">
            <!-- disiko isi absen -->
        </div>
    </div>
<br/>

 
<br/>
	

@endsection