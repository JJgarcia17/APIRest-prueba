<?php

namespace App\Exceptions;

use Error;
use ErrorException;
use BadMethodCallException;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
        $this->renderable(function (NotFoundHttpException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 404,
                    'message' => 'Object not found',
                ],404);
            }
        });

        $this->renderable(function (Error $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });

        $this->renderable(function (QueryException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });
        $this->renderable(function (AuthenticationException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 401,
                    'message' => $e->getMessage(),
                ],401);
            }
        });
        $this->renderable(function (BadMethodCallException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });
        $this->renderable(function (ErrorException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });
        $this->renderable(function (MethodNotAllowedHttpException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 405,
                    'message' => $e->getMessage(),
                ],405);
            }
        });
        $this->renderable(function (RouteNotFoundException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });
        $this->renderable(function (BindingResolutionException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 500,
                    'message' => $e->getMessage(),
                ],500);
            }
        });
        $this->renderable(function (AccessDeniedHttpException $e,$request) {
            if($request->is('api/*'))
            {
                return response([
                    'status' => 403,
                    'message' => $e->getMessage(),
                ],403);
            }
        });
    }

}
