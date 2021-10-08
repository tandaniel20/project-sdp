<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
            'judul' => 'required|unique:vouchers,judul',
            'kode' => 'required | string | min:11 | max:11 | unique:vouchers,kode',
            'batas' => 'required | numeric',
            'jumlahpoint' => 'required | numeric',
        ]);

        $voucher = new voucher;
        $voucher->judul = $request->judul;
        $voucher->kode = $request->kode;
        $voucher->batas = $request->batas;
        $voucher->jumlahpoint = $request->jumlahpoint;
        $voucher->save();
        return view('admin.voucher',[
            "title" => 'Voucher',
            'voucher' => voucher::all(),
            'current' => voucher::first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(voucher $voucher)
    {
        //
    }
}
