<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Agent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('agents')->get();
        return Inertia::render('Properties/Index', [
            'properties' => $properties,
        ]);
    }

    public function create()
    {
        $agents = Agent::all();
        return Inertia::render('Properties/Create', [
            'agents' => $agents,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        Property::create($validated);
        return redirect()->route('properties.index')->with('success', '物件を登録しました');
    }

    public function show(Property $property)
    {
        $property->load('agents');
        return Inertia::render('Properties/Show', [
            'property' => $property,
        ]);
    }

    public function edit(Property $property)
    {
        $agents = Agent::all();
        return Inertia::render('Properties/Edit', [
            'property' => $property,
            'agents' => $agents,
        ]);
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        $property->update($validated);
        return redirect()->route('properties.index')->with('success', '物件を更新しました');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', '物件を削除しました');
    }
}