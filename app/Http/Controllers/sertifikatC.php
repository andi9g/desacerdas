<?php

namespace App\Http\Controllers;

use App\Models\sertifikatM;
use Illuminate\Http\Request;

class sertifikatC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;
        
        $sertifikat = sertifikatM::where("namapeserta", "like", "%$keyword%")
        ->orWhere("nomor", "like", "$keyword%")
        ->orderBy("idsertifikat", "desc")
        ->paginate(15);

        $sertifikat->appends($request->only(["limit", "keyword"]));

        return view("pages.sertifikat", [
            "sertifikat" => $sertifikat,
            "keyword" => $keyword,
        ]);


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
        $request->validate([
            "nomor" => 'required',
            "namapeserta" => 'required',
            "file" => 'required',
        ]);

        try{
            $data = $request->all();
            
            if($request->hasFile("file")) {
                $file = $request->file;
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $ex = strtolower($extension);
                $size = $file->getSize();

                if($size < 3000000) {
                    if($ex == "png" || $ex == "jpg" || $ex == "jpeg") {
                        $data["file"] = strtotime(date("Y-m-d H:i:s")).uniqid().".".$extension;
                        
                    }else {
                        return redirect()->back()->with("warning", "Harap memasukan file gambar dengan benar")->withInput();
                    }
                }else {
                    return redirect()->back()->with("warning", "Ukuran tidak boleh di atas 3Mb")->withInput();
                }


                sertifikatM::create($data);
                $file->move(base_path("public/gambar/sertifikat"), $data["file"]);

                return redirect()->back()->with("success", "Sertifikat berhasil ditambahkan")->withInput();
                
            }else {
                return redirect()->back()->with("warning", "Harap memasukan file gambar dengan benar")->withInput();
            }

            
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sertifikatM  $sertifikatM
     * @return \Illuminate\Http\Response
     */
    public function show(sertifikatM $sertifikatM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sertifikatM  $sertifikatM
     * @return \Illuminate\Http\Response
     */
    public function edit(sertifikatM $sertifikatM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sertifikatM  $sertifikatM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sertifikatM $sertifikatM, $idsertifikat)
    {
        $request->validate([
            "nomor" => 'required',
            "namapeserta" => 'required',
        ]);

        try{
            $data = $request->all();
            $update = sertifikatM::where("idsertifikat", $idsertifikat)->first();
            
            if($request->hasFile("file")) {
                $file = $request->file;
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $ex = strtolower($extension);
                $size = $file->getSize();

                if($size < 3000000) {
                    if($ex == "png" || $ex == "jpg" || $ex == "jpeg") {
                        $data["file"] = strtotime(date("Y-m-d H:i:s")).uniqid().".".$extension;
                        
                    }else {
                        return redirect()->back()->with("warning", "Harap memasukan file gambar dengan benar")->withInput();
                    }
                }else {
                    return redirect()->back()->with("warning", "Ukuran tidak boleh di atas 3Mb")->withInput();
                }  
            }else {
                $data["file"] = $update->file;
            }



            $update->update($data);

            if($request->hasFile("file")) {
                $file->move(base_path("public/gambar/sertifikat"), $data["file"]);
            }

            return redirect()->back()->with("success", "Sertifikat berhasil diUbah")->withInput();

            
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sertifikatM  $sertifikatM
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertifikatM $sertifikatM, $idsertifikat)
    {
        try{
            sertifikatM::destroy($idsertifikat);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
