<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseAPI
{
    protected function success($message, $data = [], $status = 200)
    {
        return new JsonResponse([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $data = [],$status = 422)
    {
        return new JsonResponse([
            'success' => false,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
}
