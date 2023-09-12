<?php

declare(strict_types=1);

namespace App\Exceptions;

use Error;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use SharedKernel\Core\Services\SessionIdentifierService;
use SharedKernel\Core\Structures\HttpResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    private SessionIdentifierService $sessionIdentifierService;

    public function __construct(
        Container                $container,
        SessionIdentifierService $sessionIdentifierService
    )
    {
        parent::__construct($container);
        $this->sessionIdentifierService = $sessionIdentifierService;
    }

    protected $levels = [
    ];

    protected $dontReport = [
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e): void {
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->handleException($request, new ResourceNotFoundException());
        }

        if ($e instanceof Exception) {
            return $this->handleException($request, $e);
        }

        if ($e instanceof Error) {
            return $this->handleException($request, $e);
        }

        return parent::render($request, $e);
    }

    public function handleException(Request $request, Throwable $e): HttpResponse
    {
        $response = [
            'message' => $e->getMessage(),
            'type' => class_basename($e),
            'data' => [
                'request' => [
                    'uri' => $request->getUri(),
                    'verb' => $request->getRealMethod(),
                    'ssl' => $request->isSecure(),
                    'origin' => $request->getClientIp(),
                    'request_hash' => $this->sessionIdentifierService->getRequestHash(),
                    'session_hash' => $this->sessionIdentifierService->getSessionHash(),
                ],
                'track' => $e->getTrace(),
            ],
        ];

        if (app()->environment() === 'production') {
            unset($response['data']);
        }

        return new HttpResponse(
            $response,
            $e->getCode() != 0 ? $e->getCode() : 500,
            [],
            null
        );
    }
}
