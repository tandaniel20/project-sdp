@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    {{-- <div class="container m-auto flex" style="justify-content: center;">
        <div class="flex d-flex flex-wrap gap-3 m-5" style="justify-content: flex-start;"> --}}
    <div class="mt-3"><h1>Buku-buku</h1></div>
    <hr>
    <div style="display: flex; justify-content: center">
        <div class="container gap-3" style="display: flex; justify-content: flex-start; flex-wrap: wrap;">
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
                                <span
                                @foreach ($dpromo as $dp)
                                    @if ($dp["id_buku"] == $b["id"])
                                        style="text-decoration: line-through"
                                    @endif
                                @endforeach
                                >Rp. {{ $b["harga"] }}</span>
                                @foreach ($dpromo as $dp)
                                    @if ($dp["id_buku"] == $b["id"])
                                        <span class="text-danger"> Rp. {{ $dp["harga_promo"] }} </span>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
