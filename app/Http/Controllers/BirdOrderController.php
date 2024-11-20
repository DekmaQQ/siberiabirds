<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BirdOrder;
use App\Http\Resources\BirdOrderResource;
use App\Http\Resources\BirdOrderCollection;

class BirdOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bird_orders = BirdOrder::all();

        return new BirdOrderCollection($bird_orders);
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
        $bird_order = BirdOrder::findOrFail($id);

        return new BirdOrderResource($bird_order);
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
