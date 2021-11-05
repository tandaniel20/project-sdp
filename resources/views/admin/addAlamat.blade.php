@extends('layouts.admin')
@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <div class="container pt-4" style="text-align: center;max-width:35%;">
        <form action="/admin/AddAlamat" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Alamat</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Penerima
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-100" type="text" name="penerima" id="" placeholder="Penerima" value="{{ old('penerima') }}">
                        </div>
                        @error('penerima')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Nomor Hp
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="number" class="w-100" name="nohp" id="" placeholder="No Hp" value="{{ old('No Hp') }}">
                        </div>
                        @error('nohp')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Provinsi
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-100" type="text" name="provinsi" id="" placeholder="Provinsi" value="{{ old('provinsi') }}">
                        </div>
                        @error('provinsi')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Kota
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-100" type="text" name="kota" id="" placeholder="kota" value="{{ old('kota') }}">
                        </div>
                        @error('kota')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Kecamatan
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="text" class="w-100" name="kecamatan" id="" placeholder="Kecamatan" value="{{ old('kecamatan') }}">
                        </div>
                        @error('kecamatan')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Kelurahan
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="text" class="w-100" name="kelurahan" id="" placeholder="Kelurahan" value="{{ old('kelurahan') }}">
                        </div>
                        @error('kelurahan')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Kode Pos
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="number" class="w-100" name="kodepos" id="" placeholder="Kode Pos" value="{{ old('kodepos') }}">
                        </div>
                        @error('kodepos')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3" style="text-align: right;">
                            Jalan
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-100" type="text" name="jalan" id="" placeholder="Jalan" value="{{ old('jalan') }}">
                        </div>
                        @error('jalan')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Add Alamat</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        @csrf
        <table id="editable" class="table table-bordered table-striped">
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
                    <td>{{$alamat->kota}}</td>
                    <td>{{$alamat->kecamatan}}</td>
                    <td>{{$alamat->provinsi}}</td>
                    <td>{{$alamat->kelurahan}}</td>
                    <td>{{$alamat->kodepos}}</td>
                    <td>{{$alamat->jalan}}</td>

                    {{-- <td>{{$alamat["penerima"]}}</td>
                    <td>{{$alamat["nohp"]}}</td>
                    <td>{{$alamat["provinsi"]}}</td>
                    <td>{{$alamat["kota"]}}</td>
                    <td>{{$alamat["kecamatan"]}}</td>
                    <td>{{$alamat["kelurahan"]}}</td>
                    <td>{{$alamat["kodepos"]}}</td>
                    <td>{{$alamat["jalan"]}}</td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });
        $('#editable').Tabledit({
            url:'{{ route("tabledit.action")}}',
            dataType:"json",
            columns:{
                identifier:[0,'id'],
                editable:[[1,'penerima'],[2,'nohp'],[3,'provinsi'],[4,'kota'],[5,'kecamatan'],[6,'kelurahan'],[7,'kodepos'],[8,'jalan']]
                restoreButton:false,
                onSuccess:function(data,textStatus,jqXHR)
                {
                    if(data.action == 'delete')
                    {
                        $('#'+data.id).remove();
                    }
                }
            }
        });
    });

    </script>
@endsection
