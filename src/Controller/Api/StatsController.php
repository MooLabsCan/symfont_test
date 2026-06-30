<?php

namespace App\Controller\Api;

use App\DataProvider\DemoDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class StatsController extends BaseApiController
{
    #[Route('/stats', name: 'stats', methods: ['GET'])]
    public function stats(): JsonResponse
    {
        return $this->success(DemoDataProvider::getStats());
    }

    #[Route('/health', name: 'health', methods: ['GET'])]
    public function health(): JsonResponse
    {
        return $this->success([
            'status'    => 'ok',
            'version'   => '1.0.0',
            'timestamp' => date('c'),
            'php'       => PHP_VERSION,
            'symfony'   => \Symfony\Component\HttpKernel\Kernel::VERSION,
        ]);
    }

    #[Route('/docs', name: 'docs', methods: ['GET'])]
    public function docs(): JsonResponse
    {
        return $this->success([
            'title'       => 'Demo Platform API',
            'version'     => '1.0.0',
            'description' => 'A Symfony-powered REST API with demo e-commerce data.',
            'base_url'    => '/api',
            'endpoints'   => [
                ['method' => 'GET', 'path' => '/api/health',                      'description' => 'Health check'],
                ['method' => 'GET', 'path' => '/api/stats',                       'description' => 'Platform statistics'],
                ['method' => 'GET', 'path' => '/api/docs',                        'description' => 'This documentation'],
                ['method' => 'GET', 'path' => '/api/categories',                  'description' => 'List all categories'],
                ['method' => 'GET', 'path' => '/api/categories/{id}',             'description' => 'Get category with products'],
                ['method' => 'GET', 'path' => '/api/products',                    'description' => 'List products (filter: category, search, min_price, max_price, sort, dir, page, limit)'],
                ['method' => 'GET', 'path' => '/api/products/{id}',               'description' => 'Get product by ID'],
                ['method' => 'GET', 'path' => '/api/products/category/{categoryId}','description' => 'Products by category ID'],
                ['method' => 'GET', 'path' => '/api/users',                       'description' => 'List users (filter: role, page, limit)'],
                ['method' => 'GET', 'path' => '/api/users/{id}',                  'description' => 'Get user with order history'],
                ['method' => 'GET', 'path' => '/api/users/{id}/orders',           'description' => 'Get all orders for a user'],
                ['method' => 'GET', 'path' => '/api/orders',                      'description' => 'List orders (filter: status, user_id, page, limit)'],
                ['method' => 'GET', 'path' => '/api/orders/{id}',                 'description' => 'Get order by ID (e.g. ORD-2024-0001)'],
            ],
        ]);
    }
}
