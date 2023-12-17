<?php

namespace App\Http\Controllers;

use App\Models\pojokM;
use App\Models\kontenM;
use App\Models\sertifikatM;
use App\Models\komentarM;
use Illuminate\Http\Request;

class umumC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pojok = pojokM::get();
        // dd($pojok);
        return view("pages.umum.home", [
            "pojok" => $pojok,
        ]);
    }
    public function sertifikat(Request $request)
    {

        try{
            $keyword = empty($request->keyword)?'':$request->keyword;
            $sertifikat = sertifikatM::where("namapeserta", $keyword)->get();
    
            return view("pages.umum.sertifikat", [
                "sertifikat" => $sertifikat,
                "keyword" => $keyword,
            ]);
        
        }catch(\Throwable $th){
            return redirect("/")->with('error', 'Terjadi kesalahan');
        }
    }

    public function download(Request $request, $idsertifikat)
    {
        try{
            $data = sertifikatM::where("idsertifikat", $idsertifikat)
            ->first();
            $link = public_path("gambar/sertifikat/$data->file");

            return response()->download($link);

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    public function baca(Request $request, $idpojok)
    {
        try{
            $konten = kontenM::where("idpojok", $idpojok)
            ->orderBy("tanggal", "desc")
            ->get();
            $pojok = pojokM::where("idpojok", $idpojok)->first();
            return view("pages.umum.baca", [
                "konten" => $konten,
                "pojok" => $pojok,
            ]);
        }catch(\Throwable $th){
            return redirect("/")->with('error', 'Terjadi kesalahan');
        }
       
    }

    public function profil()
    {
        try{
            $pojok = pojokM::get();
            // dd($pojok);
            return view("pages.umum.profil", [
                "pojok" => $pojok,
            ]);
    
        }catch(\Throwable $th){
            return redirect("/")->with('error', 'Terjadi kesalahan');
        }
    }

    public function komentar(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "komentar" => "required",
        ]);
        try{
            $data = $request->all();
            komentarM::create($data);

            return redirect()->back()->with('success', 'Pesan berhasil dikirim');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pojokM  $pojokM
     * @return \Illuminate\Http\Response
     */
    public function show(pojokM $pojokM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pojokM  $pojokM
     * @return \Illuminate\Http\Response
     */
    public function edit(pojokM $pojokM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pojokM  $pojokM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pojokM $pojokM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pojokM  $pojokM
     * @return \Illuminate\Http\Response
     */
    public function destroy(pojokM $pojokM)
    {
        //
    }
}
