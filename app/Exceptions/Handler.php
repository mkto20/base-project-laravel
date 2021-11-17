<?php

namespace App\Exceptions;

use App\Models\Helpers\ReportMessage;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

        $this->renderable(function (Exception $e, $request) {
            // dd($e);
            return $this->handleException($request, $e);
        });
    }

    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof AccessDeniedHttpException) {
            ReportMessage::denied();
            return redirect()->route('home');
        }

        if ($exception instanceof UnauthorizedException) {
            ReportMessage::denied();
            return redirect()->route('home');
        }

        if ($exception instanceof AuthorizationException) {
            ReportMessage::denied();
            return redirect()->route('home');
        }
    }
}
