<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Admin | {{ $title }}</title>
</head>
<body>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100 sticky-top" style="width: 280px;">
            <a href="home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Admin Page</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="kategori" class="nav-link {{ $title === "Kategori" ? "active" : "text-white" }}">
                Kategori
                </a>
            </li>
            <li>
                <a href="buku" class="nav-link {{ $title === "Buku" ? "active" : "text-white" }}">
                Buku
                </a>
            </li>
            <li>
                <a href="promo" class="nav-link {{ $title === "Promo" ? "active" : "text-white" }}">
                Promo
                </a>
            </li>
            <li>
                <a href="bukti-transfer" class="nav-link {{ $title === "Bukti Transfer" ? "active" : "text-white" }}">
                Konfirmasi Bukti Transfer
                </a>
            </li>
            <li>
                <a href="pengantaran" class="nav-link {{ $title === "Pengantaran" ? "active" : "text-white" }}">
                Konfirmasi Pengantaran
                </a>
            </li>
            <li>
                <a href="retur" class="nav-link {{ $title === "Retur" ? "active" : "text-white" }}">
                Konfirmasi Retur
                </a>
            </li>
            <li>
                <a href="voucher" class="nav-link {{ $title === "Manajemen Kode Voucher" ? "active" : "text-white" }}">
                Manajemen Kode Voucher
                </a>
            </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="/">Sign out</a></li>
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
