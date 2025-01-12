<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Функция для аутентицикации пользователя. 
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // при успешной аутентификации, удаляем старые токены пользователя
        $user->tokens()->where('name', 'auth_token')->delete();
        // создаём новый токен
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Successful login',
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }
}
