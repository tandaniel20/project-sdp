@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Recent Review</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($reviews as $r)
                <div class="card">
                    {{-- <div class="card-body">

                    </div> --}}
                    <div class="card-body">
                        <span class="text-muted">{{ $r->User->name }} at {{ $r->updated_at }}</span>
                        <div class="w-25">
                            <img src="<?= asset('storage/imageBuku/')?>/{{ $r->Buku["id"] }}.png" alt="" class="img-thumbnail" style="height: 10vh; "><br>
                            <span class="fw-bold">{{ $r->Buku->judul }}</span>
                        </div>
                        @if ($r->rate >= 1)
                            <span class="fa fa-star checkedStar"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif

                        @if ($r->rate >= 2)
                            <span class="fa fa-star checkedStar"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif

                        @if ($r->rate >= 3)
                            <span class="fa fa-star checkedStar"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif

                        @if ($r->rate >= 4)
                            <span class="fa fa-star checkedStar"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif

                        @if ($r->rate >= 5)
                            <span class="fa fa-star checkedStar"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                        <span class="text-muted"> {{ number_format($r->rate,1,',','.') }}</span>
                        <br>
                        <span>
                            {{ $r->response }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
