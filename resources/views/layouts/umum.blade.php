<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('css', ['cssku.css']) }}">

    <title>E-SERTIFIKAT</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pb-0">
        <div class="container py-4" style="border-bottom: 3px solid grey">
            <a class="navbar-brand" href="#">
                <img src="{{ url('/gambar', ['desacerdas.PNG']) }}" width="90" height="80" class="d-inline-block align-top bg-dark rounded-circle" alt="">
                
              </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item @yield('activehome')">
                        <a class="nav-link" href="{{ url('/', []) }}">HOME
                        </a>
                    </li>

                    <li class="nav-item @yield('activeprofil')">
                        <a class="nav-link" href="{{ url('profil', []) }}">PROFIL
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown @yield('activedrop')">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            POJOK
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @php
                                $pojok = DB::table("pojok")->get();
                            @endphp
                            @foreach ($pojok as $item)
                            <a class="dropdown-item" href="{{ url('baca', [$item->idpojok]) }}">{{ $item->namapojok }}</a>
                                
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item @yield('activesertifikat')">
                        <a class="nav-link" href="{{ url('/e-sertifikat', []) }}">E-SERTIFIKAT
                        </a>
                    </li>
                </ul>
                
            </div>
            <form class="form-inline ">
                <a href="{{ url('login', []) }}" class="btn btn-outline-secondary my-2 my-sm-0" type="submit">LOGIN</a>
            </form>
        </div>
    </nav>



    @yield('content')



    <div class="container ">
        <div class="card">
            <div class="card-body pt-0">
                <br>
                <center>
                    <h3 class="mt-0 pt-0">SILAHKAN BERI KOMENTAR ANDA</h3>
                    
                </center>
                <hr>
                <br>
        
                <form action="{{ route('komentar', []) }}" method="post">
                    @csrf
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="masukan nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
                      <div class="col-sm-10">
                            <textarea id="komentar" placeholder="masukan komentar anda" class="form-control" name="komentar" rows="3"></textarea>
                      </div>
                    </div>
        
                    <div class="text-right">
                        <button type="submit" class="btn btn-success px-4">
                            Kirim Pesan
                        </button>
                    </div>
                  </form>

            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield('script')
  </body>
</html>