<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Support\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request) {
            if (!$request->expectsJson()) {
                return null;
            }

            if ($e instanceof AuthenticationException) {
                return Response::error(401, "Foydalanuvchi tasdiqlanmagan.", isFriendly: true);
            }

            if ($e instanceof AuthorizationException || $e instanceof AccessDeniedHttpException) {
                return Response::error(403, "Bu amalni bajarish uchun sizda ruxsat yo‘q.", isFriendly: true);
            }

            if ($e instanceof NotFoundHttpException) {
                $map = [
                    'notifications' => "Bildirishnoma topilmadi.",
                    'categories'  => "Kategoriya topilmadi.",
                    'products'    => "Mahsulot topilmadi.",
                    'orders'      => "Buyurtma topilmadi.",
                    'users'       => "Foydalanuvchi topilmadi.",
                ];

                foreach ($map as $key => $msg) {
                    if ($request->is("api/*/{$key}/*")) {
                        return Response::error(404, $msg, isFriendly: true);
                    }
                }

                return Response::error(404, "Ma'lumot topilmadi.", isFriendly: true);
            }

            if ($e instanceof ValidationException) {
                return Response::error(422, $e->getMessage(), $e->errors(), true);
            }

            if ($e instanceof HttpException) {
                return Response::error($e->getStatusCode(), $e->getMessage() ?: 'So\'rovda xatolik.', isFriendly: true);
            }

            return Response::error(500, "Serverdagi ichki xatolik.");
        });
    })->create();
