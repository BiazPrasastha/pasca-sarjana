<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        return redirect(route('dashboard.index'));
    }

    public function destroy()
    {
        auth()->guard('web')->logout();

        return redirect(route('auth.login'));
    }
}
