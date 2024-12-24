<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdGenus;
use App\Http\Resources\BirdGenusResource;
use App\Support\StringHelper;

class BirdGenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birdGenera = BirdGenus::all();

        return BirdGenusResource::collection($birdGenera);
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
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_genera',
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_genera',
            ],
            'description' => 'nullable|string',
            'bird_family_id' => 'required|exists:bird_families,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdGenus = BirdGenus::create($validated);

        return response()->json([
            'message' => 'Bird genus created successfully.',
            'data' => new BirdGenusResource($birdGenus),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $birdGenus = BirdGenus::findOrFail($id);

        return new BirdGenusResource($birdGenus);
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
        $birdGenus = BirdGenus::findOrFail($id);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_genera,title,' . $id,
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_genera,title_latin,' . $id,
            ],
            'description' => 'nullable|string',
            'bird_family_id' => 'required|exists:bird_families,id',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdGenus->update($validated);

        return response()->json([
            'message' => 'Bird genus updated successfully.',
            'data' => new BirdGenusResource($birdGenus),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BirdGenus::destroy($id);
    }
}
