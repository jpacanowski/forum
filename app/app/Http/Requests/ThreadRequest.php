<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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
    public function rules()
    {
        return match($this->method()) {
            'POST' => $this->store(),
            'PUT' => $this->update(),
            'DELETE' => $this->destroy()
        };
    }

    protected function store(): array
    {
        return [
            'subject' => 'required|min:3',
            'content' => 'required|min:3',
            'category_id' => 'required'
        ];
    }

    protected function update(): array
    {
        return [
            'subject' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }

    protected function destroy(): array
    {
        return [
            'id' => 'required|integer|exists:threads,id'
        ];
    }
}
