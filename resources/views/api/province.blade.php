@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Province API</h1>
            <p class="mt-5">This is documentation for province API. Below is available methods and list of api endpoint documentation.</p>
            <hr>
            <section id="all">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /province</p>
                Get all province data. <br>
                Example : 127.0.0.1:8000/province
            </section>
            <hr>
            <section id="get">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /province/{id}</p>
                Get specified province data by ID. <br>
                Example : 127.0.0.1:8000/province/1
            </section>
            <hr>
            <section id="post">
                <p class="fs-3"><span class="text-primary">POST</span>&nbsp; /province</p>
                Insert province data. <br>
                Example : 127.0.0.1:8000/province <br>
                Body : <ul class="list-unstyled">
                    <li class="ms-2">name = province name</li>
                    <li class="ms-2">countryId = id country</li>
                </ul>
            </section>
            <hr>
            <section id="put">
                <p class="fs-3"><span class="text-warning">PUT</span>&nbsp; /province/{id}</p>
                Update province data. <br>
                Example : 127.0.0.1:8000/province/1 <br>
                Body : <ul class="list-unstyled">
                    <li class="ms-2">name = province name</li>
                    <li class="ms-2">countryId = id country</li>
                </ul>
            </section>
            <hr>
            <section id="destroy">
                <p class="fs-3"><span class="text-danger">DELETE</span>&nbsp; /province/{id}</p>
                Delete province data. <br>
                Example : 127.0.0.1:8000/province/1
            </section>
            <hr>
            <section id="searchSection">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /province/search/{name}</p>
                Search province data by name. <br>
                Example : 127.0.0.1:8000/province/jawa
            </section>
            <hr>
            <section id="regencies" class="mb-3">
                <p class="fs-3"><span class="text-success">GET</span>&nbsp; /province/regencies/{id}</p>
                Get all regencies from specified province. <br>
                Example : 127.0.0.1:8000/province/regencies/1
            </section>
        </div>
    </div>
</div>
@endsection