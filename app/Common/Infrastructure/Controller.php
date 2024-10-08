<?php

declare(strict_types=1);

namespace App\Common\Infrastructure;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Info(
    version: '1.0',
    description: 'Telegram replier documentation',
    title: 'Telegram replier',
)]
abstract class Controller
{
    /** @param array<array-key, mixed> $data */
    public function success(array $data = [], int $status = Response::HTTP_OK, ?string $message = null): JsonResponse
    {
        return new JsonResponse(
            data: [
                'success' => true,
                'data' => $data,
                'message' => $message,
            ],
            status: $status
        );
    }

    /** @param array<array-key, mixed> $data */
    public function fail(array $data = [], int $status = Response::HTTP_BAD_REQUEST, ?string $message = null): JsonResponse
    {
        return new JsonResponse(
            data: [
                'success' => false,
                'data' => $data,
                'message' => $message,
            ],
            status: $status
        );
    }
}
