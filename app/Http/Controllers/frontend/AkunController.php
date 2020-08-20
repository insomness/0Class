<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function detailAkun()
    {
        return view('frontend.akun.detail');
    }

    public function editAkun()
    {
        return view('frontend.akun.edit');
    }

    public function updateAkun(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
        ]);

        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect(route('akun.detail'))->with('status', 'Akun berhasil diperbarui');
    }

    public function ubahPassword()
    {
        return view('frontend.akun.ubah_password');
    }

    public function simpanUbahPassword(Request $request)
    {
        $request->validate([
            'oldPassword' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('akun.detail'))->with('status', 'Password berhasil diperbarui');
    }
}
