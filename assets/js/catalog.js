
/* ==================================================
   SARAWAKMART - CATALOG JAVASCRIPT
   Version: 0.1
   Product Search and Category Filtering
================================================== */

document.addEventListener("DOMContentLoaded", function () {

    // 1. Get HTML elements

    const categoryButtons = document.querySelectorAll(".category-card");
    const productItems = document.querySelectorAll(".product-item");

    const searchForm = document.getElementById("catalogSearchForm");
    const searchInput = document.getElementById("catalogSearch");

    const showAllButton = document.getElementById("showAllProducts");
    const productCount = document.getElementById("productCount");
    const emptyState = document.getElementById("emptyState");
    const featuredSection = document.getElementById("featured-products");


    // Stop if this is not the catalog page

    if (!featuredSection || !searchInput) {
        return;
    }


    // 2. Filter state

    let selectedCategory = "all";
    let searchKeyword = "";


    // 3. Filter products

    function filterProducts() {

        let visibleCount = 0;

        productItems.forEach(function (product) {

            const productName =
                product.dataset.name.toLowerCase();

            const productCategory =
                product.dataset.category.toLowerCase();


            const matchesCategory =
                selectedCategory === "all" ||
                productCategory === selectedCategory;


            const matchesSearch =
                productName.includes(searchKeyword) ||
                productCategory.includes(searchKeyword);


            if (matchesCategory && matchesSearch) {

                product.classList.remove("d-none");
                visibleCount++;

            } else {

                product.classList.add("d-none");

            }

        });


        // Update product count

        productCount.textContent =
            visibleCount + (visibleCount === 1 ? " product found" : " products found");


        // Show empty state

        emptyState.classList.toggle(
            "d-none",
            visibleCount !== 0
        );

    }


    // 4. Category filtering

    categoryButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            selectedCategory =
                this.dataset.category.toLowerCase();


            // Remove previous active category

            categoryButtons.forEach(function (item) {

                item.classList.remove("active");
                item.setAttribute("aria-pressed", "false");

            });


            // Highlight selected category

            this.classList.add("active");
            this.setAttribute("aria-pressed", "true");


            filterProducts();

            featuredSection.scrollIntoView();

        });

    });


    // 5. Live product search

    searchInput.addEventListener("input", function () {

        searchKeyword = this.value.trim().toLowerCase();

        filterProducts();

    });


    // 6. Search button

    searchForm.addEventListener("submit", function (event) {

        event.preventDefault();

        searchKeyword =
            searchInput.value.trim().toLowerCase();

        filterProducts();

        featuredSection.scrollIntoView();

    });


    // 7. Reset all filters

    showAllButton.addEventListener("click", function () {

        selectedCategory = "all";
        searchKeyword = "";

        searchInput.value = "";


        categoryButtons.forEach(function (button) {

            button.classList.remove("active");
            button.setAttribute("aria-pressed", "false");

        });


        filterProducts();

    });


    // 8. Initial product count

    filterProducts();

});