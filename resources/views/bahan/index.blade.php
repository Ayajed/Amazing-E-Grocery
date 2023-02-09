@extends('layout/aplikasi')

@section('title', 'Product(s)')

@section('konten')
    <a href="bahan/create/" class="btn btn-primary">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>ID</th>
                <th>Nama Bahan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img style="max-width:50px; max-height:50px" src="{{ url('foto').'/'.$item->foto }}" alt="">
                        @endif
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm"
                        href='{{ url('/bahan/'.$item->id) }}'>Detail</a>
                        <a class="btn btn-warning btn-sm"
                        href='{{ url('/bahan/'.$item->id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin hapus data?')" class="d-inline" action="{{ '/bahan/'.$item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
