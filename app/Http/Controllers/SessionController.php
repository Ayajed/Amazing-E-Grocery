<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index() {
        return view("sesi/sesi");
    }

    function login(Request $request) {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)) {
            return redirect('bahan')->with('success', 'Berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }

    function register() {
        return view('sesi/register');
    }

    function create(Request $request) {
        Session::flash('first_name', $request->first_name);
        Session::flash('last_name', $request->last_name);
        Session::flash('role', $request->role);
        Session::flash('gender', $request->gender);
        Session::flash('email', $request->email);

        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'role' => 'required|in:Admin,Member',
            'gender' => 'required|in:Male,Female',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ],[
            'first_name.required' => 'Nama wajib diisi',
            'first_name.max' => 'Nama tidak boleh melebihi 25 karakter',
            'last_name.required' => 'Nama akhir wajib diisi',
            'last_name.max' => "Nama akhir tidak boleh melebihi 25 karakter",
            'role.required' => 'Role wajib diisi',
            'role.in' => 'Role antara Admin atau Member saja',
            'gender.required' => 'Gender wajib diisi',
            'gender.in' => 'Gender antara Male atau Female saja',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silakan masukkan email yang valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimum 8 karakter',
            'confirm_password.required' => 'Mohon konfirmasi password',
            'confirm_password.same' => 'Password tidak sama'
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role' => $request->role,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)) {
            return redirect('bahan')->with('success', Auth::user()->name . 'Berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }
}
