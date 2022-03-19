<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|email|max:255|unique:mahasiswa',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string',
            'ttl' => 'required|date',
            'gender' => 'required|string|max:1',
            'prodi' => 'required|string',
            'no_handphone' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'users_id' => $user->id,
            'nama' => $user->name,
            'alamat' => $user->alamat,
            'ttl' => $user->ttl,
            'gender' => $user->gender,
            'prodi' => $user->no_handphone,
        ]);
        return response()->json([
            'data' => $mahasiswa,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $mahasiswa = $user->mahasiswa();

        return response()->json([
            'data' => $mahasiswa,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
