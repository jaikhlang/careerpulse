<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSourceRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name' => ['required', 'max:255'],
            'display_name' => ['nullable', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:sources,slug'],
            'base_url' => ['required', 'url'],
            'type' => ['required'],
            'crawl_interval' => ['required', 'integer', 'min:5'],
            'is_active' => ['boolean'],
        ];
    }
}
