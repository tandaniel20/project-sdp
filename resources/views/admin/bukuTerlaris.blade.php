@extends('layouts.admin')
@section('container')
<div class="container mt-3">
    <h1>Buku Terlaris</h1>
    <hr>
    <div>
        <form action="/admin/bukuTerlaris/search">
            <span>waktu Dari </span>
            <input type="datetime-local" name="from">
            <span> ke </span>
            <input type="datetime-local" name="to">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <hr>
    @php
        $counterRank = 1;
    @endphp
    <div>
        @foreach (array_keys($listIDTerlaris) as $list)
            @foreach ($buku as $b)
                @if ($b->id == $list)
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-bold"> #{{ $counterRank++ }} {{ $b->judul }}</span>
                            <div class="w-25">
                                <img src="<?= asset('storage/imageBuku/')?>/{{ $b->id }}.png" alt="" class="img-thumbnail" style="height: 10vh; "><br>
                            </div>
                            <span>
                                Terjual sebanyak {{ $listIDTerlaris[$list] }}
                            </span>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@if($errors->any())
    <script>alert('{{ $errors->first() }}')</script>
@endif

@endsection
