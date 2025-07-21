<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Agent;

class PropertyAgentController extends Controller
{
    // 担当者を物件に割り当て
    public function assign(Request $request, Property $property)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id'
        ]);
        $property->agents()->syncWithoutDetaching([$request->agent_id]);
        return response()->json(['success' => true]);
    }

    // 物件から担当者の割り当てを解除
    public function unassign(Request $request, Property $property)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id'
        ]);
        $property->agents()->detach($request->agent_id);
        return response()->json(['success' => true]);
    }
}