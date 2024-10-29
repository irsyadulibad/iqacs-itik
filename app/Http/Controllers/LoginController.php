<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

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
}
