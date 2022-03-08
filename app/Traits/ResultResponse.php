<?php

namespace App\Traits;

/**
 *
 */
trait ResultResponse
{
    public function successResponse($title, $message, $data, $statusCode = 200) {
        return $this->getResponse($title, $message, $data, null, $statusCode);
    }

    public function errorResponse($title, $message, $error, $statusCode = 500) {
        return $this->getResponse($title, $message, null, $error, $statusCode, false);
    }

    private function getResponse($title, $message, $data, $error, $statusCode, $isSuccess = true) {
        $response = [
            'title' => $title,
            'message' => $message,
            'success' => $isSuccess,
            'code' => $statusCode
        ];

        if($isSuccess) {
            $response['data'] = $data;
        }else {
            $response['error'] = $error;
        }

        return response()->json($response, $statusCode);
    }
}
