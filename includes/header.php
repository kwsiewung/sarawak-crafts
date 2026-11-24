<?php
$website_name = "SarawakMart";
$base_url = strpos(
    $_SERVER["SCRIPT_NAME"],
    "/sarawak-crafts/"
) === 0 ? "/sarawak-crafts/" : "/";
$page_title = $page_title ?? "Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($page_title); ?> | <?php echo $website_name; ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- SarawakMart Global CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">

    <!-- Module Specific CSS -->
    <?php if (!empty($module_css)): ?>

        <link rel="stylesheet"
            href="<?php echo $base_url; ?>assets/css/modules/<?php echo htmlspecialchars($module_css); ?>">

    <?php endif; ?>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Top Announcement Bar -->
    <div class="site-announcement">
        <small>Local Products, Global Opportunities</small>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg site-navbar">

        <div class="container">

            <!-- Website Brand -->
            <a class="navbar-brand"
                href="<?php echo $base_url; ?>">
                SarawakMart 
            </a>

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Navigation Content -->
            <div class="collapse navbar-collapse" id="mainNavbar">

                <!-- Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>#featured-products">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>#categories">
                            Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>#about">
                            About Us
                        </a>
                    </li>

                </ul>

                <!-- Search Bar -->

                <form id="catalogSearchForm" class="d-flex me-lg-3 my-2 my-lg-0" role="search" action="<?php echo $base_url; ?>">

                    <input id="catalogSearch" class="form-control me-2" type="search" name="search" placeholder="Search products..." aria-label="Search products" autocomplete="off"
                        <?php echo empty($module_js) ? "disabled" : ""; ?>>

                    <button class="btn btn-outline-dark" type="submit" aria-label="Search"
                        <?php echo empty($module_js) ? "disabled" : ""; ?>
                        <i class="bi bi-search"></i>
                    </button>

                </form>

                <!-- User and Cart -->
                <div class="d-flex align-items-center gap-3">

                    <button class="btn btn-outline-dark" disabled>
                        <i class="bi bi-person"></i>
                        Login
                    </button>

                    <button class="btn btn-outline-dark" disabled>
                        <i class="bi bi-cart3"></i>
                        Cart (0)
                    </button>

                </div>

            </div>

        </div>

    </nav>
