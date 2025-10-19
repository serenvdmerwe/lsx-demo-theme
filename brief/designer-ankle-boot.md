# **Designer Ankle Boot (CPT: `designer_boot`) — Implementation Pack**

## **0\) Deliverables (status)**

* CPT registration (PHP): provided below

* Taxonomies (PHP): provided below

* ACF Field Group (Local JSON): provided below

* Block templates (single and archive): provided below

* CSV/JSON import specification: provided below

* AI Prompt Pack (excerpt, description, alt text, fact box): provided below

* Accessibility checklist (boots CPT): provided below

* Sample entries (3): GUCCI, Louis Vuitton, Prada

---

## **1\) CPT & Taxonomies (copy-paste safe)**

`<?php`

`// CPT: designer_boot`

`add_action('init', function () {`

  `register_post_type('designer_boot', [`

    `'label'         => 'Designer Boots',`

    `'labels'        => ['singular_name' => 'Designer Boot'],`

    `'public'        => true,`

    `'menu_icon'     => 'dashicons-universal-access',`

    `'supports'      => ['title','editor','excerpt','thumbnail','custom-fields','revisions'],`

    `'has_archive'   => true,`

    `'rewrite'       => ['slug' => 'designer-boots'],`

    `'show_in_rest'  => true,`

  `]);`

`});`

`// Helper`

`function db_register_taxonomy($key, $label, $hier = false) {`

  `register_taxonomy($key, ['designer_boot'], [`

    `'label'        => $label,`

    `'public'       => true,`

    `'hierarchical' => $hier,`

    `'rewrite'      => ['slug' => $key],`

    `'show_in_rest' => true,`

  `]);`

`}`

`// Flat taxonomies for filters/facets`

`add_action('init', function(){`

  `db_register_taxonomy('brand', 'Brand');`

  `db_register_taxonomy('heel_height', 'Heel Height');`

  `db_register_taxonomy('material', 'Material');`

  `db_register_taxonomy('country', 'Country of Origin');`

  `db_register_taxonomy('color', 'Color');`

  `db_register_taxonomy('silhouette', 'Silhouette');`

  `db_register_taxonomy('closure', 'Closure');`

`});`

---

## **2\) ACF Field Group (Local JSON export ready)**

Save via `acf_add_local_field_group()` or export as JSON in `/acf-json/group_designer_boot.json`.

`<?php`

`acf_add_local_field_group([`

  `'key' => 'group_designer_boot',`

  `'title' => 'Designer Boot',`

  `'fields' => [`

    `[`

      `'key' => 'field_featured_image_alt',`

      `'label' => 'Featured Image Alt',`

      `'name' => 'featured_image_alt',`

      `'type' => 'text',`

      `'required' => 1,`

      `'instructions' => 'brand + model + color',`

    `],`

    `[`

      `'key' => 'field_featured_image_description',`

      `'label' => 'Featured Image Description',`

      `'name' => 'featured_image_description',`

      `'type' => 'textarea',`

    `],`

    `[`

      `'key' => 'field_description_rich',`

      `'label' => 'Description (100–200 words)',`

      `'name' => 'description_rich',`

      `'type' => 'wysiwyg',`

      `'tabs' => 'visual',`

      `'media_upload' => 0,`

    `],`

    `[`

      `'key' => 'field_fact_box',`

      `'label' => 'Fact Box',`

      `'name' => 'fact_box',`

      `'type' => 'group',`

      `'sub_fields' => [`

        `['key'=>'field_brand','label'=>'Brand','name'=>'brand','type'=>'text'],`

        `['key'=>'field_model','label'=>'Model','name'=>'model','type'=>'text'],`

        `['key'=>'field_silhouette','label'=>'Silhouette','name'=>'silhouette','type'=>'text'],`

        `['key'=>'field_closure','label'=>'Closure','name'=>'closure','type'=>'text'],`

        `['key'=>'field_heel_type','label'=>'Heel Type','name'=>'heel_type','type'=>'text'],`

        `['key'=>'field_heel_height_mm','label'=>'Heel Height (mm)','name'=>'heel_height_mm','type'=>'number'],`

        `['key'=>'field_material_text','label'=>'Material','name'=>'material_text','type'=>'text'],`

        `['key'=>'field_color_text','label'=>'Color','name'=>'color_text','type'=>'text'],`

        `['key'=>'field_country_of_origin','label'=>'Country of Origin','name'=>'country_of_origin','type'=>'text'],`

        `['key'=>'field_sizes_eu','label'=>'Sizes (EU)','name'=>'sizes_eu','type'=>'text'],`

        `['key'=>'field_care','label'=>'Care','name'=>'care','type'=>'textarea'],`

        `['key'=>'field_product_link','label'=>'Product Link','name'=>'product_link','type'=>'url'],`

      `],`

    `],`

    `[`

      `'key' => 'field_gallery',`

      `'label' => 'Gallery',`

      `'name' => 'gallery',`

      `'type' => 'gallery',`

      `'instructions' => 'Min 3: side, sole, close-up',`

      `'min' => 3,`

      `'max' => 12,`

      `'return_format' => 'array',`

    `],`

    `[`

      `'key' => 'field_videos',`

      `'label' => 'Videos',`

      `'name' => 'videos',`

      `'type' => 'repeater',`

      `'layout' => 'row',`

      `'button_label' => 'Add Video',`

      `'sub_fields' => [`

        `['key'=>'field_video_url','label'=>'URL','name'=>'url','type'=>'url'],`

        `['key'=>'field_video_caption','label'=>'Caption','name'=>'caption','type'=>'text'],`

      `]`

    `],`

    `[`

      `'key' => 'field_personal_notes',`

      `'label' => 'Personal Notes',`

      `'name' => 'personal_notes',`

      `'type' => 'textarea',`

    `],`

    `[`

      `'key' => 'field_prompt_notes',`

      `'label' => 'Prompt Notes (AI)',`

      `'name' => 'prompt_notes',`

      `'type' => 'textarea',`

    `],`

  `],`

  `'location' => [[['param'=>'post_type','operator'=>'==','value'=>'designer_boot']]],`

  `'position' => 'acf_after_title',`

  `'active' => true,`

