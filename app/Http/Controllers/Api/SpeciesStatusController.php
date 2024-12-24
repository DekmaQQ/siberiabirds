<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpeciesStatus;
use App\Http\Resources\SpeciesStatusResource;
use App\Support\StringHelper;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('create', SpeciesStatus::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s]+$/u',
                'unique:species_statuses',
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = mb_strtolower($validated['title'], 'UTF-8');
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $speciesStatus = SpeciesStatus::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Species status created successfully.',
            'data' => new SpeciesStatusResource($speciesStatus),
        ], 201);
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
        $speciesStatus = SpeciesStatus::findOrFail($id);
        Gate::authorize('update', $speciesStatus);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s]+$/u',
                'unique:species_statuses,title,' . $id,
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = mb_strtolower($validated['title'], 'UTF-8');
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $speciesStatus->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Species status updated successfully.',
            'data' => new SpeciesStatusResource($speciesStatus),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speciesStatus = SpeciesStatus::findOrFail($id);
        Gate::authorize('delete', $speciesStatus);
        $speciesStatus->destroy();
    }
}
