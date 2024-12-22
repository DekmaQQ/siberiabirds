<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdFamily;
use App\Http\Resources\BirdFamilyResource;

class BirdFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birdFamilies = BirdFamily::all();

        return BirdFamilyResource::collection($birdFamilies);
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
    public function show(string $id)
    {
        $birdFamily = BirdFamily::findOrFail($id);

        return new BirdFamilyResource($birdFamily);
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
        BirdFamily::destroy($id);
    }
}
