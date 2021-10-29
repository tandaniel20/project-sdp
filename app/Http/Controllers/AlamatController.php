<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    function prosesData(Request $request) {
        $rules = [
            //pengisian rules dilakukan dengan associative array dengan format:
            //'namaFieldYangSesuai' => ['validation1','validation2']
            //atau
            //'namaFieldYangSesuai' => 'validation1 | validation2'
            'namajalan' => 'required | max:255',
            'namatempat' => 'required | max:255',
            'rtrw' => 'required | numeric',
            'kelurahan' => 'required | max:255',
            'kecamatan' => 'required | max:255',
            'kota' => 'required | max:255',
            'provinsi' => 'required | max:255',
            'kodepos' => 'required | numeric'
            //'email' => 'required | regex:/(.+)@(.+)\.(.+)/i' // format email @ .
            //'password' => 'required | min:8 | max:12 | regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/ | confirmed'//sama ama confirm,harus ad huruf besar dan kecil
        ];
        //new IsAdministrator untuk membuat objek custom validation baru.
        //kalau mau me-new object validation baru, harus dituliskan dengan cara pertama.
        //penjelasan custom validationnya bisa dilihat pada direktori App/Rules/IsAdministrator
        //untuk melakukan validasi, bisa menggunakan sintaks dibawah ini:
        //$this->validate($request,$rules);
        //apabila ingin menambahkan pesan secara custom, siapkan associative array
        //yang berisi dari rules yang ingin diganti pesannya
        $customError = [
            'required' => ':attribute harus diisi!',
            'numeric' => 'Mana ada :attribute ada hurufnya?'
        ];
        //setelah disiapkan custom pesan error nya, tambahkan parameter ke-3 ketika
        //melakukan validasi. kalau mau pake defautlnya laravel, parameter ke-3 tinggal dihapus
        //apabila validasi gagal, maka codingan dibawah $this-> validate tidak akan dijalankan
        $this->validate($request,$rules,$customError);
        //mengambil isi cookie dan menampung pada variable users
        $jalan = $request->input('namajalan');
        $tempat = $request->input('namatempat');
        $rtrw = $request->input('rtrw');
        $kelurahan = $request->input('kelurahan');
        $kecamatan = $request->input('kecamatan');
        $kota = $request->input('kota');
        $provinsi = $request->input('provinsi');
        $kodepos = $request->input('kodepos');
        // $data = [
        //     'nama' => $nama,
        //     'email' => $email,
        //     'nohp' => $nohp,
        //     'password' => $password
        // ];
        // DB::table('user')->insert($data);
        $data = new Alamat;
        $data->jalan = $jalan;
        $data->perumahan = $tempat;
        $data->rtrw = $rtrw;
        $data->kelurahan = $kelurahan;
        $data->kecamatan = $kecamatan;
        $data->kota = $kota;
        $data->provinsi = $provinsi;
        $data->kodepos = $kodepos;
        $data->save();
        echo "<script>alert('Sukses Tambah Alamat')</script>";
        return view('admin.addAlamat');
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
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}
