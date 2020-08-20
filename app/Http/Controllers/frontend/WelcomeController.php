<?php

namespace App\Http\Controllers\frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('frontend.welcome', compact(['kelas', 'blogs']));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
