<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirdOrder;
use App\Http\Resources\BirdOrderResource;
use App\Support\StringHelper;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('create', BirdOrder::class);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_orders',
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_orders',
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdOrder = BirdOrder::create($validated);

        return response()->json([
            'message' => 'Bird order created successfully.',
            'data' => new BirdOrderResource($birdOrder),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BirdOrder $birdOrder)
    {
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
    public function update(Request $request, BirdOrder $birdOrder)
    {
        Gate::authorize('update', $birdOrder);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[а-яА-ЯёЁ\s\-]+$/u',
                'unique:bird_orders,title,' . $birdOrder->id,
            ],
            'title_latin' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u',
                'unique:bird_orders,title_latin,' . $birdOrder->id,
            ],
            'description' => 'nullable|string',
        ]);

        $validated['title'] = StringHelper::ucfirstMb(mb_strtolower($validated['title'], 'UTF-8'));
        $validated['title_latin'] = ucfirst(mb_strtolower($validated['title_latin'], 'UTF-8'));
        $validated['description'] = $validated['description'] 
            ? StringHelper::ucfirstMb($validated['description'])
            : null;

        $birdOrder->update($validated);

        return response()->json([
            'message' => 'Bird order updated successfully.',
            'data' => new BirdOrderResource($birdOrder),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BirdOrder $birdOrder)
    {
        Gate::authorize('delete', $birdOrder);

        // Check for related records
        if ($birdOrder->birdFamilies()->exists()) {
            return response()->json([
                'message' => 'Cannot delete bird order because it has related families.'
            ], 422);
        }

        $birdOrder->delete();

        return response()->json([
            'message' => 'Bird order deleted successfully.'
        ], 200);
    }
}
