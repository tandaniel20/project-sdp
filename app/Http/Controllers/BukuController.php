<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
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
        $validatedData = $request->validate([
            'judul' => 'required|unique:buku,judul',
            'harga' => 'required',
            'penulis' => 'required',
            'berat' => 'required | numeric',
            'tahun' => 'required | numeric | digits:4',
            'bahasa' => 'required',
            'berat' => 'required | numeric',
            'dimensi1' => 'required | numeric',
            'dimensi2' => 'required | numeric',
            'cover' => 'required',
            'deskripsi' => 'required',
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->harga = $request->harga;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->bahasa = $request->bahasa;
        $buku->berat = $request->berat;
        $buku->dimensi = $request->dimensi1.' x '.$request->dimensi2;
        $buku->cover = $request->cover;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();
        return view('admin.buku',[
            "title" => 'Buku',
            'buku' => Buku::all(),
        ]);
    }

    public function cekUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required|unique:buku,judul,'.$id,
            'harga' => 'required',
            'penulis' => 'required',
            'berat' => 'required | numeric',
            'tahun' => 'required | numeric | digits:4',
            'bahasa' => 'required',
            'berat' => 'required | numeric',
            'dimensi1' => 'required | numeric',
            'dimensi2' => 'required | numeric',
            'cover' => 'required',
            'deskripsi' => 'required',
        ]);
        $buku = Buku::where('id',$id)->first();
        $buku->judul = $request->judul;
        $buku->harga = $request->harga;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->bahasa = $request->bahasa;
        $buku->berat = $request->berat;
        $buku->dimensi = $request->dimensi1.' x '.$request->dimensi2;
        $buku->cover = $request->cover;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();
        return view('admin.buku',[
            "title" => 'Buku',
            'buku' => Buku::all(),
        ]);
    }

    public function delete($id){
        $buku = Buku::find($id);
        // dd($kategori);
        $buku->delete();
        return view('admin.buku',[
            'title' => "Buku",
            'buku' => Buku::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        //
    }
}
