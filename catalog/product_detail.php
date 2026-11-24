<?php
// Once your leader adds config/db.php, uncomment the line below:
// require_once '../config/db.php';

// Strict Naming Dictionary: snake_case PHP variables & exact column names
$product_id = max(1, (int)($_GET['product_id'] ?? 1));

// Temporary sample data matching your `products` and `categories` columns
$sample_products = [
    1 => [
        'product_id'     => 1,
        'category_id'    => 1,
        'category_name'  => 'Pua Kumbu',
        'product_name'   => 'Traditional Iban Pua Kumbu Cloth',
        'description'    => 'Handwoven ceremonial textile crafted by Iban weavers in Sarawak using traditional natural dyes.',
        'price'          => 250.00,
        'stock_quantity' => 5,
        'image_path'     => '../assets/images/placeholder.jpg',
        'is_available'   => 1
    ],
    2 => [
        'product_id'     => 2,
        'category_id'    => 2,
        'category_name'  => 'Beadwork',
        'product_name'   => 'Orang Ulu Beaded Necklace',
        'description'    => 'Intricate glass-bead necklace featuring traditional Orang Ulu motifs.',
        'price'          => 85.50,
        'stock_quantity' => 12,
        'image_path'     => '../assets/images/placeholder.jpg',
        'is_available'   => 1
    ]
];

$product_item = $sample_products[$product_id] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product_item ? htmlspecialchars($product_item['product_name']) : 'Product Not Found' ?> - Sarawak Crafts</title>
    <style>
        /* Strict Naming Dictionary: kebab-case with .catalog- prefix */
        .catalog-detail-container { max-width: 900px; margin: 30px auto; font-family: Arial, sans-serif; padding: 0 15px; }
        .catalog-back-link { display: inline-block; margin-bottom: 20px; color: #2b6cb0; text-decoration: none; }
        .catalog-detail-box { border: 1px solid #ddd; border-radius: 8px; padding: 25px; }
        .catalog-detail-category { color: #666; font-size: 0.9rem; text-transform: uppercase; }
        .catalog-detail-price { font-size: 1.5rem; font-weight: bold; color: #2b6cb0; margin: 10px 0; }
        .catalog-detail-desc { line-height: 1.6; color: #333; margin: 15px 0; }
        .catalog-cart-form { display: flex; gap: 10px; align-items: center; margin-top: 20px; }
        .catalog-cart-form input[type="number"] { width: 70px; padding: 8px; }
        .catalog-btn { padding: 10px 18px; background: #2b6cb0; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="catalog-detail-container">
    <a href="index.php" class="catalog-back-link">&larr; Back to Catalog</a>

    <?php if ($product_item): ?>
        <div class="catalog-detail-box">
            <span class="catalog-detail-category"><?= htmlspecialchars($product_item['category_name']) ?></span>
            <h1><?= htmlspecialchars($product_item['product_name']) ?></h1>
            <p class="catalog-detail-price">RM <?= number_format((float)$product_item['price'], 2) ?></p>
            <p><strong>Available Stock:</strong> <?= (int)$product_item['stock_quantity'] ?></p>
            <p class="catalog-detail-desc"><?= htmlspecialchars($product_item['description']) ?></p>

            <!-- POST keys match `cart_items` database columns: product_id & quantity -->
            <form method="POST" action="../cart/add_to_cart.php" class="catalog-cart-form">
                <input type="hidden" name="product_id" value="<?= (int)$product_item['product_id'] ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?= (int)$product_item['stock_quantity'] ?>" required>
                <button type="submit" class="catalog-btn">Add to Cart</button>
            </form>
        </div>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</div>
</body>
</html>