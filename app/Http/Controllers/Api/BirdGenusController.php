<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdGenus;
use App\Http\Resources\BirdGenusResource;

class BirdGenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bird_genera = BirdGenus::all();

        return BirdGenusResource::collection($bird_genera);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $bird_genus = BirdGenus::findOrFail($id);

        return new BirdGenusResource($bird_genus);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
