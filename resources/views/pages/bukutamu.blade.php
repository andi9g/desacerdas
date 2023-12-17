@extends('layouts.master')


@section("judul", "Buku Tamu")
@section("warnabukutamu", "bg-secondary")


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title text-bold">TAMBAH TAMU</h3>
                    </div>
                    <form action="{{ route('bukutamu.store', []) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namapengunjung">Nama Pengunjung</label>
                                <input id="namapengunjung" class="form-control form-control-sm" type="text" name="namapengunjung">
                            </div>
                            
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="jk" id="laki-laki" value="L">
                                <label for="laki-laki">Laki-Laki</label>
                                &emsp;
                                <input type="radio" name="jk" id="perempuan" value="P">
                                <label for="perempuan">Perempuan</label>
                            </div>
    
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" class="form-control form-control-sm" name="alamat" rows="2"></textarea>
                            </div>
                            
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Tambah Pengunjung</button>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-lg text-bold">BUKU TAMU</h1>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5px">No</th>
                            <th>Nama Pengunjung</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Tanggal Berkunjung</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bukutamu as $item)
                            <tr>
                                <td>{{ $loop->iteration + $bukutamu->firstItem() - 1 }}</td>
                                <td>{{ $item->namapengunjung }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat("dddd, DD MMMM Y") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

