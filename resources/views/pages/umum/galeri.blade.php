@extends('layouts.umum')

@section("activegaleri", "active")

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

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                @foreach ($galeri as $item)
                <div class="col-md-4 p-2">
                    <div class="card">
                        <div class="card-header text-center text-capitalize text-bold">
                            <b>
                                {{ $item->judul }}
                            </b>
                        </div>
                        <img src="{{ url('gambar/galeri', [$item->file]) }}" width="100%" alt="">

                    </div>

                </div>
                    
                @endforeach
            </div>
        </div>
    </div>

    
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