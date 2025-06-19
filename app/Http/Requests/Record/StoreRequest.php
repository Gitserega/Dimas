<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|string',
            'pname' => 'required|string',
            'type' => 'required|string',
            'breed' => 'nullable|string',
            'age' => 'nullable|integer',
            'groomer' => 'required|exists:groomers,id',
            'date' => 'required|date',
            'notes' => 'nullable|string',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ];
    }
}
