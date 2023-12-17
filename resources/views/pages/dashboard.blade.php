@extends('layouts.master')


@section("judul", "DASHBOARD ")
@section("warnadashboard", "bg-secondary")


@section('content')
    <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="card card-outline card-secondary">
               <div class="card-header text-center">
                  <h3 class="m-0 p-0 text-bold">
                     BUKUT TAMU
                  </h3>
               </div>

               <div class="card-body text-center">
                  <h2>{{ $bukutamu }}</h2>
               </div>
               <div class="card-footer">
                  <a href="{{ url('bukutamu', []) }}" class="btn btn-block btn-primary">
                     SELENGKAPNYA
                  </a>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card card-outline card-secondary">
               <div class="card-header text-center">
                  <h3 class="m-0 p-0 text-bold">
                     KOMENTAR
                  </h3>
               </div>

               <div class="card-body text-center">
                  <h2>{{ $komentar }}</h2>
               </div>
               <div class="card-footer">
                  <a href="{{ url('komentar', []) }}" class="btn btn-block btn-primary">
                     SELENGKAPNYA
                  </a>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card card-outline card-secondary">
               <div class="card-header text-center">
                  <h3 class="m-0 p-0 text-bold">
                     KONTEN POJOK
                  </h3>
               </div>

               <div class="card-body text-center">
                  <h2>{{ $sertifikat }}</h2>
               </div>
               <div class="card-footer">
                  <a href="{{ url('sertifikat', []) }}" class="btn btn-block btn-primary">
                     SELENGKAPNYA
                  </a>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card card-outline card-secondary">
               <div class="card-header text-center">
                  <h3 class="m-0 p-0 text-bold">
                     SERTIFIKAT
                  </h3>
               </div>

               <div class="card-body text-center">
                  <h2>{{ $konten }}</h2>
               </div>
               <div class="card-footer">
                  <a href="{{ url('pojok', []) }}" class="btn btn-block btn-primary">
                     SELENGKAPNYA
                  </a>
               </div>
            </div>
         </div>
      </div>
    </div>
@endsection

