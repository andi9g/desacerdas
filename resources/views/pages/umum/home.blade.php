@extends('layouts.umum')

@section("activehome", "active")

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

    <div class="container">
        <div class="card my-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h1>DESA CERDAS KELURAHAN SENGGARANG</h1>
                        <p style="text-align: justify">Desa Cerdas, yang bertujuan meningkatkan kompetensi warga, diimplementasikan di Kelurahan Senggarang. Berdasarkan data pendidikan masyarakat, dirancang pusat-pusat pendidikan non-formal, disebut pojok-pojok literasi, termasuk pojok toleransi, pojok film, pojok parenting, kids corner, dan pojok kesehatan remaja...</p>
                        <a href="{{ url('profil', []) }}">Baca Selengkapnya...</a>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <img src="{{ url('/gambar', ['desacerdas.PNG']) }}" class="bg-dark rounded-circle" width="70%" alt="">

                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="jumbotron bg-light">
        <div class="container">
            <div class="container text-center my-3">
                <h2 class="font-weight-dark"><b>KEGIATAN SETIAP POJOK-POJOK</b></h2>
                <h5 class="px-4"><p>Program Penguatan Kapasitas Organisasi Kemahasiswaan Desa Cerdas Sekolah Tinggi Teknologi Indonesia</p></h5>
                <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            @foreach ($pojok as $item)
                            <div class="carousel-item @if ($loop->iteration==1)
                                active
                            @endif">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        @php
                                            $gambar = DB::table('konten')->where("idpojok", $item->idpojok)
                                            ->orderBy("tanggal", "desc");
                                        @endphp
                                        {{-- <div class="" style="width: 100%;height:500px">
                                        </div> --}}
                                        @if ($gambar->count() == 0)
                                            <img class="img-fluid" src="{{ url('gambar', ["noimage.jpg"]) }}" style="object-fit: cover;
                                            width: 100%;
                                            height: 200px;border:2px solid rgb(184, 184, 184);border-radius:10px">
                                        @else
                                            <img class="img-fluid" src="{{ url('gambar/konten', [$gambar->first()->gambar]) }}" style="object-fit: cover;
                                            width: 100%;
                                            height: 200px;border:2px solid rgb(184, 184, 184);border-radius:10px">
                                        @endif

                                        <h4 class="mt-3 text-uppercase"><b>{{ $item->namapojok }}</b></h4>
                                        <a href="{{ url('baca', [$item->idpojok]) }}" class="btn btn-block btn-secondary">
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            @endforeach
                            
                        </div>
                        <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon text-lg p-3 bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon text-lg p-3 bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                
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