<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Podcast;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where(['status' => 0])->get();
        $users = User::all();
        $podcasts = Podcast::all();
        $kelas = Kelas::all();
        return view('admin.dashboard', compact(['transaksi', 'users', 'podcasts', 'kelas']));
    }
}
