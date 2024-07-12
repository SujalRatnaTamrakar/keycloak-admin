<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SuccessResponse implements Responsable
{
    public function __construct(
        protected mixed $data,
        protected array $metadata,
        protected int $code = Response::HTTP_OK,
        protected array $headers = [],
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->data,
                'metadata' => $this->metadata,
            ],
            $this->code,
            $this->headers,
        );
    }
}
