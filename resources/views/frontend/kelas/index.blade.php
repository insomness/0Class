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
            <div class="col-sm-6 col-lg-4 mb-2 ">
                <div class="single_special_cource">
                    <img src="{{asset('storage/' . $k->thumbnail)}}" class="special_img" height="225">
                    <div class="special_cource_text mt-n5">
                        <a href="{{route('kelas.show', Crypt::encryptString($k->id))}}">
                            <h3 class="text-capitalize">{{$k->nama_kelas}}</h3>
                        </a>
                        <h5 class="font-weight-light text-capitalize mt-2" >Jenis Kelas : {{$k->jenis_kelas}}</h5>

                        <div class="text-justify text-wrap">
                            {!!Str::limit($k->deskripsi, 100, ' ...')!!}
                        </div>
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
