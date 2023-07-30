<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            // Generate access token for the registered user
            $token = $user->createToken('api_token')->plainTextToken;
    
            return response()->json(['token' => $token], 201);
        } catch (ValidationException $e) {
            // Validation error occurred, email is already registered
            return response()->json(['error' => 'Email is already registered.'], 422);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function verifyToken(Request $request)
    {
        // Verifikasi token dengan Sanctum
        if (Auth::guard('sanctum')->check()) {
            // Jika token valid, kembalikan informasi pengguna terotentikasi
            $user = Auth::guard('sanctum')->user();
            return response()->json($user);
        } else {
            // Jika token tidak valid, berikan response error
            return response()->json(['message' => 'Invalid token.'], 401);
        }
    }
}
