@extends('layouts.master')


@section("judul", "POJOK")
@section("warnapojok", "bg-secondary")


@section('content')
<div id="tambahpojok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Pojok</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pojok.store', []) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namapojok">Nama Pojok</label>
                        <input id="namapojok" class="form-control" type="text" name="namapojok">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahpojok">Tambah Pojok</button>
        </div>

        
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    @foreach ($pojok as $item)
                    <div class="col-lg-6 col-6">
    
                        <div class="small-box bg-info ">
                            <div class="inner py-4 text-center">
                                <h3 class="text-uppercase">{{ $item->namapojok }}</h3>

                                <button class="badge border-0 badge-btn badge-warning" type="button" data-toggle="modal" data-target="#edit{{ $item->idpojok }}">
                                    <i class="fa fa-edit"></i> 
                                </button>

                                <form action='{{ route('pojok.destroy', [$item->idpojok]) }}' method='post' class='d-inline'>
                                     @csrf
                                     @method('DELETE')
                                     <button type='submit' onclick="return confirm('hapus data pojok?')" class='badge badge-danger badge-btn border-0'>
                                         <i class="fa fa-trash"></i>
                                     </button>
                                </form>


                            </div>
                            <a href="{{ route('pojok.konten', [$item->idpojok]) }}" class="small-box-footer">KELOLA KONTEN
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                        

                    <div id="edit{{ $item->idpojok }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="my-modal-title">Edit Pojok</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('pojok.update', [$item->idpojok]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namapojok">Nama Pojok</label>
                                            <input id="namapojok" class="form-control" type="text" name="namapojok" value="{{ $item->namapojok }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">
                                            Edit Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
    
                    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



