<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   public function index()
    {
       
        $cities = City::where('is_active', '=', true, 'and')->get();
        
        return view('welcome', compact('cities'));
    }
}
