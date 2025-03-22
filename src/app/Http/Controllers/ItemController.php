<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'explorer_id' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $item = Item::create($validated);

        return response()->json([
            'message' => 'Item created successfully',
            'item ' => $item,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        $item->update($request->all());

        return response()->json([
            'message' => 'Item updated successfully',
            'item' => $item,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
