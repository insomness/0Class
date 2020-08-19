@extends('layouts.front')
@section('title', 'Kelas kita')
@section('content')
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-9 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{asset('storage/'.$blog->thumbnail)}}">
                </div>
                <div class="blog_details">
                   <h1>
                       {{$blog->judul}}
                   </h1>
                   <hr>
                   {!!$blog->konten!!}
                </div>
             </div>
            </div>
        </div>
    </div>
    </section>
 <!--================Blog Area end =================-->
@endsection
