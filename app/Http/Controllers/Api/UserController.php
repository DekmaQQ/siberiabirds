<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'user_role_id' => 'required|exists:user_roles,id',
        ]);

        $currentUser = $request->user('sanctum');
        $currentUserRole = $currentUser->userRole->title;
        $currentUserId = $currentUser->id;
        $role = UserRole::find($validated['user_role_id']);

        if ($currentUserRole == 'admin') {
            // Если текущий пользователь admin, то он может создавать только tutor и admin
            if (!in_array($role->title, ['tutor', 'admin'])) {
                return response()->json(['message' => 'Admin can only create users with role tutor or admin'], 403);
            }
        } elseif ($currentUserRole == 'tutor') {
            // Если текущий пользователь tutor, то он может создавать только agent
            if ($role->title != 'agent') {
                return response()->json(['message' => 'Tutor can only create users with role agent'], 403);
            }
        } else {
            // Если текущий пользователь не tutor и не admin
            return response()->json(['message' => 'You are not authorized to create user'], 403);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'creator_id' => $currentUserId,
            'user_role_id' => $validated['user_role_id'],
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view', $user);

        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'user_role_id' => 'nullable|exists:user_roles,id',
        ]);

        $currentUser = $request->user('sanctum');
        $currentUserRole = $currentUser->userRole->title;

        if ($request->has('user_role_id')) {
            if ($currentUserRole === 'admin') {
                $role = UserRole::find($request->user_role_id);
                if (!in_array($role->title, ['admin', 'tutor'])) {
                    return response()->json(['message' => 'Admin can only assign roles admin or tutor'], 403);
                }
            } else {
                return response()->json(['message' => 'You cannot change user role'], 403);
            }
        }

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully.',
            'data' => new UserResource($user),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.'
        ], 200);
    }
}
