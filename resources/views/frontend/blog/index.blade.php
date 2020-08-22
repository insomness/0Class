@extends('layouts.front')
@section('title', config('app.name'))
@section('content')
<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-6">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{asset('storage/'.$blog->thumbnail)}}" alt="">
                            <div class="blog_item_date">
                                <h3>{{$blog->created_at->day}}</h3>
                                <p>{{$blog->created_at->shortEnglishMonth}}</p>
                            </div>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('blog.show', $blog->id)}}">
                                <h2>{{$blog->judul}}</h2>
                            </a>
                            <div class="text-wrap text-truncate" style="height: 75px">
                                {!! $blog->konten !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">{{$blogs->links()}}</div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
