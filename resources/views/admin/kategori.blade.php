@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Kategori Buku</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/kategori/add">
                    <button type="submit" class="btn btn-primary col-12">Add Kategori</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($kategori as $k)
                <div class="card flex">
                    <div class="card-body">
                        <h5 class="card-title">{{ $k["namakategori"] }}</h5>
                        <p class="card-text">{{ $k["deskripsikategori"] }}</p>
                        <a href="/admin/kategori/{{ $k["id"] }}/update" class="btn btn-warning">Update</a>
                        <a href="/admin/kategori/{{ $k["id"] }}/delete" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
