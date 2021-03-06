@extends('layouts.main')

@section('title', 'Edit Data Kelas')

@section('content')

    <div class="row">

        
            <div class="col mt-md-5 mr-5 ml-5">
                <h1>Edit Data Kelas</h1>

                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
               
                <form action="/kelas/{{$kelas->id}}/edit" method="POST">
                {{ csrf_field() }}
                @method('patch')
                
                <div class="form-group">
                    <label>Kode Kelas :</label>
                    <input type="text" class="form-control @error('kode_kelas')is-invalid @enderror" name="kode_kelas" value="{{$kelas->kode_kelas}}">
                    @error('kode_kelas')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode Matkul :</label>
                    <input type="text" class="form-control @error('kode_matkul')is-invalid @enderror" name="kode_matkul" value="{{$kelas->kode_matkul}}">
                     @error('kode_matkul')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Mata Kuliah :</label>
                    <input type="text" class="form-control @error('nama_matkul')is-invalid @enderror" name="nama_matkul" value="{{$kelas->nama_matkul}}">
                     @error('nama_matkul')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Tahun Ajaran :</label>
                    <input type="number" class="form-control @error('tahun')is-invalid @enderror" name="tahun" value="{{$kelas->tahun}}">
                     @error('tahun')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Semester :</label>
                    <select name="semester" id="semester">
                        <option value="1">Ganjil</option>
                        <option value="2">Genap</option>
                    </select>
                     @error('semester')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label>SKS :</label>
                    <input type="number" class="form-control @error('sks')is-invalid @enderror" name="sks" value="{{$kelas->sks}}">
                     @error('sks')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                </form>
            </div>
        </div>


@endsection