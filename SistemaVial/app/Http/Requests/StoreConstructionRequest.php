<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConstructionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date', 'before_or_equal:end_date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'province_id' => ['required', 'exists:provinces,id']
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'El nombre de la obra es obligatorio.',
        'name.string' => 'El nombre de la obra debe ser una cadena de texto.',
        'name.max' => 'El nombre de la obra no puede tener más de 255 caracteres.',
        
        'start_date.required' => 'La fecha de inicio es obligatoria.',
        'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
        'start_date.before_or_equal' => 'La fecha de inicio debe ser antes o igual a la fecha de finalización.',
        
        'end_date.required' => 'La fecha de finalización es obligatoria.',
        'end_date.date' => 'La fecha de finalización debe ser una fecha válida.',
        'end_date.after_or_equal' => 'La fecha de finalización debe ser después o igual a la fecha de inicio.',
        
        'province_id.required' => 'Debes seleccionar una provincia.',
        'province_id.exists' => 'La provincia seleccionada no es válida.',
    ];
    }
}
