document.addEventListener("DOMContentLoaded", function() {
    const products = document.querySelectorAll('.product');

    function filterProducts() {
        const selectedCategories = Array.from(document.querySelectorAll('.category:checked')).map(checkbox => checkbox.name);
        const selectedBrands = Array.from(document.querySelectorAll('.brand:checked')).map(checkbox => checkbox.name);

        products.forEach(product => {
            const category = product.dataset.category;
            const brand = product.dataset.brand;

            const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(category);
            const brandMatch = selectedBrands.length === 0 || selectedBrands.includes(brand);

            if (categoryMatch && brandMatch) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    document.querySelectorAll('.category, .brand').forEach(input => {
        input.addEventListener('change', filterProducts);
    });
});