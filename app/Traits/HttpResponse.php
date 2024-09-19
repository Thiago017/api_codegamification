<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponse
{
    /**
     * @param string $message
     * @param string|int $statusCode
     * @param array $data
     * @return JsonResponse
     */
    public function response(string $message, string|int $statusCode, array|string $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status_code' => $statusCode,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param string $message
     * @param string|int $statusCode
     * @param array $errors
     * @param array $data
     * @return JsonResponse
     */
    public function error(string $message, string|int $statusCode, array $errors, array|string $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status_code' => $statusCode,
            'errors' => $errors,
            'data' => $data
        ], $statusCode);
    }
}
