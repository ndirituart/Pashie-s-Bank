<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponseTraits
{
    /**
     * Parses the response data into a standard API structure.
     *
     * @param array $data Contains keys: 'success', 'message', 'result', 'errors', 'exception', 'status', 'error_code'
     * @param int|null $statusCode The HTTP status code to return
     * @param array $headers Optional headers to attach to the response
     * @return array
     */
    protected function parseResponse(array $data = [], ?int $statusCode = null, array $headers = []): array
    {
        // Default response structure
        $responseStructure = [
            'success' => $data['success'] ?? false,
            'message' => $data['message'] ?? null,
            'result' => $data['result'] ?? null,
        ];

        // Default status code
        $statusCode = $statusCode ?? $data['status'] ?? Response::HTTP_OK;

        // Handle errors array
        if (isset($data['errors'])) {
            $responseStructure['errors'] = $data['errors'];
            // If errors exist, typically set to 422 Unprocessable Entity
            if ($statusCode === Response::HTTP_OK) {
                $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
            }
        }

        // Handle error code
        if (isset($data['error_code'])) {
            $responseStructure['error_code'] = $data['error_code'];
        }

        // Handle exception (if exception object is passed)
        if (isset($data['exception']) && ($data['exception'] instanceof \Throwable || $data['exception'] instanceof Exception)) {
            // Include exception message/details if debugging is enabled
            if (config('app.debug')) {
                $responseStructure['exception'] = [
                    'message' => $data['exception']->getMessage(),
                    'file' => $data['exception']->getFile(),
                    'line' => $data['exception']->getLine(),
                    'trace' => $data['exception']->getTraceAsString(),
                ];
            }
            // Set error status code if not already set (defaulting to 500)
            if ($statusCode === Response::HTTP_OK) {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            }
        }

        // Ensure status code is within a valid range
        if ($statusCode < 100 || $statusCode > 599) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return [$responseStructure, $statusCode, $headers];
    }

    /**
     * Sends the final JSON response.
     *
     * @param array $data
     * @param int|null $statusCode
     * @param array $headers
     * @return JsonResponse
     */
    protected function sendApiResponse(array $data = [], ?int $statusCode = null, array $headers = []): JsonResponse
    {
        list($responseStructure, $finalStatusCode, $finalHeaders) = $this->parseResponse($data, $statusCode, $headers);

        return response()->json($responseStructure, $finalStatusCode, $finalHeaders);
    }
}
