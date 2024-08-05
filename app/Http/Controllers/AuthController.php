<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\Users;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) : UserResource{
        $data = $request->validated();
        $user = Users::where("email", $data['email'])->first(); 
        if(!$user || !Hash::check($data['password'], $user->password)){
            throw new HttpResponseException(response([
                "errors" => [
                    "email" => [
                        "email or password wrong"
                    ]
                ]
            ], 400));
        }
        // $user->token = Str::uuid()->toString();
        $user->save();
        return new UserResource($user);
    }
}
