<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrawlerPostRequest extends FormRequest
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
            'source_id' => ['required', 'exists:sources,id'],
            'source_page_id' => ['nullable', 'exists:source_pages,id'],
            'title' => ['required'],
            'source_url' => ['required', 'url'],
            'content' => ['nullable'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
