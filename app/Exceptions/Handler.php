<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Str;
class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if (
            $exception instanceof \Illuminate\Database\QueryException &&
            Str::contains($exception->getMessage(), 'SQLSTATE[HY000] [2002] Connection refused')
        ) {
            return response()->view('errors.connection-refused', [], 500);
        }

        return parent::render($request, $exception);
    }
}
