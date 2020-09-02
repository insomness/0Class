@extends('layouts.front')
@section('title', 'Detail kelas')
@section('content')
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{asset('storage')}}/{{$kelas->thumbnail}}">
                </div>
                <div class="content_wrapper">
                    <h4 class="title_top">Tentang Kelas</h4>
                    <div class="content">
                        {!!$kelas->deskripsi!!}
                    </div>

                    <h4 class="title">Video Materi</h4>
                    <div class="content">
                        <ul class="course_list">
                            @forelse ($kelas->videos as $video)
                            <li class="justify-content-between align-items-center d-flex">
                                <p>{{$video->judul}}</p>
                            </li>
                            @empty
                                <li>Tidak ada video materi</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <div class="justify-content-between d-flex" style="cursor:default">
                                <p>Kelas</p>
                                <span class="color ml-3"> {{$kelas->nama_kelas}} </span>
                            </div>
                        </li>
                        <li>
                            <div class="justify-content-between d-flex" style="cursor:default">
                                <p>Jenis Kelas</p>
                                <span> {{$kelas->jenis_kelas}} </span>
                            </div>
                        </li>
                    </ul>
                    @switch($kelas->jenis_kelas)
                        @case('regular')
                            @guest
                                <a href="{{route('login')}}" class="btn_1 d-block">Eits.. Login dulu</a>
                            @else
                                @empty($kelas->videos->count())
                                    <p class="text-center title">Tidak ada video materi</p>
                                @else
                                    <a href="{{route('kelas.belajar', ['kelasId' => Crypt::encryptString($kelas->id), 'videoId' => Crypt::encryptString($kelas->videos[0]->id)])}}" class="btn_1 d-block">Belajar Sekarang</a>
                                @endempty
                            @endguest
                            @break
                        @case('premium')
                            @guest
                            <a href="{{route('login')}}" class="btn_1 d-block">Eits.. Login dulu</a>
                            @else
                                @unless (in_array(Auth::user()->role, ['premium', 'admin']))
                                    <h5 class="text-center">Silahkan upgrade akun anda</h5>
                                    @else
                                        @empty($kelas->videos->count())
                                            <p class="text-center title">Tidak ada video materi</p>
                                        @else
                                            <a href="{{route('kelas.belajar', ['kelasId' => Crypt::encryptString($kelas->id), 'videoId' => Crypt::encryptString($kelas->videos[0]->id)])}}" class="btn_1 d-block">Belajar Sekarang</a>
                                        @endempty
                                @endunless
                            @endguest
                            @break
                        @default
                        @empty($kelas->videos->count())
                            <p class="text-center title">Tidak ada video materi</p>
                        @else
                            <a href="{{route('kelas.belajar', ['kelasId' => Crypt::encryptString($kelas->id), 'videoId' => Crypt::encryptString($kelas->videos[0]->id)])}}" class="btn_1 d-block">Belajar Sekarang</a>
                        @endempty
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
