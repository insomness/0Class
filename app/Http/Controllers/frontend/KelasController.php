<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('frontend.kelas.index', compact('kelas'));
    }

    public function show($kelas)
    {
        $dec_id = Crypt::decryptString($kelas);
        $kelas = Kelas::find($dec_id);
        return view('frontend.kelas.show', compact('kelas'));
    }

    public function belajar($kelasId, $videoId)
    {
        $dec_kelasId = Crypt::decryptString($kelasId);
        $dec_videoId = Crypt::decryptString($videoId);

        $kelas = Kelas::find($dec_kelasId);
        $video = Video::find($dec_videoId);

        return view('frontend.kelas.belajar', compact(['kelas', 'video']));
    }
}
