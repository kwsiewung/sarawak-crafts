<?php

$page_title = "Home";
$module_css = "catalog.css";
$module_js = "catalog.js";

require_once __DIR__ . "/../../includes/header.php";


// Sample categories
$categories = [
    [
        "category_name" => "Pua Kumbu",
        "icon" => "bi-grid-3x3-gap"
    ],
    [
        "category_name" => "Beadwork",
        "icon" => "bi-gem"
    ],
    [
        "category_name" => "Wood Carvings",
        "icon" => "bi-tree"
    ],
    [
        "category_name" => "Pottery",
        "icon" => "bi-cup-hot"
    ]
];


// Sample products
$products = [
    [
        "product_id" => 1,
        "product_name" => "Traditional Pua Kumbu",
        "category_name" => "Pua Kumbu",
        "price" => 120.00
    ],
    [
        "product_id" => 2,
        "product_name" => "Handmade Beaded Necklace",
        "category_name" => "Beadwork",
        "price" => 45.00
    ],
    [
        "product_id" => 3,
        "product_name" => "Hornbill Wood Carving",
        "category_name" => "Wood Carvings",
        "price" => 85.00
    ],
    [
        "product_id" => 4,
        "product_name" => "Traditional Ceramic Vase",
        "category_name" => "Pottery",
        "price" => 65.00
    ]
];

?>

<main class="container catalog-home my-4">


    <!-- ==================== HERO SECTION ==================== -->

    <section class="catalog-hero">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <p class="hero-label">
                    Discover the Heritage of Sarawak
                </p>

                <h1 class="hero-title">
                    Discover Sarawak.<br>
                    Celebrate Local.
                </h1>

                <p class="hero-description">
                    Explore unique handicrafts, traditional
                    artistry and locally inspired creations
                    from the Land of the Hornbills.
                </p>

                <a href="#featured-products"
                   class="btn btn-accent">

                    Explore Collection

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

            <div class="col-lg-5">

                <div class="hero-visual">

                    <i class="bi bi-basket"></i>

                </div>

            </div>

        </div>

    </section>


    <!-- ==================== CATEGORIES ==================== -->

    <section id="categories" class="catalog-section">

        <div class="section-heading">

            <h2>Shop by Category</h2>

            <p>
                Explore the diversity of Sarawak craftsmanship.
            </p>

        </div>

        <div class="row g-3">

            <?php foreach ($categories as $category): ?>

                <div class="col-6 col-md-3">

                    <button type="button" class="category-card w-100" aria-pressed="false"  
                        data-category="<?php echo htmlspecialchars($category["category_name"] ); ?>"
                    >

                        <div class="category-icon">

                            <i class="bi <?php echo htmlspecialchars(
                                $category["icon"]
                            ); ?>"></i>

                        </div>

                        <h5>

                            <?php echo htmlspecialchars(
                                $category["category_name"]
                            ); ?>

                        </h5>

                    </button>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- ==================== FEATURED PRODUCTS ==================== -->

    <section id="featured-products" class="catalog-section">

        <div class="section-heading">

            <h2>Featured Products</h2>

            <p>
                Discover our collection of Sarawak-inspired crafts.
            </p>

            <small class="text-muted">
                Preview products and prices for development only.
            </small>

        </div>

        <!-- Product Filter Toolbar -->
        <div class="catalog-toolbar">

            <p id="productCount"
            class="mb-0 text-muted"
            aria-live="polite">
                Loading products...
            </p>

            <button type="button"
                    id="showAllProducts"
                    class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-clockwise me-1"></i>
                Show All Products
            </button>
        </div>

        <div class="row g-4">

            <?php foreach ($products as $product): ?>

                <div class="col-6 col-lg-3 product-item"
                    data-name="<?php echo htmlspecialchars(
                        $product["product_name"]
                    ); ?>"
                    data-category="<?php echo htmlspecialchars(
                        $product["category_name"]
                    ); ?>">

                    <article class="product-card">

                        <!-- Temporary Product Image -->

                        <div class="product-image">

                            <i class="bi bi-image"></i>

                        </div>

                        <div class="product-info">

                            <span class="product-category">

                                <?php echo htmlspecialchars(
                                    $product["category_name"]
                                ); ?>

                            </span>

                            <h3 class="product-name">

                                <?php echo htmlspecialchars(
                                    $product["product_name"]
                                ); ?>

                            </h3>

                            <p class="product-price">

                                RM <?php echo number_format(
                                    $product["price"], 2
                                ); ?>

                            </p>

                            <button type="button"
                                    class="btn btn-brand w-100"
                                    disabled>

                                View Product

                            </button>

                        </div>

                    </article>

                </div>

            <?php endforeach; ?>
            

        </div>
        
        <!-- No Products Found -->
        <div id="emptyState" class="catalog-empty d-none">

            <i class="bi bi-search"></i>

            <h3>No products found</h3>

            <p>
                Try a different keyword or select another category.
            </p>

        </div>

    </section>


    <!-- ==================== ABOUT SECTION ==================== -->

    <section id="about" class="catalog-about">

        <p class="about-label">
            Our Story
        </p>

        <h2>
            Connecting Culture and Commerce
        </h2>

        <p class="about-description">

            SarawakMart is a proposed online marketplace
            dedicated to showcasing the richness of Sarawak's
            cultural heritage and locally produced goods.

            Our goal is to connect local craftsmanship with
            customers beyond geographical boundaries.

        </p>

        <p class="about-tagline">

            Local Products, Global Opportunities.

        </p>

    </section>


</main>

<?php

require_once __DIR__ . "/../../includes/footer.php";

?>