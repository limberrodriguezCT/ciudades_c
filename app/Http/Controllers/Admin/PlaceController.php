<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\City;
use App\Http\Requests\PlaceRequest;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index()
    {
       $places = Place::with('city')->get(); 
       return view('admin.places.index', compact('places'));
    }

    public function create()
    {
        $cities = City::where('is_active', true)->get();
        return view('admin.places.create', compact('cities'));
    }

    public function store(PlaceRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('places', 'public');
        }

        Place::create($data);

        return redirect()->route('admin.places.index')->with('success', 'Lugar turístico registrado correctamente.');
    }

    public function edit(Place $place)
    {
        $cities = City::where('is_active', true)->get();
        return view('admin.places.edit', compact('place', 'cities'));
    }

    public function update(PlaceRequest $request, Place $place)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            if ($place->image_path) {
                Storage::disk('public')->delete($place->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('places', 'public');
        }

        $place->update($data);

        return redirect()->route('admin.places.index')->with('success', 'Lugar turístico actualizado correctamente.');
    }
    
    public function destroy(Place $place)
    {
        if ($place->image_path) {
            Storage::disk('public')->delete($place->image_path);
        }
        
        $place->delete();
        
        return redirect()->route('admin.places.index')->with('success', 'Lugar turístico eliminado correctamente del sistema.');
    }
}