`]);`

---

## **3\) Block Templates (editor-friendly)**

### **Single (`single-designer_boot.html`)**

* Template Parts: header, skip-links, footer

* Hero: Featured Image (Cover) with overlay title (H1). Alt from ACF.

* Content layout (Group → Columns 2\)

  * Column 1: Post Content (ACF `description_rich`)

  * Column 2: Fact Box as a definition list from ACF group fields

* Gallery: core Gallery block (ACF images or media library)

* Notes: Personal Notes if present

* Optional CTA banner: “Shop the Collection”

### **Archive (`archive-designer_boot.html`)**

* Template Parts: header, footer

* Archive Title (dynamic) with short lead

* Optional filter row: facets for brand, heel\_height, material

* Card Grid (Query Loop)

  * Card: Featured image, Title, Brand term chip, Heel height, Excerpt

* Pagination with rel attributes

---

## **4\) CSV / JSON Import Specification**

Filenames: `boots-catalog-YYYY-MM.csv|json`  
 Slug rule: `designer-boot-{brand}-{model}-{color}` (lowercase, hyphens)

Columns and types:

`post_title (string)`

`post_name (string, optional)`

`post_excerpt (string, ~25 words)`

`featured_image_file (string)`

`featured_image_alt (string, required)`

`featured_image_description (string)`

`description_rich (html|string, 100–200 words)`

`brand (string, taxonomy term)`

`model (string)`

`silhouette (string, taxonomy term)`

`closure (string, taxonomy term)`

`heel_type (string)`

`heel_height_mm (int)`

`material (string, taxonomy term)`

`material_text (string, optional)`

`color (string, taxonomy term)`

`country (string, taxonomy term)`

`country_of_origin (string, optional)`

`sizes_eu (string)`

`care (string)`

`product_link (url)`

`gallery_files (pipe-delimited)              // f1.jpg|f2.jpg|f3.jpg`

`gallery_alts (pipe-delimited)               // a1|a2|a3 (same count as files)`

`videos (json array of {url,caption})        // or pipe: url^^caption|url^^caption`

`personal_notes (string)`

`prompt_notes (string)`

---

## **5\) AI Prompt Pack**

System  
 Write concise, elegant, luxury e-commerce copy in UK English. Avoid hype. Prioritise material, silhouette, heel, fit/feel, and use-cases. Keep sentences 8–18 words.

A) Excerpt (≤ 25 words)  
 Write a one to two sentence value-led excerpt for \[brand, model, material, silhouette, heel\_type\]. Audience: luxury footwear shoppers.

B) Description (100–200 words)  
 Write 100–200 words for \[brand/model/color/material/silhouette/heel\_type/heel\_height\_mm/closure\]. Cover craftsmanship, comfort, fit guidance, and styling contexts. Avoid superlatives; be specific.

C) Alt Text (single image)  
 Write factual alt text (≤ 12 words): \[brand, model, color, view\].

D) Fact Box completion  
 Given product details, return a compact fact box (keys: brand, model, silhouette, closure, heel\_type, heel\_height\_mm, material, color, country\_of\_origin, sizes\_eu, care). No marketing language.

