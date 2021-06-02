@extends('layouts.main')

@section('title', 'Tambah Data Peserta Kelas')

@section('content')

    <div class="row">

        
            <div class="col mt-md-5 mr-5 ml-5">
                <h1>Tambah Peserta Kelas</h1>

                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
               
                <form action="/{{$id}}/peserta/tambah" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <h5>Mahasiswa :</h5>
                    <select name="mahasiswa" id="mahasiswa" class='form-select'>
                    @foreach($mahasiswa as $mhs) 
                        <option value="{{$mhs -> id}}">{{$mhs ->nama}}</option>
                    @endforeach
                    </select>
                </div>
            
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                </form>
            </div>
        </div>


@endsection