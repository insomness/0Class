@extends('layouts.front')
@section('title', 'Daftar kelas')
@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Daftar Kelas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource">
                    <img src="{{asset('frontTemplate')}}/img/special_cource_1.png" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="course-details.html" class="btn_4 px-5">Gratis</a>
                        <a href="{{route('kelas.detail')}}" class="btn_4 px-4" style="background-color: #f44a40;">Lihat</a>
                        <a href="course-details.html">
                            <h3>Web Development</h3>
                        </a>
                        <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
