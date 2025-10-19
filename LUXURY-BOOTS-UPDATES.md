# Luxury Boots Catalog Updates

## Summary

Updated the sample products system to align with the `luxury-boots-catalog.md` specification. This ensures that when you push to your repository and deploy via webhook, the live site will automatically have the correct sample data.

## Changes Made

### 1. Updated Post Type (functions.php)

-   **Changed**: `product` post type → `designer_boot` post type
-   **Archive URL**: Now `/designer-boots/` (was `/shop/`)
-   **Text Domain**: Updated to use `lbc` prefix
-   **Icon**: Updated to `dashicons-universal-access` per specification
-   **Supports**: Exact fields as per specification

### 2. Updated Taxonomies (new file: /inc/designer-boot-taxonomies.php)

-   **Created new file** for cleaner organization
-   **Taxonomies**: `brand`, `heel_height`, `material`, `country`, `color`, `silhouette`, `closure`
-   **All attached to**: `designer_boot` post type (not `product`)
-   **Slug structure**: Matches specification exactly

### 3. Updated Sample Products (/inc/luxury-sample-products.php)

-   **Product data**: Now uses exact products from specification:
    -   GUCCI Horsebit Ankle Boot – Black Calfskin
    -   Louis Vuitton Swing Platform Ankle Boot – Black Lambskin
    -   Prada 85 Leather Ankle Boots – Black Nappa
-   **Custom fields**: Uses `lbc_` prefix with exact field names from specification
-   **Post type**: Creates `designer_boot` posts (not `product`)
-   **Taxonomy terms**: Uses exact terms from specification
-   **Auto-creation**: Will create sample products on live site deployment

## Deployment Notes

✅ **Webhook Ready**: All changes are repository-compatible
✅ **Auto Sample Data**: Sample products will be created automatically on live site
✅ **Specification Compliant**: 100% aligned with luxury-boots-catalog.md

## What Happens on Live Site

When you push this to your repository:

1. **CPT Registration**: `designer_boot` post type will be registered
2. **Taxonomies**: All 7 taxonomies will be created and attached
3. **Sample Products**: 3 sample designer boots will be auto-created
4. **Archive**: Available at `/designer-boots/`
5. **Admin**: "Designer Boots" menu will appear in WordPress admin

## Sample Data Created

The following 3 designer boots will be auto-created:

| Brand         | Model               | Heel          | Material | Features                       |
| ------------- | ------------------- | ------------- | -------- | ------------------------------ |
| GUCCI         | Horsebit Ankle Boot | Low (50mm)    | Calfskin | Side zip, rubber block heel    |
| Louis Vuitton | Swing Platform      | Medium (75mm) | Lambskin | Platform, architectural design |
| Prada         | 85 Leather          | High (85mm)   | Nappa    | Stiletto-like, tapered toe     |

All sample data includes proper:

-   Excerpts (25 words)
-   Rich descriptions (120-180 words)
-   Custom fields (`lbc_` prefix)
-   Taxonomy assignments
-   Meta data for filtering

## Debug Mode

In debug mode (`WP_DEBUG = true`), sample products are recreated on every page load for testing.
