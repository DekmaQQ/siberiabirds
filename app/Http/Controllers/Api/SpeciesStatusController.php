<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpeciesStatus;
use App\Http\Resources\SpeciesStatusResource;

class SpeciesStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species_statuses = SpeciesStatus::all();

        return SpeciesStatusResource::collection($species_statuses);
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
        $species_status = SpeciesStatus::findOrFail($id);
        
        return new SpeciesStatusResource($species_status);
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
