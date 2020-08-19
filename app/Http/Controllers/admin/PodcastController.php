<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Podcast;
use Illuminate\Http\Request;


class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::latest()->get();
        return view('admin.podcast.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.podcast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validate = $request->validate([
            'judul' => 'required',
            'embed' => 'required',
            'deskripsi' => 'required',
        ]);

        $podcast = Podcast::create([
            'judul' => $request->judul,
            'embed' => $request->embed,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/podcast')->with('status', 'Podcast berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        return view('admin.podcast.show', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        return view('admin.podcast.edit', compact('podcast'));
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
        $validate = $request->validate([
            'judul' => 'required',
            'embed' => 'required',
            'deskripsi' => 'required',
        ]);

        $podcast = Podcast::find($id)->update([
            'judul' => $request->judul,
            'embed' => $request->embed,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/podcast')->with('status', 'Podcast berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Podcast::destroy($id);
        return redirect('/admin/podcast')->with('status', 'Podcast berhasil dihapus!');
    }
}
