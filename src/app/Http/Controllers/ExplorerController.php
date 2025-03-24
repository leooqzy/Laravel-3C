<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $explorers = Explorer::all();

        return response()->json($explorers);
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
            'name' => 'required',
            'age' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $explorer = Explorer::create($validated);

        return response()->json([
            'message' => 'Explorer created successfully',
            'explorer ' => $explorer,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Explorer $explorer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Explorer $explorer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Explorer $explorer)
    {
        $validated =$request->validate([
            'latitude' => 'sometimes|string',
            'longitude' => 'sometimes|string',
        ]);

        $explorer->update($validated);

        return response()->json([
            'message' => 'Explorer updated successfully',
            'explorer ' => $explorer,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Explorer $explorer)
    {
        //
    }
}
