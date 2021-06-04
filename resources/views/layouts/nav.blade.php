<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(21, 112, 219, 0.73)">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="/home"><img class="img-fluid" src="{{ asset('css/hore-hore.png') }}" alt="hore-hore"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         @if(auth()->user()->role == 1)
                        <li class="nav-item">
                          <a class="nav-link{{ request()->is('/home') ? ' active' : ''}}" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link{{ request()->is('mahasiswa') ? ' active' : ''}}" href="/mahasiswa">Mahasiswa</a>
                        </li>
                        @endif
                        <li class="nav-item">
                          <a class="nav-link{{ request()->is('kelas') ? ' active' : ''}}" href="/kelas">Kelas</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li>
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                          </li>
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(21, 112, 219, 0.73)">
  <div class="container-px-lg5">
    <a class="navbar-brand" href="#">Hore-hore Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link{{ request()->is('/home') ? ' active' : ''}}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('kelas') ? ' active' : ''}}" href="/kelas">Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('mahasiswa') ? ' active' : ''}}" href="/mahasiswa">Mahasiswa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a href="{{ route('logout') }}" class="dropdown-item">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> -->