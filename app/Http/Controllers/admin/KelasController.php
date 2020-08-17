<?php

namespace App\Http\Controllers\admin;

use App\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => ':attribute hanya mendukung jpeg, jpg, dan png,',
        ];

        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg'
        ], $messages);

        $path = $request->file('thumbnail')->store('thumbnail_kelas', 'public');

        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'jenis_kelas' => $request->jenis_kelas,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $path
        ]);

        return redirect()->route('admin.kelas.show', $kelas->id)->with('status', "Kelas berhasil ditambahkan! Silahkan tambahkan materi kelas!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        $detailKelas = Kelas::find($kelas);
        return view('admin.kelas.show', compact('detailKelas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => ':attribute hanya mendukung jpeg, jpg, dan png,',
        ];

        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg'
        ], $messages);

        // jika ganti thumbnail
        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('thumbnail_kelas', 'public');
            Storage::delete('public/'.$kelas->thumbnail);
        } else{
            $path = $kelas->thumbnail;
        }

        Kelas::find($kelas->id)->update([
            'nama_kelas' => $request->nama_kelas,
            'jenis_kelas' => $request->jenis_kelas,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $path
        ]);

        return redirect('/admin/kelas')->with('status', 'Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Storage::delete('public/'.$kelas->thumbnail);
        $kelas->videos()->delete();
        Kelas::find($kelas->id)->delete();
        return redirect('admin/kelas')->with('status', 'Kelas berhasil dihapus!');
    }

    public function tambahVideo($kelasId)
    {
        return view('admin.kelas.tambahVideo', compact('kelasId'));
    }

    public function simpanVideo(Request $request, $kelasId)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!'
        ];

        $request->validate([
            'judul' => 'required',
            'embed' => 'required',
        ], $messages);

        Video::create([
            'judul' => $request->judul,
            'embed' => $request->embed,
            'kelas_id' => $kelasId,
        ]);

        return redirect('/admin/kelas/' . $kelasId)->with('status', 'Materi berhasil ditambahkan');
    }

    public function hapusVideo($kelasId, $videoId)
    {
        $video = Video::find($videoId);
        $video->delete();
        return redirect('admin/kelas/' . $kelasId)->with('status', 'Materi berhasil dihapus!');
    }
}
