@extends('layouts.master')


@section("judul", "POJOK")
@section("warnapojok", "bg-secondary")


@section('content')
<div id="tambahkonten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Konten</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambah.konten', []) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="number" value="{{ $idpojok }}" hidden name="idpojok">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input id="judul" class="form-control" type="text" name="judul">
                    </div>
    
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input id="tanggal" class="form-control" type="date" name="tanggal">
                    </div>
    
                    <div class="form-group">
                        <label for="isi">Deskripsi</label>
                        <textarea id="isi" class="form-control" name="isi" rows="3"></textarea>
                    </div>
    
                    <div class="custom-file">
                        <label for="gambar">Gambar Konten</label>
                        <input id="gambar" class="form-control" type="file" name="gambar">
                    </div>
    
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Konten</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <a href="{{ url('pojok', []) }}" class="btn btn-secondary rounded-0 mb-0 pb-0">Halaman Sebelumnya</a>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahkonten">Tambah Konten Pojok</button>
        </div>


        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>detail</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($konten as $item)
                        <tr>
                            <td>{{ $loop->iteration + $konten->firstItem() - 1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <button class="badge badge-btn border-0 badge-info" type="button" data-toggle="modal" data-target="#infodetail{{ $item->idkonten }}">
                                    <i class="fa fa-eye"></i> Detail
                                </button>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat("dddd, DD MMMM Y") }}
                            </td>
                            <td>
                                <button class="badge badge-btn border-0 badge-success d-inline" type="button" data-toggle="modal" data-target="#edit{{ $item->idkonten }}">
                                    <i class="fa fa-edit"></i> edit
                                </button>

                                <form action='{{ route('hapus.konten', [$item->idkonten]) }}' method='post' class='d-inline'>
                                     @csrf
                                     @method('DELETE')
                                     <button type='submit' onclick="return confirm('Yakin ingin dihapus?')" class='badge badge-danger badge-btn border-0'>
                                         <i class="fa fa-trash"></i>
                                     </button>
                                </form>
                            </td>
                        </tr>

                        <div id="edit{{ $item->idkonten }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="my-modal-title">Edit Data</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('ubah.konten', [$item->idkonten]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <input type="number" value="{{ $idpojok }}" hidden name="idpojok">
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input id="judul" class="form-control" type="text" name="judul" value="{{ $item->judul }}">
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input id="tanggal" class="form-control" type="date" name="tanggal" value="{{ $item->tanggal }}">
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="isi">Deskripsi</label>
                                                <textarea id="isi" class="form-control" name="isi" rows="3">{{ $item->isi }}</textarea>
                                            </div>
                            
                                            <div class="custom-file">
                                                <label for="gambar">Gambar Konten</label>
                                                <input id="gambar" class="form-control" type="file" name="gambar">
                                            </div>
                            
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Ubah Konten</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="infodetail{{ $item->idkonten }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="my-modal-title">Detail Konten</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="{{ url('/gambar/konten', [$item->gambar]) }}" width="80%" alt="">
                                            <br>

                                            <p>{{ $item->isi }}</p>
                                        </center>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



