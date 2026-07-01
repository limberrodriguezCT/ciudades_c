<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(CityRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('cities', 'public');
        }

        City::create($data);

        return redirect()->route('admin.cities.index')->with('success', 'Ciudad registrada correctamente.');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            if ($city->image_path) {
                Storage::disk('public')->delete($city->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('cities', 'public');
        }

        $city->update($data);

        return redirect()->route('admin.cities.index')->with('success', 'Ciudad actualizada correctamente.');
    }
    
    public function destroy(City $city)
    {
        if ($city->image_path) {
            Storage::disk('public')->delete($city->image_path);
        }
        
        City::destroy($city->id);
        
        return redirect()->route('admin.cities.index')->with('success', 'Ciudad eliminada correctamente del sistema.');
    }
}