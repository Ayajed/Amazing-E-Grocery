@extends('layout/aplikasi')

@section('title', 'Edit Product')

@section('konten')
    <a href="/bahan" class="btn btn-secondary">Kembali</a>
    <form method="post" action="{{ '/bahan/'.$data->id }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>ID Produk: {{ $data->id }}</h1>
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" id="nomor_produk"
            value="{{ $data->nama_produk }}">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga" id="harga"
            value="{{ $data->harga }}">
        </div>
        @if ($data->foto)
            <div class="mb-3">
                <img style="max-width:50px; max-height:50px"
                src="{{ url('foto').'/'.$data->foto }}" alt="">
            </div>
        @endif
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
