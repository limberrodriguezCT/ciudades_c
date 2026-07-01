<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;

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
        City::create($request->validated());
        return redirect()->route('admin.cities.index')->with('success', 'Ciudad registrada correctamente.');
    }
    public function edit(City $city)
{
    return view('admin.cities.edit', compact('city'));
}

public function update(CityRequest $request, City $city)
{
    $city->update($request->validated());
    return redirect()->route('admin.cities.index')->with('success', 'Ciudad actualizada correctamente.');
    

}
}
