<?php

namespace App\Traits;

trait ApiResponseTraits
{

    use ApiResponseTraits, HttpClientTraits;
    public function parseResponse(array $data= [], int $statusCode=200, array $headers=[])
    {
       //success, message, results, error, exceptions and status response

        $responseStructure = [
//succesmessage response
            'success' => $statusCode >= 200 && $statusCode < 300,
            'message' => $data['message'] ?? null,
            'results' => $data['results'] ?? null,
        ];


        if (isset($data['error'])) {
            $responseStructure['error'] = $data['error'];
        }

        if (isset($data['exceptions'])) {
            $responseStructure['exceptions'] = $data['exceptions'];
        }

        return response()->json($responseStructure, $statusCode, $headers);
        
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