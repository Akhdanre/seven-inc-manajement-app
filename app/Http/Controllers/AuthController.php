<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function login(): View
    {
        return view("login");
    }

    public function actionLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $redirectPath = match ($user->role_id) {
                1 => '/kaprodi/home',
                2 => '/dosen/home',
                3 => '/mahasiswa/home',
                default => '/'
            };

            return redirect($redirectPath);
        } else {
            Log::warning('Invalid credentials for email: ' . $credentials['email']);
            return redirect()->back()->withErrors(['email' => 'Email or password is incorrect.']);
        }
    }
}
