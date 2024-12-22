<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkToken(Request $request)
    {
        // Проверяем, есть ли токен в заголовке Authorization
        if ($request->bearerToken()) {
            // Получаем пользователя, соответствующего токену
            $user = Auth::guard('sanctum')->user();

            // Если пользователь найден, возвращаем его данные
            if ($user) {
                return response()->json([
                    'message' => 'Token is valid',
                    'user' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid token or token expired',
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'No token provided',
            ], 400);
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_role_id' => 'required|integer|exists:user_roles,id',
        ]);

        $creatorId = Auth::guard('sanctum')->user()->id;

        if (!$creatorId) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'creator_id' => $creatorId,
            'user_role_id' => $validated['user_role_id'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User successfully registered',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Successful login',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }
}
