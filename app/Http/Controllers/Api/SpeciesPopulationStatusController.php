<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpeciesPopulationStatus;
use App\Http\Resources\SpeciesPopulationStatusResource;
use App\Support\StringHelper;
use Illuminate\Support\Facades\Gate;

class SpeciesPopulationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speciesPopulationStatuses = SpeciesPopulationStatus::all();

        return SpeciesPopulationStatusResource::collection($speciesPopulationStatuses);
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
        Gate::authorize('create', SpeciesPopulationStatus::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s]+$/u',
                'unique:species_population_statuses',
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = mb_strtolower($validated['title'], 'UTF-8');
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $speciesPopulationStatus = SpeciesPopulationStatus::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Species population status created successfully.',
            'data' => new SpeciesPopulationStatusResource($speciesPopulationStatus),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SpeciesPopulationStatus $speciesPopulationStatus)
    {        
        return new SpeciesPopulationStatusResource($speciesPopulationStatus);
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
    public function update(Request $request, SpeciesPopulationStatus $speciesPopulationStatus)
    {
        Gate::authorize('update', $speciesPopulationStatus);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s]+$/u',
                'unique:species_population_statuses,title,' . $speciesPopulationStatus->id,
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = mb_strtolower($validated['title'], 'UTF-8');
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $speciesPopulationStatus->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Species population status updated successfully.',
            'data' => new SpeciesPopulationStatusResource($speciesPopulationStatus),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpeciesPopulationStatus $speciesPopulationStatus)
    {
        Gate::authorize('delete', $speciesPopulationStatus);
        $speciesPopulationStatus->delete();

        return response()->json([
            'message' => 'Species population status deleted successfully.'
        ], 200);
    }
}
