<?php

namespace App\Controller\Api;

use App\DataProvider\DemoDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/orders', name: 'api_orders_')]
class OrderController extends BaseApiController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(Request $request): JsonResponse
    {
        $orders = DemoDataProvider::getOrders();

        if ($status = $request->query->get('status')) {
            $orders = array_values(array_filter($orders, fn($o) => $o['status'] === $status));
        }

        if ($userId = $request->query->get('user_id')) {
            $orders = array_values(array_filter($orders, fn($o) => $o['user_id'] === (int)$userId));
        }

        $page   = max(1, (int) $request->query->get('page', 1));
        $limit  = min(100, max(1, (int) $request->query->get('limit', 10)));
        $result = $this->paginate($orders, $page, $limit);

        return $this->success($result['items'], meta: $result['pagination']);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(string $id): JsonResponse
    {
        $orders = DemoDataProvider::getOrders();
        $order  = current(array_filter($orders, fn($o) => strtoupper($o['id']) === strtoupper($id)));

        if (!$order) {
            return $this->error("Order '{$id}' not found.", 404);
        }

        return $this->success($order);
    }
}
