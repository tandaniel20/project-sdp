@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Voucher</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/voucher/add">
                    <button type="submit" class="btn btn-primary col-12">Add Voucher</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($voucher as $v)
                            <a href="/admin/voucher/{{ $v["id"] }}"><li class="list-group-item {{ $v["id"]==$current["id"]? 'active':'' }}">{{ $v["judul"] }}</li></a>
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
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
