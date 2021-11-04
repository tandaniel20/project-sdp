<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homeAll(){
        return view('home',[
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function homeKategori($id){
        $idBuku = Buku_Kategori::where('id_kategori',$id)->get();
        $listBuku = [];
        foreach ($idBuku as $row) {
            $buku = Buku::where('id',$row["id_buku"])->first();
            array_push($listBuku, $buku);
        }
        return view('home',[
            'buku' => $listBuku,
            'kategori' => Kategori::all(),
        ]);
    }
}
