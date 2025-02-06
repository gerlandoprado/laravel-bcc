<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('vehicles.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        $vehicle->save();
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo cadastrado com sucesso!');      
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return view('vehicles.show')->with('vehicle', $vehicle);
        } else {
            return view('vehicles.show')->with('msg', 'Veículo não encontrado!');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return view('vehicles.edit')->with('vehicle', $vehicle);
        } else {
            $vehicles = Vehicle::all();            
            return view('vehicles.index')->with('vehicles', $vehicles)
                ->with('msg', 'Veículo não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        $vehicle->save();
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', "Veículo excluído com sucesso!");
    }
}
