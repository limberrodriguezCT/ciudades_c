<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'map_coordinates', 'cover_image', 'is_active', 'image_path'
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
