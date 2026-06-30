<?php

namespace App\DataProvider;

class DemoDataProvider
{
    public static function getCategories(): array
    {
        return [
            ['id' => 1, 'name' => 'Electronics', 'description' => 'Gadgets, devices, and tech accessories', 'product_count' => 8, 'created_at' => '2024-01-15'],
            ['id' => 2, 'name' => 'Clothing',    'description' => 'Apparel for all seasons and occasions',   'product_count' => 6, 'created_at' => '2024-01-15'],
            ['id' => 3, 'name' => 'Books',        'description' => 'Fiction, non-fiction, and educational',  'product_count' => 5, 'created_at' => '2024-01-16'],
            ['id' => 4, 'name' => 'Home & Garden','description' => 'Furniture, tools, and outdoor items',    'product_count' => 4, 'created_at' => '2024-01-16'],
            ['id' => 5, 'name' => 'Sports',       'description' => 'Equipment and activewear',               'product_count' => 3, 'created_at' => '2024-01-17'],
        ];
    }

    public static function getProducts(): array
    {
        return [
            ['id' => 1,  'name' => 'iPhone 15 Pro',          'description' => 'Latest Apple flagship smartphone with titanium frame',  'price' => 999.99,  'category_id' => 1, 'category' => 'Electronics', 'stock' => 42,  'sku' => 'APPL-IP15P',  'rating' => 4.8, 'created_at' => '2024-02-01'],
            ['id' => 2,  'name' => 'Sony WH-1000XM5',        'description' => 'Industry-leading noise cancelling wireless headphones',  'price' => 349.99,  'category_id' => 1, 'category' => 'Electronics', 'stock' => 85,  'sku' => 'SONY-WH5',    'rating' => 4.9, 'created_at' => '2024-02-02'],
            ['id' => 3,  'name' => 'MacBook Air M3',          'description' => '13-inch laptop with Apple M3 chip, 16GB RAM, 512GB SSD','price' => 1299.99, 'category_id' => 1, 'category' => 'Electronics', 'stock' => 23,  'sku' => 'APPL-MBA-M3', 'rating' => 4.9, 'created_at' => '2024-02-03'],
            ['id' => 4,  'name' => 'Samsung 4K Monitor 27"', 'description' => 'Ultra-sharp 4K IPS display with USB-C connectivity',   'price' => 499.99,  'category_id' => 1, 'category' => 'Electronics', 'stock' => 31,  'sku' => 'SAMS-M27-4K', 'rating' => 4.6, 'created_at' => '2024-02-04'],
            ['id' => 5,  'name' => 'Logitech MX Master 3S',  'description' => 'Advanced wireless mouse for power users',               'price' => 99.99,   'category_id' => 1, 'category' => 'Electronics', 'stock' => 120, 'sku' => 'LOGI-MXM3S',  'rating' => 4.7, 'created_at' => '2024-02-05'],
            ['id' => 6,  'name' => 'Nike Air Max 270',        'description' => 'Men\'s running shoes with Max Air cushioning',          'price' => 149.99,  'category_id' => 2, 'category' => 'Clothing',    'stock' => 200, 'sku' => 'NIKE-AM270',  'rating' => 4.5, 'created_at' => '2024-02-06'],
            ['id' => 7,  'name' => 'Levi\'s 501 Original',   'description' => 'Classic straight-fit jeans in medium wash',             'price' => 69.99,   'category_id' => 2, 'category' => 'Clothing',    'stock' => 350, 'sku' => 'LEVI-501-MW', 'rating' => 4.4, 'created_at' => '2024-02-07'],
            ['id' => 8,  'name' => 'Patagonia Down Jacket',   'description' => 'Lightweight 800-fill-power down jacket',                'price' => 329.99,  'category_id' => 2, 'category' => 'Clothing',    'stock' => 60,  'sku' => 'PATA-DJ800',  'rating' => 4.8, 'created_at' => '2024-02-08'],
            ['id' => 9,  'name' => 'Clean Code',              'description' => 'A handbook of agile software craftsmanship by R. Martin','price' => 39.99,   'category_id' => 3, 'category' => 'Books',       'stock' => 180, 'sku' => 'BOOK-CC-RM',  'rating' => 4.8, 'created_at' => '2024-02-09'],
            ['id' => 10, 'name' => 'The Pragmatic Programmer','description' => 'Your journey to mastery, 20th Anniversary Edition',    'price' => 49.99,   'category_id' => 3, 'category' => 'Books',       'stock' => 95,  'sku' => 'BOOK-PP-20',  'rating' => 4.9, 'created_at' => '2024-02-10'],
            ['id' => 11, 'name' => 'IKEA KALLAX Shelf',       'description' => 'Versatile 4x4 shelf unit with 16 compartments',         'price' => 179.99,  'category_id' => 4, 'category' => 'Home & Garden','stock' => 40, 'sku' => 'IKEA-KLX44',  'rating' => 4.3, 'created_at' => '2024-02-11'],
            ['id' => 12, 'name' => 'Yoga Mat Premium',        'description' => 'Non-slip 6mm thick yoga and exercise mat',              'price' => 59.99,   'category_id' => 5, 'category' => 'Sports',      'stock' => 150, 'sku' => 'SPRT-YMP6',   'rating' => 4.6, 'created_at' => '2024-02-12'],
        ];
    }

