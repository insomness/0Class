<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('frontend.kelas.index', compact('kelas'));
    }
}
