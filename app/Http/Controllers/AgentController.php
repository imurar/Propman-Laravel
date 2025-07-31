<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return Inertia::render('Agents/Index', compact('agents'));
    }

    public function create()
    {
        return Inertia::render('Agents/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
        ]);
        Agent::create($validated);
        return redirect()->route('agents.index')->with('success', '担当者を登録しました');
    }

    public function show(Agent $agent)
    {
        return Inertia::render('Agents/Show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return Inertia::render('Agents/Edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email,' . $agent->id,
        ]);
        $agent->update($validated);
        return redirect()->route('agents.index')->with('success', '担当者を更新しました');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', '担当者を削除しました');
    }
}