    public static function getUsers(): array
    {
        return [
            ['id' => 1,  'name' => 'Alice Johnson',  'email' => 'alice@example.com',   'role' => 'admin',    'phone' => '+1-555-0101', 'address' => '123 Main St, New York, NY', 'total_orders' => 12, 'total_spent' => 3420.50, 'created_at' => '2024-01-01', 'last_login' => '2026-06-01'],
            ['id' => 2,  'name' => 'Bob Martinez',   'email' => 'bob@example.com',     'role' => 'customer', 'phone' => '+1-555-0102', 'address' => '456 Oak Ave, Los Angeles, CA', 'total_orders' => 7, 'total_spent' => 1890.25, 'created_at' => '2024-01-05', 'last_login' => '2026-05-28'],
            ['id' => 3,  'name' => 'Carol Williams', 'email' => 'carol@example.com',   'role' => 'customer', 'phone' => '+1-555-0103', 'address' => '789 Pine Rd, Chicago, IL', 'total_orders' => 15, 'total_spent' => 5200.00, 'created_at' => '2024-01-10', 'last_login' => '2026-06-02'],
            ['id' => 4,  'name' => 'David Lee',      'email' => 'david@example.com',   'role' => 'customer', 'phone' => '+1-555-0104', 'address' => '321 Elm St, Houston, TX', 'total_orders' => 3, 'total_spent' => 450.75, 'created_at' => '2024-02-01', 'last_login' => '2026-04-15'],
            ['id' => 5,  'name' => 'Eva Chen',       'email' => 'eva@example.com',     'role' => 'manager',  'phone' => '+1-555-0105', 'address' => '654 Maple Dr, Phoenix, AZ', 'total_orders' => 9, 'total_spent' => 2100.00, 'created_at' => '2024-01-20', 'last_login' => '2026-06-03'],
            ['id' => 6,  'name' => 'Frank Brown',    'email' => 'frank@example.com',   'role' => 'customer', 'phone' => '+1-555-0106', 'address' => '987 Cedar Ln, Philadelphia, PA', 'total_orders' => 21, 'total_spent' => 8750.30, 'created_at' => '2023-11-15', 'last_login' => '2026-06-03'],
            ['id' => 7,  'name' => 'Grace Kim',      'email' => 'grace@example.com',   'role' => 'customer', 'phone' => '+1-555-0107', 'address' => '147 Birch Blvd, San Antonio, TX', 'total_orders' => 4, 'total_spent' => 680.00, 'created_at' => '2024-03-01', 'last_login' => '2026-05-10'],
            ['id' => 8,  'name' => 'Henry Davis',    'email' => 'henry@example.com',   'role' => 'customer', 'phone' => '+1-555-0108', 'address' => '258 Walnut Way, San Diego, CA', 'total_orders' => 6, 'total_spent' => 1340.90, 'created_at' => '2024-02-14', 'last_login' => '2026-05-25'],
        ];
    }

