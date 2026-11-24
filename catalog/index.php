<?php
// Once your leader adds config/db.php, uncomment the line below:
// require_once '../config/db.php';

// Strict Naming Dictionary: snake_case PHP variables & exact column names for GET keys
$product_name = trim($_GET['product_name'] ?? '');
$category_id  = $_GET['category_id'] ?? '';
$min_price    = $_GET['min_price'] ?? '';
$max_price    = $_GET['max_price'] ?? '';
$sort_by      = $_GET['sort_by'] ?? 'newest';
$current_page = max(1, (int)($_GET['page'] ?? 1));
$items_per_page = 8;

// Temporary sample array so you can test the UI before the database is imported
$sample_products = [
    [
        'product_id'     => 1,
        'category_id'    => 1,
        'category_name'  => 'Pua Kumbu',
        'product_name'   => 'Traditional Iban Pua Kumbu Cloth',
        'price'          => 250.00,
        'stock_quantity' => 5,
        'image_path'     => '../assets/images/placeholder.jpg',
        'is_available'   => 1
    ],
    [
        'product_id'     => 2,
        'category_id'    => 2,
        'category_name'  => 'Beadwork',
        'product_name'   => 'Orang Ulu Beaded Necklace',
        'price'          => 85.50,
        'stock_quantity' => 12,
        'image_path'     => '../assets/images/placeholder.jpg',
        'is_available'   => 1
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarawak Crafts - Catalog</title>
    <style>
        /* Strict Naming Dictionary: kebab-case with .catalog- prefix */
        .catalog-container { max-width: 1100px; margin: 20px auto; font-family: Arial, sans-serif; padding: 0 15px; }
        .catalog-filter-bar { display: flex; flex-wrap: wrap; gap: 10px; background: #f4f4f4; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .catalog-filter-bar input, .catalog-filter-bar select, .catalog-filter-bar button { padding: 8px 12px; }
        .catalog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 20px; }
        .catalog-product-card { border: 1px solid #ddd; border-radius: 8px; padding: 15px; display: flex; flex-direction: column; justify-content: space-between; }
        .catalog-product-title { font-size: 1.1rem; margin: 10px 0 5px; }
        .catalog-product-price { font-weight: bold; color: #2b6cb0; }
        .catalog-btn { display: inline-block; margin-top: 10px; padding: 8px 12px; background: #2b6cb0; color: #fff; text-decoration: none; border-radius: 4px; text-align: center; }
    </style>
</head>
<body>
<div class="catalog-container">
    <h1>Sarawak Crafts Catalog</h1>

    <!-- HTML name attributes match exact database column names -->
    <form method="GET" action="index.php" class="catalog-filter-bar">
        <input type="text" name="product_name" placeholder="Search craft name..." value="<?= htmlspecialchars($product_name) ?>">

        <select name="category_id">
            <option value="">All Categories</option>
            <option value="1" <?= $category_id === '1' ? 'selected' : '' ?>>Pua Kumbu</option>
            <option value="2" <?= $category_id === '2' ? 'selected' : '' ?>>Beadwork</option>
            <option value="3" <?= $category_id === '3' ? 'selected' : '' ?>>Wood Carvings</option>
            <option value="4" <?= $category_id === '4' ? 'selected' : '' ?>>Pottery</option>
        </select>

        <input type="number" name="min_price" placeholder="Min Price (RM)" step="0.01" value="<?= htmlspecialchars($min_price) ?>">
        <input type="number" name="max_price" placeholder="Max Price (RM)" step="0.01" value="<?= htmlspecialchars($max_price) ?>">

        <select name="sort_by">
            <option value="newest" <?= $sort_by === 'newest' ? 'selected' : '' ?>>Newest</option>
            <option value="price_asc" <?= $sort_by === 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
            <option value="price_desc" <?= $sort_by === 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
        </select>

        <button type="submit">Filter</button>
    </form>

    <div class="catalog-grid">
        <?php foreach ($sample_products as $product_row): ?>
            <div class="catalog-product-card">
                <div>
                    <small><?= htmlspecialchars($product_row['category_name']) ?></small>
                    <h3 class="catalog-product-title"><?= htmlspecialchars($product_row['product_name']) ?></h3>
                    <p class="catalog-product-price">RM <?= number_format((float)$product_row['price'], 2) ?></p>
                    <p>Stock: <?= (int)$product_row['stock_quantity'] ?></p>
                </div>
                <a href="product_detail.php?product_id=<?= (int)$product_row['product_id'] ?>" class="catalog-btn">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>