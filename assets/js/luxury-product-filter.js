/**
 * Advanced Product Filter System for Luxury Boot Catalog
 * Handles dynamic filtering by all taxonomies with AJAX loading
 */

class LuxuryProductFilter {
    constructor() {
        this.activeFilters = {};
        this.sortOption = 'newest';
        this.isLoading = false;
        this.products = [];

        this.init();
    }

    init() {
        // Initialize filter system when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () =>
                this.bindEvents()
            );
        } else {
            this.bindEvents();
        }
    }

    bindEvents() {
        // Bind filter change events
        document.querySelectorAll('.luxury-filter-select').forEach((select) => {
            select.addEventListener('change', (e) =>
                this.handleFilterChange(e)
            );
        });

        // Bind sort change events
        document.querySelectorAll('.luxury-sort-select').forEach((select) => {
            select.addEventListener('change', (e) => this.handleSortChange(e));
        });

        // Bind clear all button
        document
            .querySelector('.filter-clear-all a')
            ?.addEventListener('click', (e) => {
                e.preventDefault();
                this.clearAllFilters();
            });

        // Load initial products
        this.loadProducts();
    }

    handleFilterChange(event) {
        const taxonomy = event.target.dataset.taxonomy;
        const value = event.target.value;

        if (value === '') {
            delete this.activeFilters[taxonomy];
        } else {
            this.activeFilters[taxonomy] = value;
        }

        this.updateActiveFiltersDisplay();
        this.loadProducts();
    }

    handleSortChange(event) {
        this.sortOption = event.target.value;
        this.loadProducts();
    }

    clearAllFilters() {
        this.activeFilters = {};

        // Reset all select elements
        document.querySelectorAll('.luxury-filter-select').forEach((select) => {
            select.value = '';
        });

        this.updateActiveFiltersDisplay();
        this.loadProducts();
    }

    updateActiveFiltersDisplay() {
        const activeFiltersDisplay = document.querySelector(
            '.active-filters-display'
        );
        if (!activeFiltersDisplay) return;

        const filterCount = Object.keys(this.activeFilters).length;

        if (filterCount === 0) {
            activeFiltersDisplay.textContent = 'No active filters';
        } else {
            const filterTexts = Object.entries(this.activeFilters).map(
                ([taxonomy, value]) => {
                    const selectElement = document.querySelector(
                        `[data-taxonomy="${taxonomy}"]`
                    );
                    const option = selectElement?.querySelector(
                        `option[value="${value}"]`
                    );
                    const label = option ? option.textContent : value;
                    return `${this.formatTaxonomyName(taxonomy)}: ${label}`;
                }
            );

            activeFiltersDisplay.textContent = filterTexts.join(' • ');
        }
    }

    formatTaxonomyName(taxonomy) {
        const names = {
            heel_height: 'Heel',
            material: 'Material',
            finish: 'Finish',
            collection: 'Collection',
            brand: 'Brand',
            country: 'Country',
            color: 'Color',
            silhouette: 'Silhouette',
            closure: 'Closure',
        };
        return names[taxonomy] || taxonomy;
    }

    async loadProducts() {
        if (this.isLoading) return;

        this.isLoading = true;
        this.showLoadingState();

        try {
            // Build query parameters
            const params = new URLSearchParams({
                action: 'filter_luxury_products',
                nonce: luxuryFilterNonce,
                filters: JSON.stringify(this.activeFilters),
                sort: this.sortOption,
            });

            // Make AJAX request
            const response = await fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params,
            });

            const data = await response.json();

            if (data.success) {
                this.renderProducts(data.data.products);
                this.updateResultsCount(data.data.total);
            } else {
                this.showError('Failed to load products. Please try again.');
            }
        } catch (error) {
            console.error('Filter error:', error);
            this.showError('An error occurred while filtering products.');
        } finally {
            this.isLoading = false;
            this.hideLoadingState();
        }
    }

    renderProducts(products) {
        const productGrid =
            document.querySelector('.luxury-product-grid') ||
            document.querySelector('.wp-block-query-loop') ||
            document.querySelector('.products-container');

        if (!productGrid) {
            console.warn('Product grid container not found');
            return;
        }

        if (products.length === 0) {
            this.showNoResults();
            return;
        }

        // Clear existing products
        productGrid.innerHTML = '';

        // Render each product
        products.forEach((product) => {
            productGrid.appendChild(this.createProductCard(product));
        });

        // Trigger any necessary layout updates
        this.triggerLayoutUpdate();
    }

    createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'luxury-product-card';
        card.dataset.productId = product.id;

        card.innerHTML = `
            <div class="product-image">
                <a href="${product.permalink}">
                    <img src="${
                        product.image ||
                        '/wp-content/themes/repo-tmp/assets/images/placeholder-product.jpg'
                    }"
                         alt="${product.title}"
                         loading="lazy">
                </a>
                ${
                    product.is_featured
                        ? '<span class="featured-badge">Featured</span>'
                        : ''
                }
            </div>
            <div class="product-details">
                <div class="product-brand">${product.brand || ''}</div>
                <h3 class="product-title">
                    <a href="${product.permalink}">${product.title}</a>
                </h3>
                <div class="product-price">
                    ${
                        product.price
                            ? `<span class="price">$${product.price}</span>`
                            : ''
                    }
                    ${
                        product.sale_price
                            ? `<span class="sale-price">$${product.sale_price}</span>`
                            : ''
                    }
                </div>
                <div class="product-meta">
                    ${
                        product.heel_height
                            ? `<span class="heel-height">${product.heel_height}</span>`
                            : ''
                    }
                    ${
                        product.material
                            ? `<span class="material">${product.material}</span>`
                            : ''
                    }
                </div>
                <div class="product-actions">
                    <a href="${
                        product.permalink
                    }" class="view-details">View Details</a>
                    ${
                        product.in_stock
                            ? '<button class="quick-add">Quick Add</button>'
                            : '<span class="out-of-stock">Out of Stock</span>'
                    }
                </div>
            </div>
        `;

        return card;
    }

    updateResultsCount(total) {
        const resultsCount = document.querySelector('.filter-results-count');
        if (resultsCount) {
            const filterCount = Object.keys(this.activeFilters).length;
            if (filterCount === 0) {
                resultsCount.textContent = `Showing all ${total} products`;
            } else {
                resultsCount.textContent = `Showing ${total} filtered products`;
            }
        }
    }

    showLoadingState() {
        const productGrid =
            document.querySelector('.luxury-product-grid') ||
            document.querySelector('.wp-block-query-loop') ||
            document.querySelector('.products-container');

        if (productGrid) {
            productGrid.classList.add('loading');
            productGrid.innerHTML = `
                <div class="loading-indicator">
                    <div class="loading-spinner"></div>
                    <p>Loading luxury collection...</p>
                </div>
            `;
        }
    }

    hideLoadingState() {
        const productGrid =
            document.querySelector('.luxury-product-grid') ||
            document.querySelector('.wp-block-query-loop');

        if (productGrid) {
            productGrid.classList.remove('loading');
        }
    }

    showNoResults() {
        const productGrid =
            document.querySelector('.luxury-product-grid') ||
            document.querySelector('.wp-block-query-loop') ||
            document.querySelector('.products-container');

        if (productGrid) {
            productGrid.innerHTML = `
                <div class="no-results">
                    <div class="no-results-icon">👠</div>
                    <h3>No products match your selection</h3>
                    <p>Try adjusting your filters to discover more luxury boots in our collection.</p>
                    <button onclick="luxuryFilter.clearAllFilters()" class="clear-filters-btn">
                        Clear All Filters
                    </button>
                </div>
            `;
        }
    }

    showError(message) {
        const productGrid =
            document.querySelector('.luxury-product-grid') ||
            document.querySelector('.wp-block-query-loop');

        if (productGrid) {
            productGrid.innerHTML = `
                <div class="error-message">
                    <h3>Oops! Something went wrong</h3>
                    <p>${message}</p>
                    <button onclick="luxuryFilter.loadProducts()" class="retry-btn">
                        Try Again
                    </button>
                </div>
            `;
        }
    }

    triggerLayoutUpdate() {
        // Trigger any masonry or grid layout updates if needed
        window.dispatchEvent(new Event('resize'));

        // Trigger any lazy loading libraries
        if (window.lazyLoadInstance) {
            window.lazyLoadInstance.update();
        }
    }

    // Public API methods for external use
    getActiveFilters() {
        return { ...this.activeFilters };
    }

    setFilter(taxonomy, value) {
        if (value === '' || value === null || value === undefined) {
            delete this.activeFilters[taxonomy];
        } else {
            this.activeFilters[taxonomy] = value;
        }

        // Update the corresponding select element
        const select = document.querySelector(`[data-taxonomy="${taxonomy}"]`);
        if (select) {
            select.value = value || '';
        }

        this.updateActiveFiltersDisplay();
        this.loadProducts();
    }

    setSorting(sortOption) {
        this.sortOption = sortOption;

        // Update the sort select element
        const sortSelect = document.querySelector('.luxury-sort-select');
        if (sortSelect) {
            sortSelect.value = sortOption;
        }

        this.loadProducts();
    }
}

// Global functions for inline event handlers (to maintain backward compatibility)
function applyFilter(selectElement) {
    if (window.luxuryFilter) {
        const event = new Event('change');
        Object.defineProperty(event, 'target', { value: selectElement });
        window.luxuryFilter.handleFilterChange(event);
    }
}

function applySorting(selectElement) {
    if (window.luxuryFilter) {
        const event = new Event('change');
        Object.defineProperty(event, 'target', { value: selectElement });
        window.luxuryFilter.handleSortChange(event);
    }
}

function clearAllFilters() {
    if (window.luxuryFilter) {
        window.luxuryFilter.clearAllFilters();
    }
}

// Initialize the filter system
window.luxuryFilter = new LuxuryProductFilter();
