<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validatedFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validatedFields)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details'
            ], 422);
        }

        $user = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }
}
