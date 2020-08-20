@extends('layouts.front')
@section('title', 'Upgrade Premium')
@section('content')
<section class="special_cource padding_top mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="section_tittle text-center">
                    <h2>Upgrade Premium</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $cek = auth()->user()->transaksi;
                        @endphp

                        @if ($cek->count() > 0 && $cek->first()->status == 0 && Auth::user()->role == 'regular')
                            <h4>Bukti transfer sudah terkirim, mohon tunggu beberapa saat hingga admin mengkonfirmasi pembayaran anda</h4>
                        @endif

                        @if ($cek->count() > 0 && $cek->first()->status == 1)
                            <h3 class="text-center text-capitalize">Selamat Akun Anda Sudah Premium, sekarang anda dapat belajar tanpa batas</h3>
                        @endif

                        @if ($cek->count() < 1 && Auth::user()->role == 'regular')
                            <h4>Silahkan transfer sebesar Rp.150.000 ke nomor rekening dibawah ini</h4>
                            <ul>
                                <li> - 456789802 Atas Nama <b>Fitrah Maulana</b></li>
                            </ul>
                            <form method="POST" action="{{route('kirim_bukti_transfer')}}" class="mt-4" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="bukti_transfer">Kirim Bukti Transfer</label>
                                    <input type="file" class="form-control-file @error('bukti_transfer') is-invalid @enderror" id="bukti_transfer" name="bukti_transfer">
                                    @error('bukti_transfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img id="image" class="mb-3 img-fluid" width="300px" height="300px">
                                <button type="submit" class="btn_4 py-2 float-right">Kirim</button>
                            </form>
                        @endif

                        @if ($cek->count() > 0 && $cek->first()->status == 2 && Auth::user()->role == 'regular')
                            <h4>Pembayaran anda ditolak, mohon kirim ulang bukti dengan benar dan jelas</h4>
                            <form method="POST" action="{{route('kirim_ulang_bukti_transfer')}}" class="mt-4" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="bukti_transfer">Kirim Bukti Transfer</label>
                                    <input type="file" class="form-control-file @error('bukti_transfer') is-invalid @enderror" id="bukti_transfer" name="bukti_transfer">
                                    @error('bukti_transfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img id="image" class="mb-3 img-fluid" width="300px" height="300px">
                                <button type="submit" class="btn_4 py-2 float-right">Kirim</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    document.getElementById("bukti_transfer").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
@endpush
