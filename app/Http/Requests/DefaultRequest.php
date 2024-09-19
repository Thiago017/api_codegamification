<?php

namespace App\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;

class DefaultRequest extends FormRequest
{
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException(
            $validator,
            response()->json([
                'data' => 400,
                'message' => $validator->errors()->first(),
            ], 400)
        );
    }
}
