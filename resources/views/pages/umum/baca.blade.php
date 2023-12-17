@extends('layouts.umum')

@section("activedrop", "active")

@section('content')
    @if (Session::has("success"))
    <div class="container">
        <div class="alert alert-success text-uppercase text-bold text-center" role="alert">
            {{ Session::get("success") }}
        </div>

    </div>
    @endif

    @if (Session::has("error"))
    <div class="container">
        <div class="alert alert-danger text-uppercase text-bold text-center" role="alert">
            {{ Session::get("error") }}
        </div>
    </div>
    @endif
    @if (count($konten))
    <div class="jumbotron">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                @foreach ($konten as $item)
                <div class="carousel-item @if ($loop->iteration == 1)
                    active
                @endif">
                  <img src="{{ url('gambar/konten', [$item->gambar]) }}" class="d-block w-100" style="object-fit: cover;
                  width: 100%;
                  max-height: 450px;border:2px solid rgb(184, 184, 184);border-radius:10px">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                    
                @endforeach
                  
                </div>
               

                <a class="carousel-control-prev w-auto" data-target="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon text-lg p-3 bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" data-target="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon text-lg p-3 bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
        
    @endif

    <div class="container p-3">
        <h2>
                <b>
                    <u>
                        {{ (strtoupper(empty($pojok->namapojok)?'':$pojok->namapojok)) }}
                    </u>
                </b> 
        </h2>
        @foreach ($konten as $item)
          
        @if (($loop->iteration % 2) == 1)
        <div class="row my-2 ">
            <div class="col-md-5">
                <img src="{{ url('gambar/konten', [$item->gambar]) }}" width="100%" class="rounded-lg" alt="">
            </div>
            <div class="col-md-7 px-4 py-2">
                <p class="my-0 py-0 text-success"><i>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat("dddd, DD MMMM Y") }}</i></p>
                <h4 class="text-bold"><b>{{ $item->judul }}</b></h4>
                <p>{{ $item->isi }}</p>
            </div>
        </div>

        @elseif(($loop->iteration % 2) == 0)
        <div class="row bg-light my-2 p-3">
            
            <div class="col-md-7 px-4 py-2 text-right">
                <p class="my-0 py-0 text-success"><i>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat("dddd, DD MMMM Y") }}</i></p>
                <h4 class="text-bold"><b>{{ $item->judul }}</b></h4>
                <p>{{ $item->isi }}</p>
            </div>
            <div class="col-md-5">
                <img src="{{ url('gambar/konten', [$item->gambar]) }}" width="100%" class="rounded-lg" alt="">
            </div>
        </div>
        @endif

        @endforeach

        @if (count($konten)==0)
            <center>
                <h3>Tidak ada Postingan</h3>
            </center>
        @endif
    </div>
   
    <br><br><br><br>

    

    

    
@endsection


@section('script')
    <script>
        $('#recipeCarousel').carousel({
            interval: 10000
        })

        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 3;
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
@endsection