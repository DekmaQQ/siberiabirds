<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Http\Resources\UserRoleResource;
use Illuminate\Support\Facades\Gate;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', UserRole::class);

        $userRoles = UserRole::all();

        return UserRoleResource::collection($userRoles);
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
        Gate::authorize('create', UserRole::class);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:user_roles,title', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $validated['title'] = strtolower($validated['title']);

        $userRole = UserRole::create([
            'title' => $validated['title'],
        ]);

        return response()->json([
            'message' => 'User role created successfully',
            'data' => new UserRoleResource($userRole),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        Gate::authorize('view', $userRole);

        return new UserRoleResource($userRole);
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
    public function update(Request $request, UserRole $userRole)
    {
        Gate::authorize('update', $userRole);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:user_roles,title,' . $userRole->id, 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $validated['title'] = strtolower($validated['title']);

        $userRole->update([
            'title' => $validated['title'],
        ]);

        return response()->json([
            'message' => 'User role updated successfully.',
            'data' => new UserRoleResource($userRole),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole)
    {
        Gate::authorize('delete', $userRole);
        $userRole->delete();

        return response()->json([
            'message' => 'User role deleted successfully.'
        ], 200);
    }
}
