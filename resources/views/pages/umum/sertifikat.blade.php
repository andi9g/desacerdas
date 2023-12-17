@extends('layouts.umum')

@section("activesertifikat", "active")

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
            <form action="{{ url()->current() }}">
                <div class="input-group my-2 mb-5 px-4">
                    <input class="form-control" type="text" name="keyword" placeholder="masukan nama peserta" aria-label="keyword" aria-describedby="keyword" value="{{ $keyword }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="keyword">
                            <i class="fa fa-search"></i> Cari Sertifikat
                        </button>
                    </div>
                </div>
            
            </form>
    
    
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-lg table-striped table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Nomor Sertifikat</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <thead>
                            @foreach ($sertifikat as $item)
                                <tr>
                                    <td width="5px">{{ $loop->iteration }}</td>
                                    <td>{{ $item->namapeserta }}</td>
                                    <td>{{ $item->nomor }}</td>
                                    <td>
                                        <form action="{{ route('download.sertifikat', [$item->idsertifikat]) }}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                DOWNLOAD
                                            </button>
                                        </form>
                                        <button class="btn btn-info d-inline" type="button" data-toggle="modal" data-target="#lihat{{ $item->idsertifikat }}">LIHAT</button>
                                    </td>
                                </tr>

                                <div id="lihat{{ $item->idsertifikat }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">Lihat Sertifikat</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ url('gambar/sertifikat', [$item->file]) }}" width="100%" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
    
                            @if (count($sertifikat) == 0)
                                <tr>
                                    <td colspan="4" align="center" class="py-5">
                                        SILAHKAN CARI SERTIFIKAT TERLEBIH DAHULU
                                    </td>
                                </tr>
                            @endif

                        </thead>
                    </table>
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