@extends('layouts.main')

@section('title', 'Homepage')

@section('content')
<div class="card-body">
    <h5>Welcome Home! <strong>{{ Auth::user()->name }}</strong></h5>
</div>
        <!-- Header-->
        <header class="py-5" style="background-image: url('img/background-home.jpg'); background-size: 50%">
            <div class="text-center my-5">
                        <h1 class="display-5 fw-bold">Hore-hore</h1>
                        <h1 class="display-5 fw-bold">Project</h1>
                        <p class="fs-4"></p>
                        <a class="btn btn-primary btn-lg" href="#">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><img src="{{asset('img/mahasiswa.png')}}" alt="mahasiswa" style="width: 36px; height: 36px;"></div>
                                <h2 class="fs-4 fw-bold">Mahasiswa</h2>
                                <p class="mb-0">Total mahasiswa : {{ count($mahasiswa) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><img src="{{asset('img/kelas.png')}}" alt="kelas" style="width: 36px; height: 36px;"></div>
                                <h2 class="fs-4 fw-bold">Kelas</h2>
                                <p class="mb-0">Total kelas : {{ count($kelas) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Hore-hore Project 2021</p></div>
        </footer>
@endsection