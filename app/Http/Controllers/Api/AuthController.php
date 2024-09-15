<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\PegawaiResource;
use App\Http\Resources\UserResource;
use App\Models\DataPegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'data' => new UserResource($user)
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid username or password'
            ], 401);
        }
    }

    public function getUser(Request $request)
    {
        $user = $request->user();
        $pegawai = DataPegawai::where('nik', $user->nik)->first();

        return new PegawaiResource($pegawai);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successfully'
        ]);
    }
}
