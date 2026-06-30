<?php

namespace App\Controller\Api;

use App\DataProvider\DemoDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/categories', name: 'api_categories_')]
class CategoryController extends BaseApiController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        return $this->success(DemoDataProvider::getCategories());
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id): JsonResponse
    {
        $categories = DemoDataProvider::getCategories();
        $category   = current(array_filter($categories, fn($c) => $c['id'] === $id));

        if (!$category) {
            return $this->error("Category with ID {$id} not found.", 404);
        }

        $products = array_values(
            array_filter(DemoDataProvider::getProducts(), fn($p) => $p['category_id'] === $id)
        );

        return $this->success([...$category, 'products' => $products]);
    }
}
