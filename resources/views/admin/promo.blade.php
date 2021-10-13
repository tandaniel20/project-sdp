@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Promo</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/promo/add">
                    <button type="submit" class="btn btn-primary col-12">Add Promo</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($promo as $p)
                            <a href="/admin/promo/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["judul"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>
                                    Judul Promo : {{ $current["judul"] }}
                                </div>
                                <div>
                                    Jangka Waktu : {{ $current["jangkawaktu"] }}
                                </div>
                                <div>
                                    Created at : {{ $current["created_at"] }}
                                </div>
                                <br>
                                <h4>Promo Buku</h4>
                                <br>
                                @foreach ($current->buku as $b)
                                    <div>
                                        {{-- @dump($b) --}}
                                        {{ $b["judul"] }} - <span style="text-decoration: line-through;">{{ $b["harga"] }}</span> -> {{ $b->pivot->harga_promo }}
                                    </div>
                                @endforeach
                                <br>
                                <div>
                                    <a href="/admin/voucher/{{ $current["id"] }}/update"><button class="btn btn-warning">Edit</button></a>
                                    <a href="/admin/voucher/{{ $current["id"] }}/delete"><button class="btn btn-danger">Delete</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        {{-- <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($promo as $p)
                            <a href="/admin/promo/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["judul"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>
                                    Judul : {{ $current["judul"] }}
                                </div>
                                <div>
                                    Kode : {{ $current["kode"] }}
                                </div>
                                <div>
                                    Batas : sisa {{ $current["batas"] }} pakai
                                </div>
                                <div>
                                    Jumlah Point : {{ $current["jumlahpoint"] }}
                                </div>
                                <div>
                                    Created at : {{ $current["created_at"] }}
                                </div>
                                <div>
                                    <a href="/admin/voucher/{{ $current["id"] }}/update"><button class="btn btn-warning">Edit</button></a>
                                    <a href="/admin/voucher/{{ $current["id"] }}/delete"><button class="btn btn-danger">Delete</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div> --}}
    </div>
@endsection
