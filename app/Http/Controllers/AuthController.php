<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\Users;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function login(): View
    {
        return view("login");
    }

    public function actionLogin(LoginRequest $request)
    {
        Log::info("Login attempt started");

        $data = $request->validated();
        $user = Users::where("email", $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            Log::warning('Invalid credentials for email: ' . $data['email']);
            return redirect()->back()->withErrors(['email' => 'Email or password is incorrect.']);
        }

        Log::info('User logged in: ' . $user->email);

        switch ($user->role_id) {
            case 1:
                return redirect("/HSP/home");
                break;
            case 2:
                return redirect("/lecture/home");
                break;
            case 3:
                return redirect("/college/home");
                break;
            default:
                return redirect("/college/home");

                break;
        }
    }
}
