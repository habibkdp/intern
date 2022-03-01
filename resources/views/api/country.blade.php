@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Country API</h1>
            <p class="mt-5">This is documentation for country API. Below is available methods and list of api endpoint documentation.</p>
            <hr>
            <section id="all">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /country</p>
                Get all country data. <br>
                Example : 127.0.0.1:8000/country
            </section>
            <hr>
            <section id="get">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /country/{id}</p>
                Get specified country data by ID. <br>
                Example : 127.0.0.1:8000/country/1
            </section>
            <hr>
            <section id="post">
                <p class="fs-3"><span class="text-primary">POST</span>&nbsp; /country</p>
                Insert country data. <br>
                Example : 127.0.0.1:8000/country <br>
                Body : <ul class="list-unstyled">
                    <li class="ms-2">name = country name</li>
                </ul>
            </section>
            <hr>
            <section id="put">
                <p class="fs-3"><span class="text-warning">PUT</span>&nbsp; /country/{id}</p>
                Update country data. <br>
                Example : 127.0.0.1:8000/country/1 <br>
                Body : <ul class="list-unstyled">
                    <li class="ms-2">name = country name</li>
                </ul>
            </section>
            <hr>
            <section id="destroy">
                <p class="fs-3"><span class="text-danger">DELETE</span>&nbsp; /country/{id}</p>
                Delete country data. <br>
                Example : 127.0.0.1:8000/country/1
            </section>
            <hr>
            <section id="searchSection">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /country/search/{name}</p>
                Search country data by name. <br>
                Example : 127.0.0.1:8000/country/indo
            </section>
            <hr>
            <section id="regencies" class="mb-3">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /country/province/{id}</p>
                Get all province from specified country. <br>
                Example : 127.0.0.1:8000/country/province/1
            </section>
        </div>
    </div>
</div>
@endsection