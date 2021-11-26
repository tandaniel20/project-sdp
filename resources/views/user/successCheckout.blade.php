@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-5 pt-5 mx-auto text-center">
        <span class="fs-1 fw-bold">Checkout Berhasil</span>
        <hr>
        <span class="fs-2">Silahkan lakukan Transfer ke Rekening BCA</span><br>
        <span class="fs-3">Nomor Rekening : 189030122301</span><br>
        <span class="fs-3">a/n Tan, Daniel Indrajaya Prajitno Putra</span><br>
        <a href="/home">
            <button type="button" class="btn btn-warning fs-4">Back to Home</button>
        </a>
    </div>
@endsection
