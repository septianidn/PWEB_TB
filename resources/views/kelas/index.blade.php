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
            <h1 class="mt-3">Daftar Kelas</h1>
            <a href="/kelas/tambah" class="btn btn-sm btn-success">Tambah Data</a>
        </div> 
        <div class="col-6">
            @foreach($kelas as $kls)
            <div class="list-group-item d-flex" >
                <div class="mr-auto p-2">{{$kls->nama_matkul}}</div>
                <div class="p-2">
                <a href="/kelas/{{$kls->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                <a href="/kelas/{{$kls->id}}/detail" class="btn btn-sm btn-success">Detail</a>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>

<br/>

 
<br/>
	

@endsection