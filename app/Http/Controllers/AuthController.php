<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showLoginForm() {
        return view('auth.login');
    }
    public function showRegisterForm() {
        return view('auth.register');
    }
    public function loginProcess(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)) {
            Session::flash('success', 'Вы вошли!');
            if(auth()->user()->role !== 'employee') {
                return response()->json(['redirect_url' => route('admin')]);
            } else {
                return response()->json(['redirect_url' => route('applications')]);
            }
        }
        return response()->json(['success' => 'Не удалось войти']);
    }
    public function registerProcess(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|min:10',
            'email' => 'required|unique:users|email:rfc,dns|max:30',
            'password' => 'required|confirmed|min:6|max:20'
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        if ($user) {

            Auth::login($user);
        }
        Session::flash('success', 'Вы зарегистрировались');
        return response()->json(['redirect_url' => route('showCreateApplication')]);
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended()->with('success', 'Вы вышли из личного кабинета');
    }
}
