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
            <h1 class="mt-3">Detail Kelas</h1>
        </div> 
        <div class="col-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$kelas['nama_matkul']}}</h5>
                        <ul class="list-group">
                        <li class="list-group-item">Kode Kelas : {{$kelas['kode_kelas']}}</li>
                        <li class="list-group-item">Kode Matkul : {{$kelas['kode_matkul']}}</li>
                        <li class="list-group-item">Tahun Ajaran : {{$kelas['tahun']}}</li>
                        <li class="list-group-item">Semester : {{$kelas['semester']}}</li>
                        <li class="list-group-item">SKS : {{$kelas['sks']}}</li>
                        </ul>
                        <a href="/kelas" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
        
        </div>
    </div>

<br/>

 
<br/>
	

@endsection