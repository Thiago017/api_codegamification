<?php

namespace App\Http\Requests;

use App\Enums\UserRoles;
use Illuminate\Validation\Rule;

class StoreUserRequest extends DefaultRequest
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
            'name' => ['required', 'string'],
            'enrollment' => ['required', 'string'],
            'institution_id' => ['required', 'integer'],
            'classroom' => ['required', 'integer'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => [Rule::enum(UserRoles::class)],
            'password' => ['required', 'string'],
        ];
    }
}
