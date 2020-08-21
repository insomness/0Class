<?php

namespace App\Http\Controllers\frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\Setting;
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
        $setting = Setting::first();
        return view('frontend.about', compact('setting'));
    }
}
