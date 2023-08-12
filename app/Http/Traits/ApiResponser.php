<?php

namespace App\Http\Traits;

trait ApiResponser
{
    protected function successResponse($data = [], $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($data = [], $message = null, $code = 400)
    {
        $responseArray = ['status' => 'error','message' => $message,];

        if (!empty($data)) {
            $responseArray['data'] = $data;
        }
        return response()->json($responseArray, $code);
    }
}
