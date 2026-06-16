<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => 'required|string|in:verbal,fisico,digital,social,otro',
            'description' => 'required|string|min:10|max:2000',
            'intensity' => 'nullable|integer|min:1|max:5',
        ];
    }

    // 👇 AQUÍ es donde van los mensajes personalizados
    public function messages(): array
    {
        return [
            'category.required' => 'Debes seleccionar el tipo de situación.',
            'category.in' => 'El tipo de situación no es válido.',

            'description.required' => 'Por favor, explica lo que está ocurriendo.',
            'description.min' => 'Necesitamos más detalles para poder ayudarte.',
            'description.max' => 'El texto es demasiado largo.',

            'intensity.min' => 'La intensidad mínima es 1.',
            'intensity.max' => 'La intensidad máxima es 5.',
        ];
    }
}
