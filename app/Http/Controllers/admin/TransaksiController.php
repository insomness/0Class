<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('admin.transaksi.index', compact('transaksi'));
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
    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validation = $request->validate([
            'status' => 'required|in:0,1,2'
        ]);
        $transaksi = Transaksi::find($id);

        $transaksi->update(['status' => $request->status]);
        if($request->status == 1){
            User::where('id', $transaksi->user->id)->update(['role' => 'premium']);
        }else{
            User::where('id', $transaksi->user->id)->update(['role' => 'regular']);
        }

        return redirect('admin/transaksi/'.$id)->with('status', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pending()
    {
        $transaksi = Transaksi::where(['status' => 0])->latest()->get();
        return view('admin.transaksi.pending', compact('transaksi'));
    }

    public function disetujui()
    {
        $transaksi = Transaksi::where(['status' => 1])->latest()->get();
        return view('admin.transaksi.disetujui', compact('transaksi'));
    }

    public function ditolak()
    {
        $transaksi = Transaksi::where(['status' => 2])->latest()->get();
        return view('admin.transaksi.ditolak', compact('transaksi'));
    }
}
