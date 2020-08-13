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
            @forelse ($kelas as $k)
            <div class="col-sm-6 col-lg-4 mb-2">
                <div class="single_special_cource">
                    <img src="{{asset('storage/' . $k->thumbnail)}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="#" class="btn_4 px-5">{{$k->jenis_kelas}}</a>
                        <a href="{{route('kelas.show', $k->id)}}" class="btn_4 px-4" style="background-color: #f44a40;">Lihat</a>
                        <a href="{{route('kelas.show', $k->id)}}">
                            <h3>{{$k->nama_kelas}}</h3>
                        </a>
                        <p>{!!$k->deskripsi!!}</p>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-sm-6 col-lg-4">
                    <h4>Tidak Ada Kelas</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
