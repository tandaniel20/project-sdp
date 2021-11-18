<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Buku;
use App\Models\DPromo;
use App\Models\DTrans;
use App\Models\HTrans;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\PointHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HTransController extends Controller
{

    public function pemesananDetail(){
        return redirect()->back();
    }

    public function pemesananPage(){
        return view('user.pemesanan',[
            'kategori' => Kategori::all(),
            'pemesanan' => HTrans::where('id_user', Auth::user()->id)->get(),
        ]);
    }

    public function checkOutPage(){
        $listPromo = [];
        foreach (Buku::all() as $b) {
            $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
            if ($promo != null) {
                array_push($listPromo, $promo);
            }
        }
        return view('user.checkout',[
            'kategori' => Kategori::all(),
            'keranjang' => Keranjang::where('id_user',Auth::user()->id)->get(),
            'dpromo' => $listPromo,
            'alamat' => Alamat::where('id_user',Auth::user()->id)->get(),
        ]);
    }

    public function checkOut(Request $req){
        $stockKurang = false; // true = kalau misal stock tidak mencukupi, false = sebaliknya
        foreach (Keranjang::where('id_user', Auth::user()->id)->get() as $k) {
            foreach (Buku::all() as $b) {
                if ($k->id_buku == $b->id && $k->qty > $b->stock){
                    $stockKurang = true;
                }
            }
        }

        if (!$stockKurang){
            // cari list promo
            $listPromo = [];
            foreach (Buku::all() as $b) {
                $promo = DPromo::where('id_buku', $b["id"])->where('tanggal_exp','>=',Carbon::now()->toDateTimeString())->orderBy('harga_promo', 'ASC')->first();
                if ($promo != null) {
                    array_push($listPromo, $promo);
                }
            }
            if ($req->metode == 1){
                if ($req->totalSemua > Auth::user()->point) return redirect()->back()->withErrors(['msg' => 'Point anda tidak mencukupi!']);
                else{
                    // semua validasi benar
                    // masukkan ke h trans
                    $newHTrans = new HTrans;
                    $newHTrans->id_user = Auth::user()->id;
                    $newHTrans->total = $req->totalSemua;
                    $newHTrans->metode = $req->metode;
                    $newHTrans->status = 2; // langsung ke pengiriman admin
                    $newHTrans->save();

                    // masukkan ke d trans

                    foreach (Keranjang::where('id_user', Auth::user()->id)->get() as $k) {
                        $ketemu = false;
                        foreach ($listPromo as $dp) {
                            if ($dp["id_buku"] == $k->Buku->id && $ketemu == false){
                                $ketemu = true;
                                $newDTrans = new DTrans;
                                $newDTrans->id_trans = $newHTrans->id;
                                $newDTrans->id_buku = $k->Buku->id;
                                $newDTrans->harga = $dp["harga_promo"];
                                $newDTrans->qty = $k->qty;
                                $newDTrans->subtotal = $dp["harga_promo"]*$k->qty;
                                $newDTrans->save();

                                //potong stock buku
                                $bukuData = Buku::where('id',$k->Buku->id)->first();
                                $bukuData->stock = $bukuData->stock - $k->qty;
                                $bukuData->save();
                            }
                        }
                        if (!$ketemu){
                            $newDTrans = new DTrans;
                            $newDTrans->id_trans = $newHTrans->id;
                            $newDTrans->id_buku = $k->Buku->id;
                            $newDTrans->harga = $k->Buku->harga;
                            $newDTrans->qty = $k->qty;
                            $newDTrans->subtotal = $k->Buku->harga*$k->qty;
                            $newDTrans->save();

                            //potong stock buku
                            $bukuData = Buku::where('id',$k->Buku->id)->first();
                            $bukuData->stock = $bukuData->stock - $k->qty;
                            $bukuData->save();
                        }
                    }

                    //clear cart
                    $deleteKeranjang = Keranjang::where('id_user', Auth::user()->id)->delete();

                    //potong poin
                    $userData = User::where('id', Auth::user()->id)->first();
                    $userData->point = $userData->point - $req->totalSemua;
                    $userData->save();

                    //add history point
                    $newPointHistory = new PointHistory;
                    $newPointHistory->id_user = Auth::user()->id;
                    $newPointHistory->kredit = 0;
                    $newPointHistory->debit = $req->totalSemua;
                    $newPointHistory->keterangan = 'Pembayaran checkout';
                    $newPointHistory->save();

                    return redirect()->back()->withErrors(['msg' => 'Checkout success!']);
                }
            }else{
                // semua validasi benar
                // masukkan ke h trans
                $newHTrans = new HTrans;
                $newHTrans->id_user = Auth::user()->id;
                $newHTrans->total = $req->totalSemua;
                $newHTrans->metode = $req->metode;
                $newHTrans->status = 0;
                $newHTrans->save();

                // masukkan ke d trans

                foreach (Keranjang::where('id_user', Auth::user()->id)->get() as $k) {
                    $ketemu = false;
                    foreach ($listPromo as $dp) {
                        if ($dp["id_buku"] == $k->Buku->id && $ketemu == false){
                            $ketemu = true;
                            $newDTrans = new DTrans;
                            $newDTrans->id_trans = $newHTrans->id;
                            $newDTrans->id_buku = $k->Buku->id;
                            $newDTrans->harga = $dp["harga_promo"];
                            $newDTrans->qty = $k->qty;
                            $newDTrans->subtotal = $dp["harga_promo"]*$k->qty;
                            $newDTrans->save();

                            //potong stock buku
                            $bukuData = Buku::where('id',$k->Buku->id)->first();
                            $bukuData->stock = $bukuData->stock - $k->qty;
                            $bukuData->save();
                        }
                    }
                    if (!$ketemu){
                        $newDTrans = new DTrans;
                        $newDTrans->id_trans = $newHTrans->id;
                        $newDTrans->id_buku = $k->Buku->id;
                        $newDTrans->harga = $k->Buku->harga;
                        $newDTrans->qty = $k->qty;
                        $newDTrans->subtotal = $k->Buku->harga*$k->qty;
                        $newDTrans->save();

                        //potong stock buku
                        $bukuData = Buku::where('id',$k->Buku->id)->first();
                        $bukuData->stock = $bukuData->stock - $k->qty;
                        $bukuData->save();
                    }
                }

                //clear cart
                $deleteKeranjang = Keranjang::where('id_user', Auth::user()->id)->delete();

                return redirect()->back()->withErrors(['msg' => 'Checkout success!']);
            }
        }return redirect()->back()->withErrors(['msg' => 'Stock buku melebihi!']);
    }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HTrans  $hTrans
     * @return \Illuminate\Http\Response
     */
    public function show(HTrans $hTrans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HTrans  $hTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(HTrans $hTrans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HTrans  $hTrans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HTrans $hTrans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HTrans  $hTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(HTrans $hTrans)
    {
        //
    }
}
