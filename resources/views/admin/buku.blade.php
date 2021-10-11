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
                    <p class="card-text">
                        Kategori :
                    @foreach ($b->kategori as $kategori)
                        <button class="btn btn-outline-dark btn-sm my-1 rounded-pill">{{ $kategori["namakategori"] }}</button>
                    @endforeach
                    </p>
                    <a href="/admin/buku/{{ $b["id"] }}/kategori" class="btn btn-primary">Kategori</a>
                    <a href="/admin/buku/{{ $b["id"] }}/update" class="btn btn-warning">Edit</a>
                    <a href="/admin/buku/{{ $b["id"] }}/delete" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
