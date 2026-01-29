<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Support\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->refresh();

        return Response::success(new UserResource($user), 201);
    }

    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->validated())) {
            return Response::error(401, "Noto'g'ri ma'lumotlar kiritildi.", isFriendly: true);
        }

        $user = $request->user();
        $token = $user->createToken('api')->plainTextToken;

        return Response::success([
            'token' => $token,
            'user' => new UserResource($user)
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return Response::success(['message' => "Tizimdan chiqdingiz"]);
    }

    public function me(Request $request)
    {
        return Response::success(new UserResource($request->user()));
    }
}
