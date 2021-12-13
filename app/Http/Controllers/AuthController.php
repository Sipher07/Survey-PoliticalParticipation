<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('account.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $valid = $this->attemptLogin($credentials);

        if ($valid['success']) {
            $request->session()->regenerate();
            $request->session()->put('user', 'Administrator');

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'error' => $valid['message'],
        ]);
    }

    public function attemptLogin(array $credentials = [])
    {
        if($credentials['username'] == "admin" && $credentials['password'] == "password")
        {
            return [
                'success' => true
            ];
        }
        else
        {
            return [
                'success' => false
            ];
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}