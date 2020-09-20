@extends('layouts.front')
@section('title', 'Akun')
@section('content')
<section class="special_cource padding_top mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="section_tittle text-center">
                    <h2>Tentang Kami</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5 pb-5">
                        {!!$setting->about!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
