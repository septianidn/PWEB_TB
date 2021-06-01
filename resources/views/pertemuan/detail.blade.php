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
        <div class="col-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$pertemuan['pertemuan_ke']}}</h5>
                        <ul class="list-group">
                        <li class="list-group-item">Materi : {{$pertemuan['materi']}}</li>
                        <li class="list-group-item">Tanggal : {{$pertemuan['tanggal']}}</li>
                        </ul>
                        <a href="/pertemuan" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
        
        </div>
    </div>

<br/>

 
<br/>
	

@endsection