<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Http\Resources\UserRoleResource;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show(string $id)
    {
        $userRole = UserRole::findOrFail($id);

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
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:user_roles,title,' . $id, 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $validated['title'] = strtolower($validated['title']);

        $userRole = UserRole::find($id);

        if (!$userRole) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $userRole->update([
            'title' => $validated['title'],
        ]);

        return response()->json([
            'message' => 'User role updated successfully',
            'data' => new UserRoleResource($userRole),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserRole::destroy($id);
    }
}
