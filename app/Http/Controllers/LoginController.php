<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $request->authenticate();
        return redirect('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::regenerate();
        return redirect('/login');
    }
}
