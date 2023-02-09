@extends('layout/aplikasi')

@section('title', 'Product Detail')

@section('konten')
    <div>
        <a href="/bahan" class="btn btn-secondary" style="margin-bottom: 10px;">Kembali</a>
        <h1>{{$data->nama_produk}}</h1>
        <p>
            <b>ID</b> {{$data->id}}
        </p>
        <p>
            <b>Harga</b> {{$data->harga}}
        </p>
    </div>
@endsection
