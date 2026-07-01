<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'city_id.required' => 'Debe seleccionar una ciudad para asignar este lugar.',
            'city_id.exists' => 'La ciudad seleccionada no es válida en el sistema.',
            'name.required' => 'El nombre del lugar turístico es obligatorio.',
            'name.string' => 'El nombre debe poseer un formato de texto válido.',
            'name.max' => 'El nombre no puede exceder los 100 caracteres.',
            'description.string' => 'La descripción debe contener un formato de texto válido.',
            'image_path.image' => 'El archivo subido debe ser una imagen válida.',
            'image_path.mimes' => 'La fotografía debe estar en formato JPEG, PNG o JPG.',
            'image_path.max' => 'El tamaño de la fotografía no debe superar los 2MB.',
            'is_active.boolean' => 'El estado del lugar presenta un formato no reconocido.',
        ];
    }
}