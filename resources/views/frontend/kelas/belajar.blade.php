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
                            <a class="justify-content-between d-flex" href="#">
                                <p>Kelas</p>
                                <span class="color"> {{$kelas->nama_kelas}} </span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Jenis Kelas</p>
                                <span> {{$kelas->jenis_kelas}} </span>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="btn_1 d-block">Belajar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
