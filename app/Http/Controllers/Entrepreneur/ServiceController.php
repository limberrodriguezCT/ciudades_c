<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\City;
use App\Http\Requests\Entrepreneur\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('user_id', Auth::id())->with('city')->get();
        return view('entrepreneur.services.index', compact('services'));
    }

    public function create()
    {
        $cities = City::where('is_active', true)->get();
        return view('entrepreneur.services.create', compact('cities'));
    }

    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('entrepreneur.services.index')->with('success', 'Servicio registrado exitosamente.');
    }

    public function edit(Service $service)
    {
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Acceso denegado.');
        }

        $cities = City::where('is_active', true)->get();
        return view('entrepreneur.services.edit', compact('service', 'cities'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Acceso denegado.');
        }

        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image_path')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('entrepreneur.services.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Service $service)
    {
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Acceso denegado.');
        }

        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }

        $service->delete();

        return redirect()->route('entrepreneur.services.index')->with('success', 'Servicio eliminado del sistema.');
    }
}