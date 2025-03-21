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
        //
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
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        Explorer::create($request->all());

        return response()->json([
            'message' => 'Explorer created successfully',
        ]);
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
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $explorer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Explorer $explorer)
    {
        //
    }
}
