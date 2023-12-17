@extends('layouts.umum')

@section("activeprofil", "active")

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
                        <p style="text-align: justify">Desa Cerdas, yang bertujuan meningkatkan kompetensi warga, diimplementasikan di Kelurahan Senggarang. Berdasarkan data pendidikan masyarakat, dirancang pusat-pusat pendidikan non-formal, disebut pojok-pojok literasi, termasuk pojok toleransi, pojok film, pojok parenting, kids corner, dan pojok kesehatan remaja.
                            <br>
                            <br>
                            Pojok toleransi diinisiasi setelah Kelurahan Senggarang diakui sebagai Kawasan Sadar Kerukunan oleh Kementrian Agama Provinsi Kepulauan Riau. Ini bertujuan mempertahankan nilai-nilai kerukunan di antara etnik dan agama yang beragam.
                            <br>
                            <br>
                            Pojok film, khusus untuk remaja, menjadi media pendidikan non formal mengenai literasi, edukasi anti-bullying, kesehatan mental, pemberdayaan perempuan, dan lingkungan melalui film-film.
                            <br>
                            <br>
                            Program pojok parenting direspon dari kebutuhan masyarakat dan orang tua. Diharapkan memberikan pengetahuan, keterampilan, dan dukungan sosial dalam mengasuh anak, dengan memfasilitasi diskusi dan berbagi pengalaman.
                            <br>
                            <br>
                            Kids corner adalah pusat pembelajaran untuk anak usia dini, membantu perkembangan mereka secara keseluruhan. Tujuannya adalah membina, menumbuhkan, dan mengembangkan potensi anak agar siap memasuki pendidikan selanjutnya.
                            <br>
                            <br>
                            Pojok kesehatan remaja menanggapi kebutuhan remaja akan literasi dan edukasi kesehatan. Maksudnya adalah memberikan akses mudah terkait kesehatan remaja, mengingat masa remaja dianggap rawan dan seringkali sulit mendapatkan akses ke layanan kesehatan.</p>
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