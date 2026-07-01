<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'map_coordinates' => 'nullable|string',
            'is_active' => 'boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la ciudad es un dato obligatorio para el registro.',
            'name.string' => 'El nombre debe poseer un formato de texto válido.',
            'name.max' => 'El nombre de la ciudad no puede exceder los 100 caracteres permitidos.',
            'description.string' => 'La descripción ingresada debe contener un formato de texto válido.',
            'map_coordinates.string' => 'Las coordenadas del mapa deben ingresarse en formato de texto.',
            'is_active.boolean' => 'El estado de la ciudad presenta un formato no reconocido por el sistema.',
            'cover_image.image' => 'El archivo subido debe ser una imagen válida.',
            'cover_image.mimes' => 'La fotografía de portada debe estar en formato JPEG, PNG o JPG.',
            'cover_image.max' => 'El tamaño de la fotografía de portada no debe superar los 2MB.',
        ];
    }
}