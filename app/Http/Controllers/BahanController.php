<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = bahan::orderBy('nama_produk', 'asc')->paginate(10);
        return view('bahan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_produk', $request->nama_produk);
        Session::flash('harga', $request->harga);

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|mimes:png,jpg,jpeg'
        ],[
            'nama_produk.required' => 'Nama produk wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus dalam bentuk angka',
            'foto.required' => 'Foto wajib diisi',
            'foto.mimes' => "Foto hanya diperbolehkan dalam bentuk png, jpg, atau jpeg"
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
            'foto' => $foto_nama
        ];

        bahan::create($data);
        return redirect('bahan')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = bahan::where('id', $id)->first();
        return view('bahan/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = bahan::where('id', $id)->first();
        return view('bahan/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric'
        ],[
            'nama_produk.required' => 'Nama produk wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus dalam bentuk angka',
        ]);

        $data = [
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga')
        ];

        if($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg'
            ],[
                'foto.mimes' => "Foto hanya diperbolehkan dalam bentuk png, jpg, atau jpeg"
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = bahan::where('id', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;
        }

        bahan::where('id', $id)->update($data);
        return redirect('/bahan')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = bahan::where('id', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);

        bahan::where('id', $id)->delete();
        return redirect('/bahan')->with('success', 'Berhasil hapus data');
   }
}
