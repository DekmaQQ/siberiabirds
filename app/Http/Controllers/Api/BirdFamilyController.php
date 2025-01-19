<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdFamily;
use App\Http\Resources\BirdFamilyResource;
use Illuminate\Support\Facades\Gate;
use App\Support\StringHelper;

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
        Gate::authorize('create', BirdFamily::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_families',
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_families',
            ],
            'description' => 'nullable|string',
            'bird_order_id' => 'required|exists:bird_orders,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdFamily = BirdFamily::create($validated);

        return response()->json([
            'message' => 'Bird family created successfully.',
            'data' => new BirdFamilyResource($birdFamily)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BirdFamily $birdFamily)
    {
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
    public function update(Request $request, BirdFamily $birdFamily)
    {
        Gate::authorize('update', $birdFamily);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_families,title,' . $birdFamily->id,
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_families,title_latin,' . $birdFamily->id,
            ],
            'description' => 'nullable|string',
            'bird_order_id' => 'required|exists:bird_orders,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdFamily->update($validated);

        return response()->json([
            'message' => 'Bird family updated successfully.',
            'data' => new BirdFamilyResource($birdFamily)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BirdFamily $birdFamily)
    {
        Gate::authorize('delete', $birdFamily);

        // Check for related records
        if ($birdFamily->birdGenera()->exists()) {
            return response()->json([
                'message' => 'Cannot delete bird family with related genera records.'
            ], 422);
        }

        $birdFamily->delete();

        return response()->json([
            'message' => 'Bird family deleted successfully.'
        ], 200);
    }
}
