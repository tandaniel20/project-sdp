@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="/admin/promo/add-promo" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Add Promo</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Judul Promo
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="judul" id="" placeholder="Judul Promo">
                        </div>
                        @error('judul')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Banyak buku
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="number" name="banyak" id="banyak_buku" placeholder="Banyak buku">
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-block">Add Promo</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
