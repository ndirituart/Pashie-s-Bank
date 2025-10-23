<?php

namespace App\Traits;

trait ApiResponseTraits
{

    use ApiResponseTraits, HttpClientTraits;
    public function parseResponse(array $data= [], int $statusCode=200, array $headers=[])
    {
       //success, message, results, error, exceptions and status response

        $responseStructure = [

            'success' => $statusCode >= 200 && $statusCode < 300,
            'message' => $data['message'] ?? null,
            'results' => $data['results'] ?? null,
        ];

        
    }
   
    // protected function successResponse($data, $message = null, $code = 200)
    // {
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => $message,
    //         'data' => $data
    //     ], $code);
    // }

    // protected function errorResponse($message = null, $code = 400)
    // {
    //     return response()->json([
    //         'status' => 'error',
    //         'message' => $message
    //     ], $code);
    // }
}