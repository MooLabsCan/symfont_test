<?php

namespace App\Controller\Api;

use App\DataProvider\DemoDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/users', name: 'api_users_')]
class UserController extends BaseApiController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(Request $request): JsonResponse
    {
        $users = DemoDataProvider::getUsers();
        $role  = $request->query->get('role');

        if ($role) {
            $users = array_values(array_filter($users, fn($u) => $u['role'] === $role));
        }

        $page  = max(1, (int) $request->query->get('page', 1));
        $limit = min(100, max(1, (int) $request->query->get('limit', 10)));

        $result = $this->paginate($users, $page, $limit);

        return $this->success($result['items'], meta: $result['pagination']);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id): JsonResponse
    {
        $users = DemoDataProvider::getUsers();
        $user  = current(array_filter($users, fn($u) => $u['id'] === $id));

        if (!$user) {
            return $this->error("User with ID {$id} not found.", 404);
        }

        $userOrders = array_values(
            array_filter(DemoDataProvider::getOrders(), fn($o) => $o['user_id'] === $id)
        );

        return $this->success([...$user, 'orders' => $userOrders]);
    }

    #[Route('/{id}/orders', name: 'orders', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function orders(int $id): JsonResponse
    {
        $users = DemoDataProvider::getUsers();
        $user  = current(array_filter($users, fn($u) => $u['id'] === $id));

        if (!$user) {
            return $this->error("User with ID {$id} not found.", 404);
        }

        $orders = array_values(
            array_filter(DemoDataProvider::getOrders(), fn($o) => $o['user_id'] === $id)
        );

        return $this->success($orders, meta: ['user' => $user['name'], 'count' => count($orders)]);
    }
}