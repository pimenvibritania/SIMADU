<?php

namespace App\Exceptions;

use HttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
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

    public function render($request, Throwable $exception)
    {
        $guards = empty($guards) ? [null] : $guards;

        if ($exception instanceof UnauthorizedException) {
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    if (auth()->user()->hasRole('admin')) {
                        return redirect('admin/dashboard');
                    }
                    return redirect('dashboard');
                }
            }
        }


        // this will still show the error if there is any in your code.
        return parent::render($request, $exception);
    }
}
