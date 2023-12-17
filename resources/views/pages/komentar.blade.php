@extends('layouts.master')


@section("judul", "KOMENTAR ")
@section("warnakomentar", "bg-secondary")


@section('content')
    <div class="container">
      <div class="card">
         <div class="card-body">
            <table class="table table-sm table-hover table-striped table-bordered" >
               <thead class="bg-info">
                  <tr>
                     <th style="width: fit-content">tanggal</th>
                     <th>Nama</th>
                     <th>Pesan</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($komentar as $item)
                     <tr>
                        <td width="5px" nowrap>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat("dddd, DD MMMM Y") }}</td>
                        <td width="10px" nowrap class="text-bold">{{ ucwords(strtolower($item->nama)) }}</td>
                        <td>{{ $item->komentar }}</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

         </div>
         <div class="card-footer">
            {{ $komentar->links("vendor.pagination.bootstrap-4") }}
         </div>
      </div>
    </div>
@endsection

