@extends('layout/aplikasi')

@section('title', 'Home')

@section('konten')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Selamat Datang
        <br>
        di Amazing E-Grocery
    </h1>
        <div class="mb-3 d-grid">
            <a class="btn btn-primary"
            href='/sesi' style="margin-top: 15px;">Login</a>
        </div>
        <div class="mb-3 d-grid">
            <a class="btn btn-primary"
            href='/sesi/register' style="margin-top: 15px;">Register</a>
        </div>
    </form>
</div>
@endsection
