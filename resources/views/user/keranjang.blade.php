@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Keranjang</h1>
        <hr>
        <?php
            $totalSemua = 0;
        ?>
        @foreach ($keranjang as $k)
            <div class="card mb-3 w-auto" style="height: 15vh;">
                <div class="d-flex flex-row">
                    <div class="align-self-center">
                        <img src="/img/dummy.jpg" class="img-fluid img-thumbnail rounded-start" alt="" style="height: 15vh">
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <h5 class="card-title">{{ $k->Buku->judul }}</h5>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <p class="card-text">Jumlah : {{ $k->qty }}</p>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <p class="card-text">Subtotal :
                                <?php
                                    $ketemu = false;
                                    $total = 0;
                                    foreach ($dpromo as $dp) {
                                        if ($dp["id_buku"] == $k->Buku->id){
                                            $ketemu = true;
                                            $total = $k->qty * $dp["harga_promo"];
                                            echo ($total);
                                        }
                                    }
                                    if (!$ketemu){
                                        $total = $k->Buku->harga*$k->qty;
                                        echo $total;
                                    }
                                    $totalSemua += $total;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="align-self-center flex-grow-1 text-end">
                        <div class="card-body align-middle">
                            <form action="/cart/{{ $k->id }}/remove" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="d-flex justify-content-between">
            <div class="align-middle">
                <h3>Total : Rp. {{ $totalSemua }}</h3>
            </div>
            <div>
                <a href="/checkout">
                    <button type="button" class="btn btn-success">To Check Out</button>
                </a>
            </div>
        </div>

        <hr>
    </div>
@endsection
