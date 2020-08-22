@extends('layouts.front')
@section('title', 'Podcast')
@section('content')
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg course_details_left">
                <div class="main_image">
                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{$podcast->embed}}"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="text-justify">
                <h4 class="title_top">{{$podcast->judul}}</h4>
                <div class="content">
                    {!!$podcast->deskripsi!!}
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
