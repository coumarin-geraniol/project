<?php

namespace App\Http\Requests\Admin\Ram;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'transfer_rate' => 'required|string',
            'clock_speed' => 'required|string',
            'bus_speed' => 'required|string',
        ];
    }
}
