@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Buku</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/buku/add">
                    <button type="submit" class="btn btn-primary col-12">Add Buku</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-row gap-3 justify-content-center">
            @foreach ($buku as $b)
            <div class="card flex" style="width: 18rem;">
                <img class="card-img-top" src="/img/dummy.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $b["judul"] }}</h5>
                    <p class="card-text">{{ $b["deskripsi"] }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
