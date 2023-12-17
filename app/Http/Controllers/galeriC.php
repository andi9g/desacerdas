<?php

namespace App\Http\Controllers;

use App\Models\galeriM;
use Illuminate\Http\Request;

class galeriC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galeri = galeriM::get();

        return view("pages.galeri", [
            "galeri" => $galeri,
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
        try{
            $data = $request->all();

            if($request->hasFile("file")) {
                $file = $request->file;
                $extensi = $file->getClientOriginalExtension();
                $ex = strtolower($extensi);

                if($ex == "jpg" || $ex == "jpeg" || $ex == "png") {
                    $data['file'] = strtotime(date("Y-m-d H:i:s")).uniqid().".".$extensi;

                    $file->move(public_path("gambar/galeri"), $data['file']);

                    galeriM::create($data);

                    return redirect()->back()->with('success', 'Success');

                }

            }


            galeriM::create($data);

            return redirect()->back()->with('success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\galeriM  $galeriM
     * @return \Illuminate\Http\Response
     */
    public function show(galeriM $galeriM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galeriM  $galeriM
     * @return \Illuminate\Http\Response
     */
    public function edit(galeriM $galeriM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\galeriM  $galeriM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galeriM $galeriM, $idgaleri)
    {
        try{
            $data = $request->all();

            galeriM::where("idgaleri", $idgaleri)->first()->update($data);

            return redirect()->back()->with('success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galeriM  $galeriM
     * @return \Illuminate\Http\Response
     */
    public function destroy(galeriM $galeriM, $idgaleri)
    {
        try{
            galeriM::destroy($idgaleri);

            return redirect()->back()->with('success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
