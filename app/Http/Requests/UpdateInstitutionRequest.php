<?php

namespace App\Http\Requests;

class UpdateInstitutionRequest extends DefaultRequest
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
            'name' => ['string'],
            'address' => ['string'],
            'city' => ['string'],
            'state' => ['string'],
            'country' => ['string'],
            'contact_email' => ['email'],
        ];
    }
}
