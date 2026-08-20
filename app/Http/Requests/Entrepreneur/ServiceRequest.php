<?php

namespace App\Http\Requests\Entrepreneur;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'contact_phone' => 'required|string|max:20',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'city_id.required' => 'Debe seleccionar una ciudad.',
            'city_id.exists' => 'La ciudad seleccionada no es válida en el sistema.',
            'title.required' => 'El título del servicio es obligatorio.',
            'title.max' => 'El título no puede exceder los 150 caracteres.',
            'description.required' => 'La descripción del servicio es obligatoria.',
            'price.numeric' => 'El precio debe contener un valor numérico.',
            'price.min' => 'El precio no puede ser un valor negativo.',
            'contact_phone.required' => 'El teléfono de contacto es obligatorio.',
            'contact_phone.max' => 'El teléfono no puede exceder los 20 caracteres.',
            'image_path.image' => 'El archivo subido debe ser una imagen válida.',
            'image_path.mimes' => 'La fotografía debe estar en formato JPEG, PNG o JPG.',
            'image_path.max' => 'El tamaño de la fotografía no debe superar los 2MB.',
        ];
    }
}