<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\City;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['city', 'user'])->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $cities = City::where('is_active', true)->get();
        return view('admin.events.create', compact('cities'));
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id(); // Guarda el ID del administrador actual

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Evento cultural registrado correctamente.');
    }

    public function edit(Event $event)
    {
        $cities = City::where('is_active', true)->get();
        return view('admin.events.edit', compact('event', 'cities'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();

        if ($request->hasFile('image_path')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Evento cultural actualizado correctamente.');
    }
    
    public function destroy(Event $event)
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        
        $event->delete();
        
        return redirect()->route('admin.events.index')->with('success', 'Evento cultural eliminado correctamente del sistema.');
    }
}