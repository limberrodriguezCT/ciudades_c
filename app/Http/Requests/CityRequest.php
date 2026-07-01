<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'map_coordinates' => 'nullable|string',
            'is_active' => 'boolean'
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
            'is_active.boolean' => 'El estado de la ciudad presenta un formato no reconocido por el sistema.'
        ];
    }
}
