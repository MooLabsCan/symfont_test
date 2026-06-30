<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class BaseApiController extends AbstractController
{
    protected function success(mixed $data, int $status = 200, array $meta = []): JsonResponse
    {
        $payload = ['status' => 'success', 'data' => $data];
        if ($meta) {
            $payload['meta'] = $meta;
        }
        return new JsonResponse($payload, $status);
    }

    protected function error(string $message, int $status = 400): JsonResponse
    {
        return new JsonResponse(['status' => 'error', 'message' => $message], $status);
    }

    protected function paginate(array $items, int $page, int $limit): array
    {
        $total  = count($items);
        $offset = ($page - 1) * $limit;
        $slice  = array_values(array_slice($items, $offset, $limit));

        return [
            'items'       => $slice,
            'pagination'  => [
                'page'        => $page,
                'limit'       => $limit,
                'total'       => $total,
                'total_pages' => (int) ceil($total / $limit),
                'has_next'    => ($offset + $limit) < $total,
                'has_prev'    => $page > 1,
            ],
        ];
    }
}