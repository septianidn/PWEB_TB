@extends('layouts.main')

@section('title', 'Homepage')

@section('content')
<div class="card-body">
    <h5>Welcome Home!, <strong>{{ Auth::user()->name }}</strong></h5>
</div>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-2">
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
                <div class="row gx-lg-3">
                    <div class="col-lg-4 col-xxl-2 mb-3">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><img src="{{ asset('img/mahasiswa.png') }}" alt="mahasiswa" style="width:36px; height:36px;"></div>
                                <h2 class="fs-4 fw-bold">Mahasiswa</h2>
                                <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-2 mb-3">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><img src="{{ asset('img/kelas.png') }}" alt="kelas" style="width:36px; height:36px;"></div>
                                <h2 class="fs-4 fw-bold">Kelas</h2>
                                <p class="mb-0">As always, Start Bootstrap has a powerful collectin of free templates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-2 mb-3">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><img src="{{ asset('img/home.png') }}" alt="home" style="width:36px; height:36px;"></div>
                                <h2 class="fs-4 fw-bold">Pertemuan</h2>
                                <p class="mb-0">The heroic part of this template is the jumbotron hero header!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
