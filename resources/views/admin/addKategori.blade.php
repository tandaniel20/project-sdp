@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="/admin/kategori/add-kategori" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Add Kategori</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Nama Kategori
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="namakategori" id="" placeholder="Nama Kategori">
                        </div>
                        @error('namakategori')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Deskripsi Kategori
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <div class="form-floating">
                                <textarea class="form-control w-50" placeholder="" id="floatingTextarea2" style="height: 100px" name="deskripsikategori"></textarea>
                                <label for="floatingTextarea2">Deskripsi</label>
                            </div>
                        </div>
                        @error('deskripsikategori')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-block">Add Kategori</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
