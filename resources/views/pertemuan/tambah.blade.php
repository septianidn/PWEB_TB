@extends('layouts.main')

@section('title', 'Tambah Data Pertemuan')

@section('content')

    <div class="row">

        
            <div class="col mt-md-5 mr-5 ml-5">
                <h1>Tambah Pertemuan</h1>

                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
               
                <form action="/pertemuan/{{$kelas}}/create" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Pertemuan-ke :</label>
                    <input type="number" class="form-control @error('pertemuan_ke')is-invalid @enderror" name="pertemuan_ke" value="{{ old('pertemuan_ke')}}">
                     @error('pertemuan_ke')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Materi :</label>
                    <input type="text" class="form-control @error('materi')is-invalid @enderror" name="materi" value="{{ old('materi')}}">
                     @error('materi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal :</label>
                    <input type="date" class="form-control @error('tanggal')is-invalid @enderror" name="tanggal" value="{{ old('tanggal')}}">
                     @error('tanggal')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                </form>
            </div>
        </div>


@endsection