<?php

namespace App\Http\Controllers;

use App\Models\RoleSelection;
use Illuminate\Http\Request;

class RoleSelectionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'in:researcher,advisor,policymaker,farmer_forester,other'],
        ]);

        RoleSelection::create([
            'role'       => $validated['role'],
            'session_id' => $request->session()->getId(),
        ]);

        return response()->json(['success' => true]);
    }
}
