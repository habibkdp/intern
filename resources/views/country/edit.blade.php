@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <form action="/country/edit/{{ $country->id }}" method="POST">
        @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('countryName') is-invalid @enderror" placeholder="Country name" name="countryName" value="{{ $country->name }}" autofocus autocomplete="off">
                @error('countryName')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-success me-3 mt-2">Update</button>
            <a href="{{ route('countryHome') }}" class="btn btn-outline-danger mt-2">Batal</a>
        </form>
        </div>
    </div>
</div>
@endsection