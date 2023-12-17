<?php

namespace App\Http\Controllers;

use App\Models\pojokM;
use App\Models\kontenM;
use Illuminate\Http\Request;

class pojokC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pojok = pojokM::paginate(15);
        return view("pages.pojok", [
            "pojok" => $pojok,
        ]);
    }

    public function konten(Request $request, $idpojok)
    {
        
        $konten = kontenM::orderBy("tanggal", "desc")
        ->where("idpojok", $idpojok)
        ->paginate(15);
        return view("pages.konten", [
            "konten" => $konten,
            "idpojok" => $idpojok,
        ]);
    }

    public function tambahkonten(Request $request)
    {
        try{
            $data = $request->all();

            if($request->hasFile("gambar")) {
                $file = $request->gambar;
                $extension = $file->getClientOriginalExtension(); 
                $size = $file->getSize();
                $ex = strtolower($extension);
                if ($ex == "png" || $ex == "jpg" || $ex == "jpeg") {
                    $data["gambar"] = strtotime(date("Y-m-d H:i:s")).uniqid().".".$extension;
                }
            }else {
                return redirect()->back()->with('error', 'Gambar tidak diinput');
            }

            kontenM::create($data);
            
            if($request->hasFile("gambar")) {
                $file->move(public_path("/gambar/konten"), $data["gambar"]);
            }
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }


    public function ubahkonten(Request $request,$idkonten)
    {
        try{
            $data = $request->all();

            $update = kontenM::where("idkonten", $idkonten)->first();

            if($request->hasFile("gambar")) {
                $file = $request->gambar;
                $extension = $file->getClientOriginalExtension(); 
                $size = $file->getSize();
                $ex = strtolower($extension);
                if ($ex == "png" || $ex == "jpg" || $ex == "jpeg") {
                    $data["gambar"] = strtotime(date("Y-m-d H:i:s")).uniqid().".".$extension;
                }
            }else {
                $data["gambar"] = $update->gambar;
            }

            $update->update($data);
            
            if($request->hasFile("gambar")) {
                $file->move(public_path("/gambar/konten"), $data["gambar"]);
            }
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
    public function hapuskonten(Request $request, $idkonten)
    {
        try{
            kontenM::destroy($idkonten);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
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
        try{
            $data = $request->all();
            pojokM::create($data);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
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
    public function update(Request $request, pojokM $pojokM, $idpojok)
    {
        try{
            $data = $request->all();
            pojokM::where("idpojok", $idpojok)->first()->update($data);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pojokM  $pojokM
     * @return \Illuminate\Http\Response
     */
    public function destroy(pojokM $pojokM, $idpojok)
    {
        try{
            pojokM::destroy($idpojok);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
