<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = \App\Models\Motor::all(); 

        return view('motors.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:motors,reference', // La référence doit être unique
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        \App\Models\Motor::create($request->all());

        return redirect()->route('moteurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $motor = \App\Models\Motor::findOrFail($id);
        return view('motors.edit', compact('motor'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $motor = \App\Models\Motor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:motors,reference,' . $motor->id, 
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $motor->update($request->all());

        return redirect()->route('moteurs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $motor = \App\Models\Motor::findOrFail($id);
        $motor->delete();
        return redirect()->route('moteurs.index');
    }
}
