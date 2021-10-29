@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container d-flex flex-wrap m-5">
        <div class="w-25 d-flex justify-content-center" style="height: 25vh;">
            <img src="/img/dummy.jpg" alt="" class="w-75 img-thumbnail">
        </div>
        <div class="w-50" style="height: 75vh;">
            <span class="fw-bold"><h2>{{ $buku["judul"] }}</h2></span>
            <span class="fw-bold"><h4>Rp. {{ $buku["harga"] }}</h4></span>
            <hr>
            <span>{{ $buku["deskripsi"] }}</span>
        </div>
        <div class="w-25" style="height: 75vh;">
            <div class="card flex" style="w-100 h-50">
                <div class="card-body">
                    <div class="h-75">
                        <h5 class="card-title text-center">Tambahkan ke Keranjang</h5>
                    </div>
                    <div>
                        <p class="card-text">Jumlah Barang :</p>
                        <button class="btn btn-success rounded-circle">-</button>
                        <input type="number" name="jumlah" id="inp_jumlah" value="0" class="w-25 rounded">
                        <button class="btn btn-success rounded-circle">+</button>
                        <span class="cart-text" style="color:gray;">Stock : {{ $buku["stock"] }}</span>
                        <hr>
                        <span>Subtotal : </span>
                        <span id="subtotal">0</span>
                        <div class="text-center">
                            <button class="btn btn-success rounded">Add to Cart</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
