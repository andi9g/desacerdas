<?php

namespace App\Http\Controllers;

use App\Models\pengunjungM;
// use App\Models\bukutamuM;
use Illuminate\Http\Request;

class bukutamuC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bukutamu = pengunjungM::orderBy("idpengunjung", "desc")->paginate(15);
        
        return view("pages.bukutamu", [
            "bukutamu" => $bukutamu,
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
            pengunjungM::create($data);

            return redirect()->back()->with('success', 'Data Tamu Berhasil Ditambahkan');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengunjungM  $pengunjungM
     * @return \Illuminate\Http\Response
     */
    public function show(pengunjungM $pengunjungM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengunjungM  $pengunjungM
     * @return \Illuminate\Http\Response
     */
    public function edit(pengunjungM $pengunjungM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengunjungM  $pengunjungM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengunjungM $pengunjungM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengunjungM  $pengunjungM
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengunjungM $pengunjungM)
    {
        //
    }
}
