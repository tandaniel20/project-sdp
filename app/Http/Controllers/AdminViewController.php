<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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
}
