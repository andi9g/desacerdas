<?php

namespace App\Http\Controllers;

use App\Models\komentarM;
use Illuminate\Http\Request;

class komentarC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $komentar = komentarM::orderBy("created_at", "desc")->paginate(20);


        return view("pages.komentar", [
            "komentar" => $komentar,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\komentarM  $komentarM
     * @return \Illuminate\Http\Response
     */
    public function show(komentarM $komentarM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\komentarM  $komentarM
     * @return \Illuminate\Http\Response
     */
    public function edit(komentarM $komentarM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\komentarM  $komentarM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, komentarM $komentarM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\komentarM  $komentarM
     * @return \Illuminate\Http\Response
     */
    public function destroy(komentarM $komentarM)
    {
        //
    }
}
