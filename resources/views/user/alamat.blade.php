@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>
<div class="row">
    <div class="col">
        <h1>Alamat</h1>
    </div>
    <div class="col-2 my-auto" style="">
        <a href="/keAddAlamat"><button  type="submit" class="btn btn-primary col-12">Add Alamat</button></a>
    </div>
</div>
<hr>
<div class="container-fluid" style="text-align: center;">
    @csrf
    <table id="editable" class="display">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Penerima</th>
            <th scope="col">No Hp</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Kota</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Kelurahan</th>
            <th scope="col">Kodepos</th>
            <th scope="col">Nama Jalan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $alamat as $alamat)
            <tr>
                <td>{{$alamat->id}}</td>
                <td>{{$alamat->penerima}}</td>
                <td>{{$alamat->nohp}}</td>
                <td>{{$alamat->provinsi}}</td>
                <td>{{$alamat->kota}}</td>
                <td>{{$alamat->kecamatan}}</td>
                <td>{{$alamat->kelurahan}}</td>
                <td>{{$alamat->kodepos}}</td>
                <td>{{$alamat->jalan}}</td>
                <td><a href="/keupdatealamat/{{ $alamat["id"] }}" class="btn btn-warning">Update</a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalAlamat" style="float: left">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalAlamat" tabindex="-1" aria-labelledby="exampleModalLabelAlamat" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelAlamat">Delete Alamat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin membuang Alamat?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="/deletealamat/{{ $alamat["id"] }}"><button type="button" class="btn btn-primary">Delete</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
