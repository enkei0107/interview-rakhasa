<?php

namespace App\Helpers;

class ApiResponse
    {
    protected static $successStatusCode = 200;
    protected static $errorStatusCode = 400;
    protected static $errorUnAuthorized = 401;
    protected static $errorForbidden = 403;
    protected static $errorNotFound = 404;
    protected static $errorConflict = 409;


    /**
     *      @OA\Schema(
     *          schema="MetaResourceSchema",
     *          @OA\Property(property="meta",type="object",ref="#/components/schemas/MetaItemResourceSchema")
     *      )
     *      @OA\Schema(
     *          schema="MetaItemResourceSchema",
     *          @OA\Property(property="code",type="integer",example="200"),
     *          @OA\Property(property="status",type="string",example="success"),
     *          @OA\Property(property="message",type="string",example="operation.success")
     *
     *      )
     */
    private static function base(string $status = "", string $message = "", mixed $data = [], int $statusCode = 200, $headers = []): \Illuminate\Http\JsonResponse
        {
        // dd($status, $message, $statusCode, $headers);
        return response()->json(
            [
                'meta' => [
                    'code'    => $statusCode,
                    'status'  => $status,
                    'message' => $message
                ],
                'data' => empty($data) ? (object) $data : $data
            ],
            $statusCode,
            $headers,
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
        }
    public static function success($message = "", $data = [], $headers = [])
        {
        $status  = 'success';
        $message = $message == '' ? __('response.success') : $message;
        return self::base($status, $message, $data, self::$successStatusCode, $headers);
        }
    public static function error($message = "", $data = [], $code = null)
        {
        $status  = 'error';
        $message = $message == '' ? __('response.error') : $message;
        $code    = $code ? $code : self::$errorStatusCode;
        return self::base($status, $message, $data, $code);
        }
    public static function unAuthorized($message = '', $errors = [], $headers = [])
        {
        $status  = 'error';
        $message = $message == '' ? __('response.unauthorized') : $message;

        return self::base($status, $message, $errors, self::$errorUnAuthorized);
        }
    public static function forBidden($message = '', $errors = [], $headers = [])
        {
        $status  = 'error';
        $message = $message == '' ? __('response.forbidden') : $message;

        return self::base($status, $message, $errors, self::$errorForbidden);
        }
    public static function errorNotFound($message = '', $errors = [], $headers = [])
        {
        $status  = 'error';
        $message = $message == '' ? __('response.not_found') : $message;

        return self::base($status, $message, $errors, self::$errorNotFound);
        }
    }
