<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening = Rekening::all();
        return view('admin.rekening.index', compact('rekening'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_rekening' => 'required|numeric',
            'atas_nama' => 'required'
        ]);

        Rekening::create([
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama
        ]);

        return redirect()->route('admin.rekening.index')->with('status', 'Rekening berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        return view('admin.rekening.edit', compact('rekening'));
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
        $request->validate([
            'nomor_rekening' => 'required|numeric',
            'atas_nama' => 'required'
        ]);

        Rekening::find($id)->update([
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama
        ]);

        return redirect()->route('admin.rekening.index')->with('status', 'Rekening berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        Rekening::destroy($rekening->id);

        return redirect()->route('admin.rekening.index')->with('status', 'Rekening berhasil dihapus!');
    }
}
