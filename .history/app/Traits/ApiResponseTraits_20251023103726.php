<?php

namespace App\Traits;

trait ApiResponseTraits
{

    use ApiResponseTraits;
   private function parseResponse(array $data = [], int $statusCode = 200, array $headers = [])
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

       public function apiRessponse (array $data = [], int $statusCode = 200, array $headers = [])
       {
 $result = $this ->parseResponse($data, $statusCode, $headers);
 return response()->json(
    $result['content'], 
    $result['statusCode'], 
    $headers);

       }
    }
