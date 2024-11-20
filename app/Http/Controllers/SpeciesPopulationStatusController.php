<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpeciesPopulationStatus;
use App\Http\Resources\SpeciesPopulationStatusResource;

class SpeciesPopulationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species_population_statuses = SpeciesPopulationStatus::all();

        return SpeciesPopulationStatusResource::collection($species_population_statuses);
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
        $species_status_population = SpeciesPopulationStatus::findOrFail($id);
        
        return new SpeciesPopulationStatusResource($species_status_population);
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
