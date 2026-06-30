<?php

namespace App\Controller\Api;

use App\DataProvider\DemoDataProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products', name: 'api_products_')]
class ProductController extends BaseApiController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(Request $request): JsonResponse
    {
        $products = DemoDataProvider::getProducts();

        if ($category = $request->query->get('category')) {
            $products = array_values(
                array_filter($products, fn($p) => strtolower($p['category']) === strtolower($category))
            );
        }

        if ($search = $request->query->get('search')) {
            $products = array_values(
                array_filter($products, fn($p) => stripos($p['name'], $search) !== false
                    || stripos($p['description'], $search) !== false)
            );
        }

        if ($minPrice = $request->query->get('min_price')) {
            $products = array_values(array_filter($products, fn($p) => $p['price'] >= (float)$minPrice));
        }

        if ($maxPrice = $request->query->get('max_price')) {
            $products = array_values(array_filter($products, fn($p) => $p['price'] <= (float)$maxPrice));
        }

        $sortBy  = $request->query->get('sort', 'id');
        $sortDir = strtolower($request->query->get('dir', 'asc')) === 'desc' ? 'desc' : 'asc';
        $allowed = ['id', 'name', 'price', 'rating', 'stock'];

        if (in_array($sortBy, $allowed, true)) {
            usort($products, function ($a, $b) use ($sortBy, $sortDir) {
                $cmp = is_string($a[$sortBy])
                    ? strcmp($a[$sortBy], $b[$sortBy])
                    : ($a[$sortBy] <=> $b[$sortBy]);
                return $sortDir === 'desc' ? -$cmp : $cmp;
            });
        }

        $page   = max(1, (int) $request->query->get('page', 1));
        $limit  = min(100, max(1, (int) $request->query->get('limit', 10)));
        $result = $this->paginate($products, $page, $limit);

        return $this->success($result['items'], meta: $result['pagination']);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id): JsonResponse
    {
        $products = DemoDataProvider::getProducts();
        $product  = current(array_filter($products, fn($p) => $p['id'] === $id));

        if (!$product) {
            return $this->error("Product with ID {$id} not found.", 404);
        }

        return $this->success($product);
    }

    #[Route('/category/{categoryId}', name: 'by_category', methods: ['GET'], requirements: ['categoryId' => '\d+'])]
    public function byCategory(int $categoryId): JsonResponse
    {
        $categories = DemoDataProvider::getCategories();
        $category   = current(array_filter($categories, fn($c) => $c['id'] === $categoryId));

        if (!$category) {
            return $this->error("Category with ID {$categoryId} not found.", 404);
        }

        $products = array_values(
            array_filter(DemoDataProvider::getProducts(), fn($p) => $p['category_id'] === $categoryId)
        );

        return $this->success($products, meta: ['category' => $category['name'], 'count' => count($products)]);
    }
}
