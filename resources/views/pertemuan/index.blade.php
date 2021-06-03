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
            <h1 class="mt-3">Daftar Pertemuan</h1>
            <div>
                <a href="/pertemuan/{{$kelas -> id}}/tambah" class="btn btn-sm btn-success">Tambah Data</a>
            </div>
        </div> 
    @if($pertemuan->count())
        <div class="col-6">
            @foreach($pertemuan as $prt)
            <div class="list-group-item d-flex" >
                <div class="mr-auto p-2">{{$prt->pertemuan_ke}}</div>
                <div class="p-2">
                <a href="/pertemuan/{{$prt->pertemuan_id}}/detail" class="btn btn-sm btn-success">Detail</a>
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