    public static function getOrders(): array
    {
        return [
            [
                'id' => 'ORD-2024-0001', 'user_id' => 3, 'customer' => 'Carol Williams',
                'status' => 'delivered', 'payment_method' => 'credit_card',
                'shipping_address' => '789 Pine Rd, Chicago, IL',
                'items' => [
                    ['product_id' => 1, 'product' => 'iPhone 15 Pro',       'qty' => 1, 'unit_price' => 999.99],
                    ['product_id' => 2, 'product' => 'Sony WH-1000XM5',     'qty' => 1, 'unit_price' => 349.99],
                ],
                'subtotal' => 1349.98, 'tax' => 108.00, 'shipping' => 0.00, 'total' => 1457.98,
                'created_at' => '2024-03-01', 'delivered_at' => '2024-03-05',
            ],
            [
                'id' => 'ORD-2024-0002', 'user_id' => 1, 'customer' => 'Alice Johnson',
                'status' => 'delivered', 'payment_method' => 'paypal',
                'shipping_address' => '123 Main St, New York, NY',
                'items' => [
                    ['product_id' => 3, 'product' => 'MacBook Air M3', 'qty' => 1, 'unit_price' => 1299.99],
                    ['product_id' => 5, 'product' => 'Logitech MX Master 3S', 'qty' => 1, 'unit_price' => 99.99],
                ],
                'subtotal' => 1399.98, 'tax' => 112.00, 'shipping' => 0.00, 'total' => 1511.98,
                'created_at' => '2024-03-10', 'delivered_at' => '2024-03-14',
            ],
            [
                'id' => 'ORD-2024-0003', 'user_id' => 6, 'customer' => 'Frank Brown',
                'status' => 'shipped', 'payment_method' => 'credit_card',
                'shipping_address' => '987 Cedar Ln, Philadelphia, PA',
                'items' => [
                    ['product_id' => 9,  'product' => 'Clean Code',              'qty' => 2, 'unit_price' => 39.99],
                    ['product_id' => 10, 'product' => 'The Pragmatic Programmer','qty' => 1, 'unit_price' => 49.99],
                    ['product_id' => 8,  'product' => 'Patagonia Down Jacket',   'qty' => 1, 'unit_price' => 329.99],
                ],
                'subtotal' => 459.96, 'tax' => 36.80, 'shipping' => 9.99, 'total' => 506.75,
                'created_at' => '2026-05-28', 'delivered_at' => null,
            ],
            [
                'id' => 'ORD-2026-0004', 'user_id' => 2, 'customer' => 'Bob Martinez',
                'status' => 'processing', 'payment_method' => 'debit_card',
                'shipping_address' => '456 Oak Ave, Los Angeles, CA',
                'items' => [
                    ['product_id' => 4,  'product' => 'Samsung 4K Monitor 27"','qty' => 1, 'unit_price' => 499.99],
                    ['product_id' => 12, 'product' => 'Yoga Mat Premium',       'qty' => 2, 'unit_price' => 59.99],
                ],
                'subtotal' => 619.97, 'tax' => 49.60, 'shipping' => 0.00, 'total' => 669.57,
                'created_at' => '2026-06-01', 'delivered_at' => null,
            ],
            [
                'id' => 'ORD-2026-0005', 'user_id' => 5, 'customer' => 'Eva Chen',
                'status' => 'pending', 'payment_method' => 'credit_card',
                'shipping_address' => '654 Maple Dr, Phoenix, AZ',
                'items' => [
                    ['product_id' => 6, 'product' => 'Nike Air Max 270',  'qty' => 1, 'unit_price' => 149.99],
                    ['product_id' => 7, 'product' => "Levi's 501 Original",'qty' => 2, 'unit_price' => 69.99],
                ],
                'subtotal' => 289.97, 'tax' => 23.20, 'shipping' => 5.99, 'total' => 319.16,
                'created_at' => '2026-06-03', 'delivered_at' => null,
            ],
        ];
    }

    public static function getStats(): array
    {
        $orders   = self::getOrders();
        $users    = self::getUsers();
        $products = self::getProducts();

        $totalRevenue   = array_sum(array_column($orders, 'total'));
        $avgOrderValue  = round($totalRevenue / count($orders), 2);
        $totalStock     = array_sum(array_column($products, 'stock'));

        $statusCounts = array_count_values(array_column($orders, 'status'));

        return [
            'overview' => [
                'total_users'      => count($users),
                'total_products'   => count($products),
                'total_orders'     => count($orders),
                'total_revenue'    => round($totalRevenue, 2),
                'avg_order_value'  => $avgOrderValue,
                'total_stock'      => $totalStock,
            ],
            'orders_by_status' => $statusCounts,
            'top_products'     => self::topProducts($products),
            'revenue_by_category' => self::revenueByCategory(),
            'as_of' => date('Y-m-d H:i:s'),
        ];
    }

    private static function topProducts(array $products): array
    {
        usort($products, fn($a, $b) => $b['rating'] <=> $a['rating']);
        return array_map(
            fn($p) => ['id' => $p['id'], 'name' => $p['name'], 'rating' => $p['rating'], 'stock' => $p['stock'], 'price' => $p['price']],
            array_slice($products, 0, 5)
        );
    }

    private static function revenueByCategory(): array
    {
        $orders   = self::getOrders();
        $products = array_column(self::getProducts(), null, 'id');
        $totals   = [];

        foreach ($orders as $order) {
            foreach ($order['items'] as $item) {
                $cat = $products[$item['product_id']]['category'] ?? 'Unknown';
                $totals[$cat] = ($totals[$cat] ?? 0) + ($item['unit_price'] * $item['qty']);
            }
        }

        arsort($totals);
        return array_map(fn($v) => round($v, 2), $totals);
    }
}