<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location_details' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'city_id.required' => 'Debe seleccionar una ciudad para asignar este evento.',
            'city_id.exists' => 'La ciudad seleccionada no es válida en el sistema.',
            'title.required' => 'El título del evento cultural es obligatorio.',
            'title.string' => 'El título debe poseer un formato de texto válido.',
            'title.max' => 'El título no puede exceder los 150 caracteres.',
            'description.string' => 'La descripción debe contener un formato de texto válido.',
            'event_date.required' => 'La fecha y hora del evento son datos obligatorios.',
            'event_date.date' => 'Ingrese una fecha y hora válidas.',
            'location_details.max' => 'Los detalles de ubicación no pueden exceder los 255 caracteres.',
            'image_path.image' => 'El archivo subido debe ser una imagen válida.',
            'image_path.mimes' => 'La fotografía promocional debe estar en formato JPEG, PNG o JPG.',
            'image_path.max' => 'El tamaño de la fotografía no debe superar los 2MB.',
        ];
    }
}