<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ErrorResponse implements Responsable
{
    public function __construct(
        protected Throwable $e,
        protected string $message = 'Oops! Something went wrong while trying to perform that action.',
        protected $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        protected array $headers = [],
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        $response = ['message' => $this->message];
        $debugMessage = [
            'message' => $this->e->getMessage(),
            'file' => $this->e->getFile(),
            'line' => $this->e->getLine(),
            'trace_file' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1],
        ];
        if (config('app.debug')) {
            $response['debug'] = $debugMessage;
        }
        return response()->json(
            $response,
            $this->code,
            $this->headers,
        );
    }
}
