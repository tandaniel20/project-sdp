@extends('layouts.admin')
@section('container')
<div class="container mt-3">
    <h1>Laporan Pengeluaran</h1>
    <hr>
    <div>
        <form action="/admin/laporanadmin/retursearch">
            <span>waktu Dari </span>
            <input type="datetime-local" name="from">
            <span> ke </span>
            <input type="datetime-local" name="to">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

    </div>
    <hr>
    @php
        $totalall=0;
    @endphp
    @foreach ($retur as $p)
    @php
        $totalsemua=0;
    @endphp
    <span class="fs-2">{{ $p->kode_retur }}</span>
    <span class="fs-6 text-muted">{{ $p->created_at }}</span>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($p->Detail) --}}
            @foreach ($p->Detail as $b)
            @php
             $totalall+=$b->subtotal;
            $totalsemua+=$b->subtotal;
            @endphp
                <tr>
                    <th scope="row" class="align-middle">{{ $b->Buku->judul }}</th>
                    <th scope="row" class="align-middle">{{ $b->harga }}</th>
                    <th scope="row" class="align-middle">{{ $b->qty }}</th>
                    <td class="align-middle">{{ "Rp " . number_format($b->subtotal,0,',','.') }}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row" class="align-middle"></th>
                <th scope="row" class="align-middle"></th>
                <th scope="row" class="align-middle">Total Pengeluaran :</th>
                <td class="align-middle">{{ "Rp " . number_format($totalsemua,0,',','.') }}</td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </table>
    @endforeach
    <h3>Total Seluruh Pengeluaran : {{ "Rp " . number_format($totalall,0,',','.') }}</h3>

</div>
@if($errors->any())
    <script>alert('{{ $errors->first() }}')</script>
@endif

@endsection
