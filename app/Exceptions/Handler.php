<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            $status = 400;

            if ($this->isHttpException($exception)) {
                $status = $exception->getStatusCode();
            }
            return response()->json([
                'status' => $status,
                'errors' => $this->getMessage($status)
            ], $status);
        }

        return parent::render($request, $exception);
    }

    private function getMessage($status)
    {
        switch ($status) {
            case 404:
            default:
                return 'Not Found.';
                break;
        }
    }
}
