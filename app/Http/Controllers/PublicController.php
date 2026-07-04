<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PublicController extends Controller
{
 public function index()
    {
        $cities = City::where('is_active', true)->get();
        return view('welcome', compact('cities'));
    }

    public function show($id)
    {
        $city = City::with(['places' => function($query) {
            $query->where('is_active', true);
        }])->where('is_active', true)->findOrFail($id);

        return view('city_detail', compact('city'));
    }
}
