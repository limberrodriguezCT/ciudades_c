<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Event;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::where('is_active', true)->get();
        $events = Event::where('event_date', '>=', now())->orderBy('event_date', 'asc')->take(6)->get();
        $services = Service::where('is_active', true)->latest()->take(6)->get();

        return view('welcome', compact('cities', 'events', 'services'));
    }
}