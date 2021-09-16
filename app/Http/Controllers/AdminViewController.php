<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    //
    public function home(){
        return view('admin.home',[
            'title' => "Home"
        ]);
    }

    public function kategori(){
        return view('admin.kategori',[
            'title' => "Kategori"
        ]);
    }

    public function buku(){
        return view('admin.buku',[
            'title' => "Buku"
        ]);
    }

    public function promo(){
        return view('admin.promo',[
            'title' => "Promo"
        ]);
    }

    public function bukti_transfer(){
        return view('admin.bukti-transfer',[
            'title' => "Bukti Transfer"
        ]);
    }

    public function pengantaran(){
        return view('admin.pengantaran',[
            'title' => "Pengantaran"
        ]);
    }

    public function retur(){
        return view('admin.retur',[
            'title' => "Retur"
        ]);
    }

    public function voucher(){
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher"
        ]);
    }
}
