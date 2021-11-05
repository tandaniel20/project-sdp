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

            'penerima' => 'required | max:255',
            'nohp' => 'required | numeric | digits_between:8,12',
            'provinsi' => 'required | max:255',
            'kota' => 'required | max:255',
            'kecamatan' => 'required | max:255',
            'kelurahan' => 'required | max:255',
            'kodepos' => 'required | numeric',
            'jalan' => 'required | max:255'
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
            'numeric' => 'Mana ada :attribute ada hurufnya?',
        ];
        //setelah disiapkan custom pesan error nya, tambahkan parameter ke-3 ketika
        //melakukan validasi. kalau mau pake defautlnya laravel, parameter ke-3 tinggal dihapus
        //apabila validasi gagal, maka codingan dibawah $this-> validate tidak akan dijalankan
        $this->validate($request,$rules,$customError);
        //mengambil isi cookie dan menampung pada variable users

        $penerima = $request->input('penerima');
        $nohp = $request->input('nohp');
        $provinsi = $request->input('provinsi');
        $kota = $request->input('kota');
        $kecamatan = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');
        $kodepos = $request->input('kodepos');
        $jalan = $request->input('jalan');
        // $data = [
        //     'nama' => $nama,
        //     'email' => $email,
        //     'nohp' => $nohp,
        //     'password' => $password
        // ];
        // DB::table('user')->insert($data);
        // 'iduser',
        // 'penerima',
        // 'no_hp',
        // 'provinsi',
        // 'kota',
        // 'kecamatan',
        // 'kelurahan',
        // 'kodepos',
        // 'jalan'
        $data = new Alamat;

        $data->penerima = $penerima;
        $data->nohp = $nohp;
        $data->provinsi = $provinsi;
        $data->kota = $kota;
        $data->kecamatan = $kecamatan;
        $data->kelurahan = $kelurahan;
        $data->kodepos = $kodepos;
        $data->jalan = $jalan;
        $data->save();
        echo "<script>alert('Sukses Tambah Alamat')</script>";
        return view('admin.addAlamat',['title' => "Alamat"],['alamat' => Alamat::all()]);
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            if ($request->action == 'Edit')
            {
                $data = array(
                    'penerima' => $request->penerima,
                    'nohp' => $request->nohp,
                    'provinsi' => $request->provinsi,
                    'kota' => $request->kota,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'kodepos' => $request->kodepos,
                    'jalan' => $request->jalan,
                );
                Alamat::where('id',$request->id)
                ->update($data);
            }
            if ($request->action == 'delete') {
                Alamat::where('id',$request->id)
                ->delete();
            }
            return response()->json($request);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Alamat::all();
        return view('admin.addAlamat',compact($data));
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
