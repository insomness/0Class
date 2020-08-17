<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg'
        ], $messages);

        $path = $request->file('thumbnail')->store('thumbnail_blog', 'public');

        $blog = Blog::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'thumbnail' => $path
        ]);

        return redirect()->route('admin.blog.show', $blog->id)->with('status', "Artikel berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'mimes' => ':attribute hanya mendukung jpeg, jpg, dan png,',
        ];

        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg'
        ], $messages);

        // jika ganti thumbnail
        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('thumbnail_blog', 'public');
            Storage::delete('public/'.$blog->thumbnail);
        } else{
            $path = $blog->thumbnail;
        }

        Blog::find($blog->id)->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'thumbnail' => $path
        ]);

        return redirect('/admin/blog')->with('status', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::delete('public'.$blog->thumbnail);
        Blog::destroy($blog->id);
        return redirect('/admin/blog')->with('status', 'Artikel berhasil dihapus!');
    }
}
