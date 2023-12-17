<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komentarM;
use App\Models\kontenM;
use App\Models\sertifikatM;
use App\Models\pengunjungM as bukutamuM;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $komentar = komentarM::count();
        $konten = kontenM::count();
        $sertifikat = sertifikatM::count();
        $bukutamu = bukutamuM::count();

        return view('pages.dashboard', [
            "komentar" => $komentar,
            "konten" => $konten,
            "sertifikat" => $sertifikat,
            "bukutamu" => $bukutamu,
        ]);
    }
}
