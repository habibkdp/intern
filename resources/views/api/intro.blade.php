@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Introduction</h1>
            <p class="mt-5">Welcome to RegionAPI. Below you will find a current list of the available methods on our province and country.</p>
            <ul class="list-unstyled">
                <li>1. <a href="{{ route('countryAPI') }}">Country</a></li>
                <li>2. <a href="{{ route('provinceAPI') }}">Province</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection