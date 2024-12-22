<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdOrder;
use App\Http\Resources\BirdOrderResource;

class BirdOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birdOrders = BirdOrder::all();

        return BirdOrderResource::collection($birdOrders);
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
        $birdOrder = BirdOrder::findOrFail($id);

        return new BirdOrderResource($birdOrder);
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
        BirdOrder::destroy($id);
    }
}
