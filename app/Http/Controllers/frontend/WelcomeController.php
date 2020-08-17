<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all()->take(3);
        return view('frontend.welcome', compact('kelas'));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
