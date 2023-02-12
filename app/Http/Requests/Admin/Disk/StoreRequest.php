<?php

namespace App\Http\Requests\Admin\Disk;

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
            'capacity' => 'required|string',
            'read_speed' => 'required|string',
            'write_speed' => 'required|string',
            'technology' => 'required|string',
        ];
    }
}
