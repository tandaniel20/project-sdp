@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container">
        <div class="d-flex flex-wrap gap-3 m-5">
            @foreach ($buku as $b)
            <a href="/buku/{{ $b["id"] }}">
                <div class="card flex linkBuku" style="width: 15rem;height: 24rem">
                    <img class="card-img-top" src="/img/dummy.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="h-75">
                            <h6 class="card-title">{{ $b["judul"] }}</h6>
                            Kategori :
                            @foreach ($b->kategori as $kategori)
                                <button class="btn btn-outline-dark btn-sm m-1 rounded-pill fw-light">{{ $kategori["namakategori"] }}</button>
                            @endforeach
                        </div>
                        <div>
                            <p class="card-text">
                                Rp. {{ $b["harga"] }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
