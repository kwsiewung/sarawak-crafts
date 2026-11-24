<!-- Footer -->
<footer class="site-footer mt-auto pt-5 pb-3">

    <div class="container">

        <div class="row g-4">

            <!-- Brand Information -->
            <div class="col-lg-4 col-md-6">

                <h4 class="site-footer-brand">
                    SarawakMart
                </h4>

                <p class="small">
                    Local Products, Global Opportunities.
                </p>

                <p class="text-white-50 small">
                    Discover the beauty of Sarawak through
                    local craftsmanship, cultural heritage
                    and unique handmade products.
                </p>

            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">

                <h6 class="fw-bold mb-3">Quick Links</h6>

                <ul class="list-unstyled small">

                    <li class="mb-2">
                        <a href="<?php echo $base_url; ?>"
                           class="text-white-50 text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="mb-2 text-white-50">Shop</li>
                    <li class="mb-2 text-white-50">Categories</li>
                    <li class="mb-2 text-white-50">About Us</li>

                </ul>

            </div>

            <!-- Customer Service -->
            <div class="col-lg-3 col-md-6">

                <h6 class="fw-bold mb-3">Customer Service</h6>

                <ul class="list-unstyled small text-white-50">

                    <li class="mb-2">My Account</li>
                    <li class="mb-2">Order Tracking</li>
                    <li class="mb-2">Shipping Information</li>
                    <li class="mb-2">Frequently Asked Questions</li>

                </ul>

            </div>

            <!-- Contact Information -->
            <div class="col-lg-3 col-md-6">

                <h6 class="fw-bold mb-3">Contact Us</h6>

                <p class="small text-white-50">
                    <i class="bi bi-geo-alt me-2"></i>
                    Sarawak, Malaysia
                </p>

                <p class="small text-white-50">
                    Contact details coming soon.
                </p>

            </div>

        </div>

        <hr class="border-secondary mt-4">

        <!-- Copyright -->
        <div class="text-center small text-white-50">

            <p class="mb-1">
                &copy; <?php echo date("Y"); ?> SarawakMart.
                All Rights Reserved.
            </p>

            <p class="mb-0">
                Made with pride in Sarawak, Malaysia.
            </p>

            <p class="small text-muted mb-0">
                Development Version 0.2
            </p>

        </div>

    </div>

</footer>

<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Module Specific JavaScript -->

<?php if (!empty($module_js)): ?>

    <script src="<?php echo $base_url; ?>assets/js/<?php echo htmlspecialchars($module_js); ?>"></script>

<?php endif; ?>


</body>
</html>