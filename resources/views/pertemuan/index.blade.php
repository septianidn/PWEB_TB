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
                <a href="/pertemuan/{{$kelas}}/tambah" class="btn btn-sm btn-success">Tambah Data</a>
            </div>
        </div> 
    @if($pertemuan->count())
        <div class="col-6">
            @foreach($pertemuan as $prt)
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Pertemuan {{$prt->pertemuan_ke}}
                        </button>
                        </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                Materi : {{$prt -> materi}}
                <a href="/pertemuan/{{$prt->pertemuan_id}}/detail" class="btn btn-sm btn-success">Detail</a>
                </div>
            </div>
        </div>
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