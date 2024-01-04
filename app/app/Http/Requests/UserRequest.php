<?php

namespace App\Http\Requests;

use App\Enums\UserStatus;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return match($this->method()) {
            'POST' => $this->store(),
            'PUT' => $this->update(),
            'DELETE' => $this->destroy()
        };
    }

    protected function store(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6'
        ];
    }

    protected function update(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'role' => [Rule::enum(UserStatus::class)],
        ];
    }

    protected function destroy(): array
    {
        return [
            'id' => 'required|integer|exists:users,id'
        ];
    }
}
