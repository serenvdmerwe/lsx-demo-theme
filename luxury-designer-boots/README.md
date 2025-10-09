# Luxury Designer Boots CPT (designer_boot)

Implements the Designer Boot content model (CPT + taxonomies + meta + patterns) per project spec.

## Features

-   CPT: `designer_boot` at `/designer-boots/`
-   Taxonomies: brand, heel_height, material, country, color, silhouette, closure
-   Meta fields (registered with `register_post_meta`) + admin meta box UI
-   REST-exposed structured facts & arrays (gallery, videos)
-   Block Patterns: Boot Fact Box, Boot Card, Boot Card Grid
-   WP-CLI seed: `wp lbc seed` (adds 3 sample posts without media)
-   Accessible, token-friendly markup

## Install

1. Copy plugin folder into `wp-content/plugins/`.
2. Activate via WP Admin.
3. (Optional) Run `wp lbc seed`.

## Meta Fields

See `/luxury-designer-boots.php` for all `lbc_*` keys (aligns with Section 2.3 Boot Details).

## Theming

Add block templates (see provided files) to your block theme:

-   `templates/single-designer_boot.html`
-   `templates/archive-designer_boot.html`

Or build with Site Editor.

## CSV Import Header (example)

post_type,post_title,post_excerpt,lbc_description_rich,lbc_featured_desc,lbc_featured_alt,lbc_featured_caption,lbc_sizes_eu,lbc_heel_type,lbc_heel_height_mm,lbc_leather_type,lbc_leather_color,lbc_country_of_origin,lbc_care,lbc_product_link,brand,heel_height,material,country,color,silhouette,closure,lbc_personal_notes,lbc_prompt_notes

(Use existing WordPress importers or WP-CLI custom scripts. Map taxonomy columns to `wp_set_object_terms`.)

## Accessibility Checklist

-   One visible H1 per single
-   Each image includes alt (meta: `lbc_featured_alt`)
-   Fact box presented as lists/definition (pattern supplied)
-   Ensure color contrast using theme tokens

## License

-   GNU General Public License v3.0
