<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Video;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('frontend.kelas.index', compact('kelas'));
    }

    public function show(Kelas $kelas)
    {
        return view('frontend.kelas.show', compact('kelas'));
    }

    public function belajar(Kelas $kelasId, Video $videoId)
    {
        return view('frontend.kelas.belajar', compact(['kelasId', 'videoId']));
    }
}
