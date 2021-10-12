<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Voucher;
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

    public function buku(){
        return view('admin.buku',[
            'title' => "Buku",
            'buku' => Buku::all()
        ]);
    }

    public function addBuku(){
        return view('admin.addBuku',[
            'title' => "Buku",
        ]);
    }

    public function kategoriBuku($id){
        return view('admin.bukuKategori',[
            'bukuSelected' => Buku::where('id',$id)->first(),
            'kategori' => Kategori::all(),
            'title' => "Buku",
        ]);
    }

    public function updateBuku($id){
        $buku = Buku::where('id',$id)->first();
        return view('admin.updateBuku',[
            'title' => "Buku",
            'buku' => $buku,
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
            'voucher' => Voucher::all(),
            'current' => Voucher::first(),
        ]);
    }

    public function selectVoucher($id){
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher",
            'voucher' => Voucher::all(),
            'current' => Voucher::where('id',$id)->first(),
        ]);
    }

    public function addVoucher(){
        return view('admin.addVoucher',[
            'title' => "Voucher",
        ]);
    }

    public function updateVoucher($id){
        $voucher = Voucher::where('id',$id)->first();
        return view('admin.updateVoucher',[
            'title' => "Voucher",
            'voucher' => $voucher,
        ]);
    }
}
