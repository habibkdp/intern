@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <form action="/province/edit/{{ $province->id }}" method="POST">
        @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('provinceName') is-invalid @enderror" placeholder="Province name" name="provinceName" value="{{ $province->name }}" autofocus autocomplete="off">
                @error('provinceName')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <select class="form-select" name="countryId" required>
                <option value="" selected>Pilih negara Asal</option>
                @foreach ($country as $item)
                    <option value="{{ $item->id }}"  {{ ($province->country->id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-outline-success me-3 mt-2">Update</button>
            <a href="{{ route('provinceHome') }}" class="btn btn-outline-danger mt-2">Batal</a>
        </form>
        </div>
    </div>
</div>
@endsection