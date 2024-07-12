<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Actions;

use Illuminate\Support\Facades\Http;
use Psr\Http\Message\StreamInterface;
use SujalRatnaTamrakar\KeycloakAdmin\Responses\ErrorResponse;
use SujalRatnaTamrakar\KeycloakAdmin\Responses\SuccessResponse;

class SendRequest
{
    public function __invoke($method, $url, $options = [], StreamInterface|string $body = '', string $message = '', $query_parameters = [], $content_type = 'application/json')
    {
        try {
            $response = Http::asForm()
                ->withQueryParameters($query_parameters)
                ->withBody($body, $content_type)
                ->send($method, $url, $options);

            return new SuccessResponse($response->json(), ['message' => $response->reason()], $response->status(), []);
        } catch (\Throwable $th) {
            return new ErrorResponse($th, $th->getMessage(), $th->getCode());
        }
    }
}
