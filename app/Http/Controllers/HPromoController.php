<?php

namespace App\Http\Controllers;

use App\Models\DPromo;
use App\Models\HPromo;
use App\Rules\promoHargaKelebihan;
use App\Rules\promoHargaKosong;
use Illuminate\Http\Request;

class HPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validatedData = $request->validate([
            'judul' => 'required|unique:h_promo,judul',
            'jangkawaktu' => 'required|numeric|min:1',
            'harga1' => [new promoHargaKosong($request->buku1), new promoHargaKelebihan($request->buku1)],
            'harga2' => [new promoHargaKosong($request->buku2), new promoHargaKelebihan($request->buku2)],
            'harga3' => [new promoHargaKosong($request->buku3), new promoHargaKelebihan($request->buku3)],
            'harga4' => [new promoHargaKosong($request->buku4), new promoHargaKelebihan($request->buku4)],
            'harga5' => [new promoHargaKosong($request->buku5), new promoHargaKelebihan($request->buku5)],
        ]);

        $addPromo = new HPromo;
        $addPromo->judul = $request->judul;
        $addPromo->jangkawaktu = $request->jangkawaktu;
        $addPromo->save();

        if ($request->buku1 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku1;
            $addDPromo->harga_promo = $request->harga1;
            $addDPromo->save();
        }
        if ($request->buku2 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku2;
            $addDPromo->harga_promo = $request->harga2;
            $addDPromo->save();
        }
        if ($request->buku3 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku3;
            $addDPromo->harga_promo = $request->harga3;
            $addDPromo->save();
        }
        if ($request->buku4 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku4;
            $addDPromo->harga_promo = $request->harga4;
            $addDPromo->save();
        }
        if ($request->buku5 != "null"){
            $addDPromo = new DPromo;
            $addDPromo->id_promo = $addPromo->id;
            $addDPromo->id_buku = $request->buku5;
            $addDPromo->harga_promo = $request->harga5;
            $addDPromo->save();
        }

        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function show(HPromo $hPromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function edit(HPromo $hPromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HPromo $hPromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HPromo  $hPromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HPromo $hPromo)
    {
        //
    }
}
