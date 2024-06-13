<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            session(["token" => auth()->user()->createToken($request->username)->plainTextToken]);
            return redirect()->route('dashboard');
        } else {
            return redirect('login')->withErrors('Invalid Credentials');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('username', $request->username);

        $request->validate([
            'name' => 'required|min:10',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Minimal nama yang diizinkan adalah 10 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah pernah digunakan, silahkan pilih Username yang lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password yang diizinkan adalah 6 karakter',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.form')->with('success', $user->name . ' berhasil login');
    }
}
