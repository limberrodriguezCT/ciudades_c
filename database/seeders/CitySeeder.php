<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $cities = [
            ['name' => 'Estelí', 'description' => 'Ciudad del muralismo, el tabaco y un vibrante comercio que impulsa el talento local.'],
            ['name' => 'León', 'description' => 'Cuna de poetas, rica en patrimonio histórico, arquitectónico y tradiciones universitarias.'],
            ['name' => 'Nagarote', 'description' => 'Destacada por su limpieza, el quesillo y sus hermosas vistas hacia el lago Xolotlán.'],
            ['name' => 'Managua', 'description' => 'Capital dinámica, centro de innovación, arte urbano y constante crecimiento comercial.'],
            ['name' => 'Masaya', 'description' => 'Capital del folclore nicaragüense, cuna de artesanos y tradiciones ancestrales vivas.'],
            ['name' => 'Granada', 'description' => 'La Gran Sultana, joya colonial, poesía y destino turístico por excelencia.'],
            ['name' => 'San Juan de Oriente', 'description' => 'Pueblo de artesanos, famoso mundialmente por su exquisita y laboriosa cerámica precolombina.'],
            ['name' => 'Juigalpa', 'description' => 'Tierra de ganadería, cultura productiva y tradiciones en el corazón de Chontales.'],
            ['name' => 'Matagalpa', 'description' => 'Perla del Septentrión, cuna del café, clima fresco y exuberante naturaleza montañosa.'],
            ['name' => 'Bluefields', 'description' => 'Capital del Caribe Sur, ritmo del Palo de Mayo, multiculturalidad y rica gastronomía.'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
