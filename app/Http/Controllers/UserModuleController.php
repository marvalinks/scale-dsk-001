<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
