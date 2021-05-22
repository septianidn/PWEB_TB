@extends('layouts.main')

@section('title', 'Ubah Data Mahasiswa')

@section('content')

    <div class="row">

            <div class="col mt-md-5 mr-5 ml-5">
                <h1>Tambah Mahasiswa</h1>
               
                <form action="/mahasiswa/update" method="POST">
                {{ csrf_field() }}
                @method('patch')
                <input type="hidden" name="id" value="{{$mahasiswa->id}}">
                <div class="form-group">
                    <label>Nama :</label>
                    <input type="text" class="form-control @error('nama')is-invalid @enderror" name="nama" value="{{ $mahasiswa->nama }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NIM :</label>
                    <input type="number" class="form-control @error('nim')is-invalid @enderror" name="nim" value="{{ $mahasiswa->nim }}">
                     @error('nim')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input type="email" class="form-control" name="email" value="{{ $mahasiswa->email }}"> 
                </div>
                <div class="form-group">
                    <label>Password : </label>
                    <input type="password" class="form-control @error('nim')is-invalid @enderror" name="password">
                     @error('password')
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