<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }



// ...

    public function render($request, Throwable $exception)
    {
        if($exception instanceof MethodNotAllowedHttpException){
            return response()->json([
                'error' => 'Method Not Allowed'
            ], 405);
        }

        if($exception instanceof NotFoundHttpException){
            return response()->json([
                'error' => 'Page Not Found'
            ], 404);
        }

        return parent::render($request, $exception);
    }
}