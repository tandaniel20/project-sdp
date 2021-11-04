<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\DPromo;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homeAll(){
        $listBuku = Buku::all();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
        ]);
    }

    public function homeKategori($id){
        $idBuku = Buku_Kategori::where('id_kategori',$id)->get();
        $listBuku = [];
        foreach ($idBuku as $row) {
            $buku = Buku::where('id',$row["id_buku"])->first();
            array_push($listBuku, $buku);
        }
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
        ]);
    }

    public function homePromo(){
        $listBuku = Buku::all();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        $listBuku = [];
        foreach ($listPromo as $p) {
            $buku = Buku::where('id',$p["id_buku"])->first();
            array_push($listBuku, $buku);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
        ]);
    }

    public function homeSearch(Request $request){
        $listBuku = Buku::where('judul', 'like', "%".$request->searchKey."%")->get();
        $listPromo = [];
        foreach ($listBuku as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) array_push($listPromo, $promo);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
            'dpromo' => $listPromo,
        ]);
    }
}
