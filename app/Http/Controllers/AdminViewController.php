<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Kategori;
use App\Models\voucher;
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
        $kategoris = Kategori::all();
        return view('admin.kategori',[
            'title' => "Kategori",
            'kategori' => $kategoris,
        ]);
    }

    public function buku(){
        return view('admin.buku',[
            'title' => "Buku",
            'buku' => buku::all()
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
            'title' => "Manajemen Kode Voucher",
            'voucher' => voucher::all(),
            'current' => voucher::first(),
        ]);
    }

    public function selectVoucher($id){
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher",
            'voucher' => voucher::all(),
            'current' => voucher::where('id',$id)->first(),
        ]);
    }

    public function addKategori(){
        return view('admin.addKategori',[
            'title' => "Kategori",
        ]);
    }

    public function updateKategori($id){
        $kategori = Kategori::where('id',$id)->first();
        // dd($kategori);
        return view('admin.updateKategori',[
            'title' => "Kategori",
            'kategori' => $kategori,
        ]);
    }

    public function addBuku(){
        return view('admin.addBuku',[
            'title' => "Buku",
        ]);
    }

    public function addVoucher(){
        return view('admin.addVoucher',[
            'title' => "Voucher",
        ]);
    }
}
