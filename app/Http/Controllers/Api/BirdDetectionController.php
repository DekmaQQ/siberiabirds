<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdDetection;
use App\Http\Resources\BirdDetectionResource;

class BirdDetectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birdDetections = BirdDetection::all();

        return BirdDetectionResource::collection($birdDetections);
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
            'agent_id' => 'required|exists:users,id',
            'bird_species_id' => 'required|exists:bird_species,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'detection_timestamp' => 'required|date',
            'comment' => 'nullable|string',
        ]);

        $birdDetection = BirdDetection::create([
            'agent_id' => $validated['agent_id'],
            'bird_species_id' => $validated['bird_species_id'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'detection_timestamp' => $validated['detection_timestamp'],
            'comment' => $validated['comment'],
        ]);

        return response()->json([
            'message' => 'Bird detection created successfully',
            'data' => new BirdDetectionResource($birdDetection),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $birdDetection = BirdDetection::findOrFail($id);

        return new BirdDetectionResource($birdDetection);
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
            'agent_id' => 'required|exists:users,id',
            'bird_species_id' => 'required|exists:bird_species,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'detection_timestamp' => 'required|date',
            'comment' => 'nullable|string',
            'confirmed' => 'nullable|boolean',
        ]);

        $birdDetection = BirdDetection::find($id);

        if (!$birdDetection) {
            return response()->json(['message' => 'Bird detection not found'], 404);
        }

        $birdDetection->update([
            'agent_id' => $validated['agent_id'],
            'bird_species_id' => $validated['bird_species_id'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'detection_timestamp' => $validated['detection_timestamp'],
            'comment' => $validated['comment'],
            'confirmed' => $validated['confirmed'] ?? $birdDetection->confirmed, // Сохраняем прежнее значение, если не передано новое
        ]);

        return response()->json([
            'message' => 'Bird detection updated successfully',
            'data' => new BirdDetectionResource($birdDetection),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BirdDetection::destroy($id);
    }
}