E) Notes (1–2 sentences)  
 Write candid sizing and comfort notes: break-in, ankle hold, sole traction.

---

## **6\) Accessibility Checklist**

* One visible H1 on single; archive has dynamic H1.

* All images have descriptive alt; captions where helpful.

* Gallery is keyboard operable; any lightbox traps focus and supports Esc.

* Colour contrast: body text at least 4.5:1; large text at least 3:1.

* Pagination includes rel="prev" and rel="next".

* Focus styles are visible on all interactive elements.

* Hero and card images use responsive srcset and sizes; non-critical images lazy-load.

* Skip links enabled; breadcrumbs labelled with aria-label="Breadcrumb".

---

## **7\) Naming Convention**

* Images: `designer-boot-{brand}-{model}-{color}-{view}.jpg`  
   Example: `designer-boot-gucci-horsebit-black-heel.jpg`

* Slugs: `designer-boot-{brand}-{model}-{color}`

* Taxonomy labels: proper case, unified list, no duplicates

---

## **8\) Fact Box Schema (footwear)**

Fields: brand (tax), model (text), silhouette (tax), closure (tax), heel\_type (text), heel\_height\_mm (number), material (tax and optional free text), color (tax), country\_of\_origin (tax or text), sizes\_eu (text), care (short text), product\_link (url)

---

## **9\) Example Entries (JSON)**

You already have GUCCI and Louis Vuitton samples. Here is the third sample.

Prada 85 Leather Ankle Boots

`{`

  `"post_type": "designer_boot",`

  `"title": "Prada 85 Leather Ankle Boots – Black Nappa",`

  `"excerpt": "Sculpted black nappa ankle boot with an 85mm heel and clean line—elegant height with a supple, glove-like fit.",`

  `"featured_image": {`

    `"file": "designer-boot-prada-85-leather-ankle-black-hero.jpg",`

    `"alt": "Prada 85 leather ankle boot in black nappa, three-quarter view",`

    `"description": "Soft nappa finish with tapered toe and slim high heel."`

  `},`

  `"description": "Prada’s 85 leather ankle boot distils refinement into a sharp, minimal silhouette. Butter-soft black nappa wraps the ankle for a close, flexible fit, while the tapered toe and slim heel elongate the line. The 85mm height delivers poised elevation without feeling precarious; a balanced last and lightly cushioned insole keep the stride confident. Pair with tailored trousers or a column skirt—the boot disappears into the look and leaves the impression of length. Expect a firm hold at the ankle and a short break-in as the nappa molds to your foot.",`

  `"fact_box": {`

    `"brand": "Prada",`

    `"model": "85 Leather Ankle Boots",`

    `"silhouette": "Ankle boot",`

    `"closure": "Side zip",`

    `"heel_type": "Slim high heel",`

    `"heel_height_mm": 85,`

    `"material": "Nappa leather",`

    `"color": "Black",`

    `"country_of_origin": "Italy",`

    `"sizes_eu": "35–40",`

    `"care": "Use neutral cream; avoid prolonged moisture.",`

    `"product_link": "https://example.com/prada-85-leather-ankle-boot"`

  `},`

  `"gallery": [`

    `{ "file": "designer-boot-prada-85-leather-ankle-black-side.jpg", "alt": "Side profile showing slim heel" },`

    `{ "file": "designer-boot-prada-85-leather-ankle-black-heel.jpg", "alt": "Heel detail and heel seat" },`

    `{ "file": "designer-boot-prada-85-leather-ankle-black-zip.jpg",  "alt": "Side zip and clean ankle line" }`

  `],`

  `"videos": [],`

  `"personal_notes": "Slightly narrow at the toe; consider half-size up for wider forefoot.",`

  `"prompt_notes": "Tone: refined, calm, specific. Cover fit and styling use-cases. Keep to 120–160 words."`

`}`

---

## **10\) QA and Go-Live Checklist**

* Each entry includes: Title, Excerpt, Featured Image with alt and description, 100–200 word Description, Fact Box, at least three Gallery images with alts.

* Taxonomies applied: brand, silhouette, material, color, heel\_height where used.

* Single and Archive templates render one visible H1 and logical H2/H3 order.

* Images compressed and correctly named.

* Internal links between products and journal or collection pages.

* Accessibility and performance checks passed.

Next steps:

1. Add the PHP to your theme or a small plugin.

2. Register or sync the ACF field group.

3. Create `single-designer_boot.html` and `archive-designer_boot.html` with the structures above.

4. Prepare the first CSV using the import spec.

5. Use the prompt pack to generate consistent excerpts, descriptions, alts, and notes.

