<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'vendor_id' => 'required',
            'name' => 'required|string|max:50',
            'type_id' => 'required',
            'wattage_id' => 'required',
            'price' => 'required|integer',
            'image' => 'file|image|mimes:png,jpg,jpeg',
            'score' => 'required|numeric',
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:200'
        ];
    }
}
