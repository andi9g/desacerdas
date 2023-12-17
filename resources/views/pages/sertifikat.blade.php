@extends('layouts.master')


@section("judul", "E-SERTIFIKAT")
@section("warnasertifikat", "bg-secondary")

@section('style')
    <style>
        #imgView{  
            padding:10px;
            width: 75% !important;
            text-align: center;
        }
        .loadAnimate{
            animation:setAnimate ease 2.5s infinite;
        }
        @keyframes setAnimate{
            0%  {color: #000;}     
            50% {color: transparent;}
            99% {color: transparent;}
            100%{color: #000;}
        }
        .custom-file-label{
            cursor:pointer;
        }
    </style>
@endsection

@section('content')
<div id="tambahsertifikat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Sertifikat Peserta</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="imgWrap" class="text-center">
                <center>
                    <img src="{{ url('gambar', ['noimage.jpg']) }}" width="70%" id="imgView" class="card-img-top img-fluid">
                </center>
            </div>
            <form action="{{ route('sertifikat.store', []) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="nomor">Masukan Gambar</label>
                    <div class="custom-file mb-3" width="75%">
                        <input type="file" id="inputFile" name="file" class="imgFile custom-file-input py-1"  aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor Sertifikat</label>
                        <input id="nomor" class="form-control" placeholder="nomor sertifikat" type="text" name="nomor">
                    </div>
                    <div class="form-group">
                        <label for="namapeserta">Nama Peserta</label>
                        <input id="namapeserta" class="form-control" type="text" name="namapeserta" placeholder="nama peserta">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan Sertifikat
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ url()->current() }}">
                        <div class="input-group">
                            <input class="form-control" type="text" name="keyword" placeholder="keyword" aria-label="keyword" value="{{ $keyword }}" aria-describedby="keyword">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="keyword">
                                    <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-8 text-right">
                    <button class="btn btn-primary text-uppercase text-bold" type="button" data-toggle="modal" data-target="#tambahsertifikat">Input Nama Partisipan</button>
                </div>
            </div>
        </div>
        
    </div>
    <div class="card">
        <div class="card-header bg-info">
            {{ $sertifikat->links("vendor.pagination.bootstrap-4") }}
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Pesera</th>
                        <th colspan="2">E-Sertifikat</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sertifikat as $item)
                        <tr>
                            <td>{{ $loop->iteration + $sertifikat->firstItem() - 1 }}</td>
                            <td class="text-bold">{{ ucwords($item->namapeserta) }}</td>
                            <td width="150px" style="border-right: 0px !important">
                                <img src="{{ url('/gambar/sertifikat', [$item->file]) }}" width="100%" type="button" data-toggle="modal" data-target="#tampilsertifikat{{ $item->idsertifikat }}">
                                
                            </td>
                            <td style="border-left: 0px">
                                <button class="badge badge-info badge-btn border-0 py-2" type="button" data-toggle="modal" data-target="#editsertifikat{{ $item->idsertifikat }}">
                                    <i class="fa fa-edit"></i>Edit
                                </button>

                                <form action='{{ route('sertifikat.destroy', [$item->idsertifikat]) }}' method='post'>
                                     @csrf
                                     @method('DELETE')
                                     <button type='submit' onclick="return confirm('Yakin ingin menghapus sertifikat')" class='badge badge-danger badge-btn border-0 py-2 mt-1'>
                                         <i class="fa fa-trash"></i> Hapus
                                     </button>
                                </form>
                            </td>
                        </tr>
                        <div id="tampilsertifikat{{ $item->idsertifikat }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="my-modal-title">Detail Gambar</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ url('/gambar/sertifikat', [$item->file]) }}" width="100%" type="button" data-toggle="modal" data-target="#tampilsertifikat{{ $item->idsertifikat }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="editsertifikat{{ $item->idsertifikat }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="my-modal-title">Edit Data Sertifikat</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="imgWrap" class="text-center">
                                        <center>
                                            <img src="{{ url('gambar/sertifikat', [$item->file]) }}" width="70%"  class="card-img-top img-fluid">
                                        </center>
                                    </div>
                                    <form action="{{ route('sertifikat.update', [$item->idsertifikat]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="modal-body">
                                            <label for="nomor">Ubah Gambar</label>
                                            <div class="custom-file mb-3" width="75%">
                                                <input type="file" name="file" class="imgFile  py-1">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor">Nomor Sertifikat</label>
                                                <input id="nomor" class="form-control" placeholder="nomor sertifikat" value="{{ $item->nomor }}" type="text" name="nomor">
                                            </div>
                                            <div class="form-group">
                                                <label for="namapeserta">Nama Peserta</label>
                                                <input id="namapeserta" class="form-control" type="text" name="namapeserta" placeholder="nama peserta" value="{{ $item->namapeserta }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save"></i> Update Sertifikat
                                            </button>
                                        </div>
                                    </form>
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


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $("#inputFile").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }
</script>


@endsection

