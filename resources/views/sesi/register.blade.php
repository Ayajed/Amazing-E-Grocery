@extends('layout/aplikasi')

@section('title', 'Register')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <a href="/" class="btn btn-secondary" style="margin-bottom: 10px;">Kembali</a>
        <h1>Register</h1>
        <form action="/sesi/create" method="post">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" value="{{ Session::get('first_name') }}" name="first_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" value="{{ Session::get('last_name') }}" name="last_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role [Admin | Member]</label>
                <input type="text" value="{{ Session::get('role') }}" name="role" class="form-control">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender [Male | Female]</label>
                <input type="text" value="{{ Session::get('gender') }}" name="gender" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit"
                class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection
