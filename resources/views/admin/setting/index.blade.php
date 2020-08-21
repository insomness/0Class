@extends('admin.layouts.master')
@section('title')
    Settings
@show
@section('content')
<div class="row">
    <div class="col-md">
        @include('admin.layouts.message')
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-primary">
                Settings
            </h4>
            <div class="row mt-3 mb-n5">
                <div class="col-md d-flex justify-content-end mr-3">
                    <a href="{{route('admin.rekening.index')}}" class="btn btn-primary">Cek Rekening</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.setting.simpan')}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group py-3 mt-3">
                        <label for="harga">Harga Upgrade Premium</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{old('harga', $setting->harga)}}">

                        @error('harga')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="rekening">Rekening</label>
                        <select class="form-control @error('rekening_id') is-invalid @enderror" id="rekening" required name="rekening_id">
                            <option value="" disabled selected>Pilih..</option>
                            @forelse ($rekening as $r)
                            <option value="{{$r->id}}" {{$setting->rekening_id == $r->id ? 'selected' : ''}}>
                                {{$r->nomor_rekening}} - {{$r->atas_nama}}
                            </option>
                            @empty
                            <option disabled>Mohon isi nomor rekening pada tombol cek rekening</option>
                            @endforelse
                        </select>

                        @error('rekening_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group py-3 mt-3">
                        <label for="editor">About</label>
                        <textarea name="about" id="ckeditor">
                            {!!$setting->about!!}
                        </textarea>
                        @error('about')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-block">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    CKEDITOR.replace( 'ckeditor', {
        removePlugins: ['easyimage', 'image']
    });
</script>
@endpush
