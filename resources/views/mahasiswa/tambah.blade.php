@extends('layouts.main')

@section('title', 'Tambah Data Mahasiswa')

@section('content')

    <div class="row">

        
            <div class="col mt-md-5 mr-5 ml-5">
                <h1>Tambah Mahasiswa</h1>

                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
               
                <form action="/mahasiswa/tambah" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label>Nama :</label>
                    <input type="text" class="form-control @error('nama')is-invalid @enderror" name="nama" value="{{ old('nama')}}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NIM :</label>
                    <input type="number" class="form-control @error('nim')is-invalid @enderror" name="nim" value="{{ old('nama')}}>
                     @error('nim')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input type="email" class="form-control @error('nim')is-invalid @enderror" name="email">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
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