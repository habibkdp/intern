@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <form action="{{ route('provinceStore') }}" method="POST">
        @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('provinceName') is-invalid @enderror" placeholder="Province name" name="provinceName" value="{{ old('provinceName') }}" autofocus autocomplete="off">
                @error('provinceName')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <select class="form-select" name="countryId" required>
                @if ($country->count())
                    @foreach ($country as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @else
                    <option>Tidak ditemukan data negara !</option>                    
                @endif
            </select>

            <button type="submit" class="btn btn-outline-success me-3 mt-2">Tambah</button>
            <a href="{{ route('provinceHome') }}" class="btn btn-outline-danger mt-2">Batal</a>
        </form>
        </div>
    </div>
</div>
@endsection