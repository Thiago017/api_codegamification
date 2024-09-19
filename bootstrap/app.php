<?php

use App\Exceptions\EntityNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
            if ($e instanceof EntityNotFoundException) {
                return response()->json(['error' => $e->getMessage()], Response::HTTP_NOT_FOUND);
            }

            if ($e instanceof ValidationException) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], Response::HTTP_BAD_REQUEST);
            }

            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    })->create();
