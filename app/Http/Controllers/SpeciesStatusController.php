<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpeciesStatus;
use App\Http\Resources\SpeciesStatusResource;
use App\Http\Resources\SpeciesStatusCollection;

class SpeciesStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species_statuses = SpeciesStatus::all();

        return new SpeciesStatusCollection($species_statuses);
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
