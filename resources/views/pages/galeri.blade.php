@extends('layouts.master')


@section("judul", "GALERI")
@section("warnagaleri", "bg-secondary")


@section('content')

<div id="tambahgaleri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Galeri</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('galeri.store', []) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Masukan Gambar Galeri</label>
                        <input id="file" class="form-control" type="file" name="file">
                    </div>
    
                    <div class="form-group">
                        <label for="judu;">Judul</label>
                        <input id="judu;" class="form-control" type="text" name="judul">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahgaleri">Tambah Galeri</button>
        </div>

        <div class="card-body">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Judul</th>
                        <th>gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <img src="{{ url('gambar/galeri', [$item->file]) }}" width="70px" alt="">
                            </td>
                            <td>
                                <form action='{{ route('galeri.destroy', [$item->idgaleri]) }}' method='post' class='d-inline'>
                                     @csrf
                                     @method('DELETE')
                                     <button type='submit' class='btn btn-danger border-0'>
                                         <i class="fa fa-trash"></i> Hapus
                                     </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection



