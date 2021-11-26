@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Detail Pemesanan {{ $header->id }}</h1>
        <hr>
            <div class="row">
                <div class="col-2"><span class="text-muted">Tanggal</div>
                <div class="col-10"><span class="text-muted">: {{ $header->created_at }} </span></div>
            </div>
            <div class="row">
                <div class="col-2"><span class="text-muted">Email</div>
                <div class="col-10"><span class="text-muted">: {{ $header->User->email }} </span></div>
            </div>
            <div class="row">
                <div class="col-2">Nama</div>
                <div class="col-10">: {{ $header->User->name }}</div>
            </div>
            <div class="row">
                <div class="col-2">Metode</div>
                <div class="col-10">: {{ $header->metode == 1 ? 'Point' : 'Transfer' }}</div>
            </div>
            <div class="row">
                <div class="col-2">Status</div>
                <div class="col-10">
                    @if ($header->status == 0)
                        : Menunggu Bukti Transfer
                    @elseif ($header->status == 1)
                        : Menunggu Admin Menyetujui Bukti Transfer
                    @elseif ($header->status == 2)
                        : Menunggu Pengiriman dari Admin
                    @elseif ($header->status == 99)
                        : Cancelled
                    @endif
                </div>
            </div>
            <a href="/pemesanan">
                <button type="button" class="btn btn-warning">Back to Pemesanan</button>
            </a>
        <hr>
        <h1>Detail Buku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $d)
                    <tr>
                        <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                        <td class="align-middle">{{ "Rp " . number_format($d->harga,0,',','.') }}</td>
                        <td class="align-middle">{{ $d->qty }}</td>
                        <td class="align-middle">{{ $d->subtotal }}</td>
                        {{-- <th scope="row" class="align-middle">{{ $p->created_at }}</th>
                        <td class="align-middle">{{ "Rp " . number_format($p->total,0,',','.') }}</td>
                        <td class="align-middle">
                            @if ($p->metode == 0)
                                Transfer
                            @else
                                Point
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($p->status == 0)
                                Menunggu Bukti Transfer
                            @elseif ($p->status == 1)
                                Menunggu Admin Menyetujui Bukti Transfer
                            @elseif ($p->status == 2)
                                Menunggu Pengiriman dari Admin
                            @elseif ($p->status == 99)
                                Cancelled
                            @endif
                        </td> --}}
                    </tr>
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
