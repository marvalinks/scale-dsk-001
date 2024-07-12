<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserModuleController extends Controller
{
    

    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->validate([
            'username' => 'required', 'password' => 'required'
        ]);
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('portal.dashboard');
        }
        $request->session()->flash('alert-danger', 'Error logging in');
        return redirect()->route('login');
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required', 'password' => 'required', 'name' => 'required'
        ]);
        
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function index(Request $request)
    {
        $users = User::latest()->get();
        return view('pages.users.index', compact('users'));
    }

}
