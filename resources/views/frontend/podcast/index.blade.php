@extends('layouts.front')
@section('title', 'Daftar podcasts')
@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Daftar podcasts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($podcasts as $podcast)
            <div class="col-sm-6 col-lg-4 mb-2 ">
                <div class="single_special_cource">
                    <img src="https://img.youtube.com/vi/{{$podcast->embed}}/0.jpg" class="special_img">
                    <div class="special_cource_text">
                        <div class="btn_4 px-5">Podcast</div>
                        <a href="{{route('podcast.show',  $podcast->id)}}" class="btn_4 px-4" style="background-color: #f44a40;">Lihat</a>
                        <a href="{{route('podcast.show', $podcast->id)}}">
                            <h3 class="text-capitalize text-truncate">{{$podcast->judul}}</h3>
                        </a>
                        <div class="text-justify text-truncate" style="height: 50px">
                            {!!$podcast->deskripsi!!}
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-sm-6 col-lg-4">
                    <h4>Tidak Ada podcasts</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
