<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereIn('role', ['regular', 'premium'])->latest()->get();
        return view('admin.user.index', compact('users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin/user/detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ], $messages);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect('admin/user')->with('status', 'user berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/user')->with('status', 'user berhasil dihapus!');
    }

    public function editProfil()
    {
        return view('admin.user.edit_profil');
    }

    public function simpanEditProfil(Request $request)
    {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            ]);

            User::find(auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect('/admin')->with('status', 'Akun berhasil diperbarui');
    }

    public function UbahPassword()
    {
        return view('admin.user.ubah_password');
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

        return redirect('/admin')->with('status', 'Password berhasil diperbarui');
    }
}
