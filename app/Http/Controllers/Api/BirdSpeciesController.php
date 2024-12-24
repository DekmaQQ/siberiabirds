<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdSpecies;
use App\Http\Resources\BirdSpeciesResource;
use App\Support\StringHelper;
use Illuminate\Support\Facades\Gate;
#TODO: убирать лишние пробелы
class BirdSpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birdSpecies = BirdSpecies::all();

        return BirdSpeciesResource::collection($birdSpecies);
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
        Gate::authorize('create', BirdSpecies::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_species',
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_species',
            ],
            'description' => 'nullable|string',
            'distribution' => 'nullable|string',
            'migration' => 'nullable|string',
            'habitat' => 'nullable|string',
            'bird_genus_id' => 'required|exists:bird_genera,id',
            'species_population_status_id' => 'nullable|exists:species_population_statuses,id',
            'species_status_ids' => 'nullable|array',
            'species_status_ids.*' => 'exists:species_statuses,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description']
            ? StringHelper::ucfirstMb($validated['description'])
            : null;
        $validated['distribution'] = $validated['distribution']
            ? StringHelper::ucfirstMb($validated['distribution'])
            : null;
        $validated['migration'] = $validated['migration']
            ? StringHelper::ucfirstMb($validated['migration'])
            : null;
        $validated['habitat'] = $validated['habitat']
            ? StringHelper::ucfirstMb($validated['habitat'])
            : null;

        $birdSpecies = BirdSpecies::create($validated);

        if (isset($validated['species_status_ids'])) {
            $birdSpecies->speciesStatuses()->sync($validated['species_status_ids']);
        }

        return response()->json([
            'message' => 'Bird species created successfully.',
            'data' => new BirdSpeciesResource($birdSpecies),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $birdSpecies = BirdSpecies::findOrFail($id);

        return new BirdSpeciesResource($birdSpecies);
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
        $birdSpecies = BirdSpecies::findOrFail($id);
        Gate::authorize('update', $birdSpecies);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_species,title,' . $id,
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_species,title_latin,' . $id,
            ],
            'description' => 'nullable|string',
            'distribution' => 'nullable|string',
            'migration' => 'nullable|string',
            'habitat' => 'nullable|string',
            'bird_genus_id' => 'required|exists:bird_genera,id',
            'species_population_status_id' => 'nullable|exists:species_population_statuses,id',
            'species_status_ids' => 'nullable|array',
            'species_status_ids.*' => 'exists:species_statuses,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description']
            ? StringHelper::ucfirstMb($validated['description'])
            : null;
        $validated['distribution'] = $validated['distribution']
            ? StringHelper::ucfirstMb($validated['distribution'])
            : null;
        $validated['migration'] = $validated['migration']
            ? StringHelper::ucfirstMb($validated['migration'])
            : null;
        $validated['habitat'] = $validated['habitat']
            ? StringHelper::ucfirstMb($validated['habitat'])
            : null;

        $birdSpecies->update($validated);

        if (isset($validated['species_status_ids'])) {
            $birdSpecies->speciesStatuses()->sync($validated['species_status_ids']);
        }

        return response()->json([
            'message' => 'Bird species updated successfully.',
            'data' => new BirdSpeciesResource($birdSpecies),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $birdSpecies = BirdSpecies::findOrFail($id);
        Gate::authorize('delete', $birdSpecies);
        $birdSpecies->destroy();
    }
}
