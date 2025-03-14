<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('api-token', ['*'], now()->addHours(24))->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Berhasil login!',
                'token' => $token,
                'data' => $user
            ]);
        }

        return response()->json([
            'message' => 'Email atau password salah!',
            'status' => false
        ], 401);
    }

    public function user()
    {
        $getUser = Auth::user();

        if (!$getUser) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan data user!',
            'data' => $getUser
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Berhasil logout!',
            'status' => true
        ]);
    }
}
