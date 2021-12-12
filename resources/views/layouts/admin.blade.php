<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin | {{ $title }}</title>
    <style>
        .checkedStar {
            color: goldenrod;
        }

        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }

        .btn-google {
        color: white !important;
        background-color: #ea4335;
        }

        .btn-facebook {
        color: white !important;
        background-color: #3b5998;
        }

        a:link {
            text-decoration: none;
        }

        .linkBuku{
            color: #000000;
        }

        /* *{
            font-family: 'Nunito Sans';
        } */

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

        .card-img-top {
            width: 100%;
            height: 10vw;
            object-fit: cover;
        }
    </style>
</head>
<body>
    @php
        use App\Models\HTrans;
        use App\Models\HRetur;
        $jumlahBuktiTransfer = count(HTrans::where('status',1)->get());
        $jumlahPengantaran = count(HTrans::where('status',2)->get());
        $jumlahRetur = count(HRetur::where('status',0)->get());
        $jumlahResend = count(HRetur::where('status',1)->get());
    @endphp
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100 sticky-top" style="width: 280px;">
            <a href="/admin/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Admin Page</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/admin/kategori" class="nav-link {{ $title === "Kategori" ? "active" : "text-white" }}">
                Kategori
                </a>
            </li>
            <li>
                <a href="/admin/buku" class="nav-link {{ $title === "Buku" ? "active" : "text-white" }}">
                Buku
                </a>
            </li>
            <li>
                <a href="/admin/promo" class="nav-link {{ $title === "Promo" ? "active" : "text-white" }}">
                Promo
                </a>
            </li>
            <li>
                <div class="position-relative">
                    @if ($jumlahBuktiTransfer > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning" style="font-size: 15px">
                            {{ $jumlahBuktiTransfer }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                    <a href="/admin/bukti-transfer" class="nav-link {{ $title === "Bukti Transfer" ? "active" : "text-white" }}">
                        Konfirmasi Bukti Transfer
                    </a>
                </div>

            </li>
            <li>
                <div class="position-relative">
                    @if ($jumlahPengantaran > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning" style="font-size: 15px">
                            {{ $jumlahPengantaran }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                    <a href="/admin/pengantaran" class="nav-link {{ $title === "Pengantaran" ? "active" : "text-white" }}">
                        Konfirmasi Pengantaran
                    </a>
                </div>
            </li>
            <li>
                <div class="position-relative">
                    @if ($jumlahRetur > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning" style="font-size: 15px">
                            {{ $jumlahRetur }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                    <a href="/admin/retur" class="nav-link {{ $title === "Retur" ? "active" : "text-white" }}">
                        Konfirmasi Retur
                    </a>
                </div>
            </li>
            <li>
                <div class="position-relative">
                    @if ($jumlahResend > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning" style="font-size: 15px">
                            {{ $jumlahResend }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                    <a href="/admin/resend" class="nav-link {{ $title === "Resend" ? "active" : "text-white" }}">
                        Konfirmasi Resend
                    </a>
                </div>
            </li>
            <li>
                <a href="/admin/voucher" class="nav-link {{ $title === "Manajemen Kode Voucher" ? "active" : "text-white" }}">
                Manajemen Kode Voucher
                </a>
            </li>
            <li>
                <a href="/admin/laporanadmin/pemesanan" class="nav-link {{ $title === "Laporan Pemasukan" ? "active" : "text-white" }}">
                Laporan Pemasukan
                </a>
            </li>
            <li>
                <a href="/admin/laporanadmin/retur" class="nav-link {{ $title === "Laporan Pengeluaran" ? "active" : "text-white" }}">
                Laporan Pengeluaran
                </a>
            </li>
            <li>
                <a href="/admin/bukuTerlaris/" class="nav-link {{ $title === "Buku Terlaris" ? "active" : "text-white" }}">
                Buku Terlaris
                </a>
            </li>
            <li>
                <a href="/admin/recentReview" class="nav-link {{ $title === "Recent Review" ? "active" : "text-white" }}">
                Recent Review
                </a>
            </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="/logout-admin">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid d-flex">
            @yield('container')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="sidebars.js"></script>
</body>
</html>
