<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdDetection;
use App\Http\Resources\BirdDetectionResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
        Gate::authorize('create', BirdDetection::class);
        $currentUser = $request->user('sanctum');

        $validated = $request->validate([
            'bird_species_id' => 'required|exists:bird_species,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'detection_timestamp' => [
                'required',
                'date',
                Rule::unique('bird_detections')->where(function ($query) use ($request) {
                    return $query->where('bird_species_id', $request->bird_species_id)
                                 ->where('latitude', $request->latitude)
                                 ->where('longitude', $request->longitude);
                })
            ],
            'comment' => 'nullable|string',
        ], [
            'detection_timestamp.unique' => 'The detection for this bird species at the given location and time already exists.',
        ]);

        $birdDetection = BirdDetection::create([
            'agent_id' => $currentUser->id,
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
        $birdDetection = BirdDetection::findOrFail($id);
        Gate::authorize('update', $birdDetection);

        $validated = $request->validate([
            'bird_species_id' => 'required|exists:bird_species,id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'detection_timestamp' => [
                'required',
                'date',
                Rule::unique('bird_detections')->where(function ($query) use ($request) {
                    return $query->where('bird_species_id', $request->bird_species_id)
                                 ->where('latitude', $request->latitude)
                                 ->where('longitude', $request->longitude);
                })
            ],
            'comment' => 'nullable|string',
            'confirmed' => 'nullable|boolean'
        ], [
            'detection_timestamp.unique' => 'The detection for this bird species at the given location and time already exists.',
        ]);

        $birdDetection->update([
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
        $birdDetection = BirdDetection::findOrFail($id);
        Gate::authorize('delete', $birdDetection);
        $birdDetection->destroy();
    }
}
