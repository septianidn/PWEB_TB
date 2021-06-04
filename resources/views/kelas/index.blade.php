@extends('layouts.main')

@section('title', 'Halaman Kelas')

@section('content')

     @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div> 
    @endif
    
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="mt-5">Daftar Kelas</h1>
            @if(auth()->user()->role ==1)
            <div>
                <a href="/kelas/tambah" class="btn btn-sm btn-success">Tambah Data</a>
            </div>
            @endif
        </div> 
    @if($kelas->count())
        <div class="row g-2">
            @foreach($kelas as $kls)
            <div class="row g-2 col-2">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary" style="position: relative;">{{$kls->nama_matkul}}
                        <br>
                        @if(auth()->user()->role ==1)
                        <a href="/kelas/{{$kls->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                        @endif
                        <a href="/kelas/{{$kls->id}}/detail" class="btn btn-sm btn-success">Detail</a>
                    </button>
                </div>
            </div>
            @endforeach
        
        </div>
    @else
        <div class="alert alert-info">
            Tidak ada data
        </div>
    @endif    
    </div>

<br/>

 
<br/>
	

@endsection