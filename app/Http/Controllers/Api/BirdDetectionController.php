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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BirdDetection::destroy($id);
    }
}
