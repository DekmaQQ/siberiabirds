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
        $speciesStatuses = SpeciesStatus::all();

        return SpeciesStatusResource::collection($speciesStatuses);
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
        $speciesStatus = SpeciesStatus::findOrFail($id);
        
        return new SpeciesStatusResource($speciesStatus);
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
        SpeciesStatus::destroy($id);
    }
}
