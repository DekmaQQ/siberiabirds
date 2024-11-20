<?php

namespace App\Http\Controllers;

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
        $bird_detections = BirdDetection::all();

        return BirdDetectionResource::collection($bird_detections);
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
        $bird_detection = BirdDetection::findOrFail($id);

        return new BirdDetectionResource($bird_detection);
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
