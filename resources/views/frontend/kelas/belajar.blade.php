@extends('layouts.front')
@section('title', 'Kelas Belajar')
@section('content')
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{$videoId->embed}}"></div>
                </div>
                <div class="content_wrapper">
                    <h4 class="title_top">{{$videoId->judul}}</h4>
                </div>
            </div>

            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <h4 class="title mt-n5">Materi Kelas</h4>
                    <div class="content">
                        <ul class="course_list">
                            @forelse ($kelasId->videos as $video)
                            <li class="justify-content-between align-items-center d-flex">
                                <a href="" class="{{$video->id == Crypt::decryptString(Request::segment(3)) ? 'btn_4' : ''}} btn-block">{{$video->judul}}</a>
                            </li>
                            @empty
                                <li>Tidak ada video materi</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>
<script>
    const player = new Plyr('#player', {
        captions: { active: true, language: 'auto', update: false },
        settings: ['captions', 'quality', 'speed', 'loop'],
        ratio: '16:9',
        quality: { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] },
    });
</script>
@endpush
@push('link')
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
@endpush
