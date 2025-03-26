<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Itens = Item::all();

        return response()->json($Itens);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'explorer_id' => 'required',
            'description' => 'required',
            'value' => 'required',
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

    public function trade(Request $request)
    {
        $request->validate([
            'new_explorer_id' => 'required|exists:explorers,id',
            'new_item_id' => 'required|exists:items,id',
            'new_explorer_id2' => 'required|exists:explorers,id',
            'new_item_id2' => 'required|exists:items,id',
        ]);

        $explorer = Explorer::findOrFail($request->new_explorer_id);
        $item = Item::findOrFail($request->new_item_id);
        $explorer2 = Explorer::findOrFail($request->new_explorer_id2);
        $item2 = Item::findOrFail($request->new_item_id2);

        $ItemTotal = 0;
        $ItemTotal2 = 0;

        $ItemTotal = $item->value;
        $ItemTotal2 = $item2->value;


        if ($ItemTotal == $ItemTotal2) {
            $item->update([
                'explorer_id' => $request->new_explorer_id2,
            ]);

            $item2->update([
                'explorer_id' => $request->new_explorer_id,
            ]);

            return response()->json([
                'message' => 'Item traded successfully',
                'item' => $item,
            ]);
        } else {
            return response()->json([
                'message' => 'value not compatible',
            ]);
        }
        /**
         * Remove the specified resource from storage.
         */
    }
}
