<?php

namespace App\Traits;

trait ApiResponseTraits
{

    public function parseResponse(array $data = [], int $statusCode = 200, array $headers = [])
    {
        //success, message, results, error, exceptions and status response

        $responseStructure = [
            //success, message and results response
            'success' => $statusCode >= 200 && $statusCode < 300,
            'message' => $data['message'] ?? null,
            'results' => $data['results'] ?? null,
        ];

        //error response
        if (isset($data['error'])) {
            $responseStructure['error'] = $data['error'];
        }

        //status response
        if (isset($data['status'])) {
            $responseStructure['status'] = $data['status'];
        }
        //exceptions response
        if (isset($data['exceptions'])) {
            if (config(key: 'app.env') !== 'production') { //when not in production show exception details
                $responseStructure['exception'] = [
                    'message' => $data['exception']->getMessage(),
                    'file' => $data['exception']->getFile(),
                    'line' => $data['exception']->getLine(),
                    'code' => $data['exception']->getCode(),
                    'trace' => $data['exception']->getTrace(),
                ];

                if ($statusCode == 200) {
                    $statusCode = 500; //internal server error
                }

                if ($data['success'] === false) {
                    
                    if (isset($data['error_code'])){
                        $responseStructure ['error_code'] = $data ['error_code'];}
                    else {
                        $responseStructure ['error_code'] =1;
                    }
                

                    return [ 
                        'content' => $responseStructure, 'statusCode' => $statusCode, $headers= $headers
                    ];
                }
                }




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
