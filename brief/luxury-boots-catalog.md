# **Luxury Boots Catalog — AI Control File**

Project: LSX Demo Theme – Luxury Boots Catalog  
 Site focus: Designer ankle boots (women’s) with brand, material, silhouette, heel, colour, and origin filters.

## **0\) Scope**

Purpose: Generate and maintain a WordPress block-theme content model for a luxury boots catalog, including CPT, taxonomies, custom fields, templates, theme tokens, import specs, and seed data.

AI should be able to produce from this file:

* PHP registration for CPT and taxonomies

* ACF field groups (JSON export) or native meta registration

* Block templates (`*.html`) and pattern files

* `theme.json` fragments (palette, type, spacing)

* CSV/JSON import headers and example rows

* Sample content (3 entries) and editorial prompts

  ---

  ## **1\) Project Vars**

* `PROJECT_NAME: "Luxury Boots Catalog"`  
* `TEXT_DOMAIN: "lbc"`  
* `FN_PREFIX: "lbc_"`  
* `CURRENCY: "USD"`  
* `ARCHIVE_SLUGS:`  
*   `designer_boot: "designer-boots"`  
    
  ---

  ## **2\) Content Model (authoritative)**

  ### **2.1 Custom Post Types**

* `[`  
*   `{`  
*     `"id": "designer_boot",`  
*     `"label": "Designer Boot",`  
*     `"plural": "Designer Boots",`  
*     `"slug": "designer_boot",`  
*     `"rewrite": "designer-boots",`  
*     `"supports": ["title","editor","excerpt","thumbnail","custom-fields","revisions"],`  
*     `"menu_icon": "dashicons-universal-access",`  
*     `"show_in_rest": true,`  
*     `"has_archive": true`  
*   `}`  
* `]`


  ### **2.2 Taxonomies (attach to `designer_boot`)**

* `[`  
*   `{"id":"brand","label":"Brand","hierarchical":false,"rewrite":"brand","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"heel_height","label":"Heel Height","hierarchical":false,"rewrite":"heel-height","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"material","label":"Material","hierarchical":false,"rewrite":"material","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"country","label":"Country of Origin","hierarchical":false,"rewrite":"country","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"color","label":"Color","hierarchical":false,"rewrite":"color","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"silhouette","label":"Silhouette","hierarchical":false,"rewrite":"silhouette","rest":true,"cpts":["designer_boot"]},`  
*   `{"id":"closure","label":"Closure","hierarchical":false,"rewrite":"closure","rest":true,"cpts":["designer_boot"]}`  
* `]`


Seed terms (optional, for import or install routine):

* brand: GUCCI, Louis Vuitton, Prada

* heel\_height: low, medium, high, platform

* material: calfskin, lambskin, nappa, patent, mesh, rubber

* country: Italy, Imported

* color: Black, Milk, Brown, White

* silhouette: ankle boot, chelsea, lace-up

* closure: side zip, lace, pull-on

  ### **2.3 Field Groups (ACF keys are canonical)**

  #### **Boot Details (post type: `designer_boot`)**

* `{`  
*   `"lbc_featured_alt": "text:required",`  
*   `"lbc_featured_caption": "text?",`  
*   `"lbc_featured_desc": "textarea:short",`   
*   `"lbc_description_rich": "wysiwyg:100-200w",`  
*   `"lbc_sizes_eu": "text",`                       
*   `"lbc_heel_type": "text",`  
*   `"lbc_heel_height_mm": "number?",`  
*   `"lbc_leather_type": "select:calfskin|lambskin|nappa|patent|mesh",`  
*   `"lbc_leather_color": "text",`  
*   `"lbc_country_of_origin": "text",`  
*   `"lbc_care": "textarea:short",`  
*   `"lbc_product_link": "url?",`  
*   `"lbc_gallery": "gallery:min=3",`  
*   `"lbc_videos": "repeater:{url, caption?}",`  
*   `"lbc_personal_notes": "textarea?",`  
*   `"lbc_prompt_notes": "textarea?"`  
* `}`


Validation summary (pre-publish):

* Title, excerpt (25 words), featured image with `lbc_featured_alt`

* Description rich 100–200 words

* At least 3 gallery images

* Populate taxonomy terms for brand, material, color, silhouette, closure; add heel height where known

  ---

  ## **3\) Relationships**

* None required beyond taxonomies for this catalog.  
   Optional future relations: boot ↔ editorial post (styling), boot ↔ retailer.

  ---

  ## **4\) Naming & Slugs**

* CPT slug: `designer_boot`

* Archive slug: `designer-boots`

* Post slug pattern: `designer-boot-{brand}-{model}-{color}`

* Image filenames: `designer-boot-{brand}-{model}-{color}-{view}.jpg`

  ---

  ## **5\) Templates (block theme)**

Files to generate:

* `templates/archive-designer_boot.html`  
* `templates/single-designer_boot.html`  
* `taxonomy-brand.html`  
* `taxonomy-heel_height.html`  
* `taxonomy-material.html`  
* `taxonomy-country.html`  
* `taxonomy-color.html`  
* `taxonomy-silhouette.html`  
* `taxonomy-closure.html`


Template parts and patterns:

* `parts/hero-boot.html`  
* `parts/boot-fact-box.html`  
* `parts/boot-gallery.html`  
* `parts/boot-notes.html`  
* `parts/cta-enquire.html`  
*   
* `patterns/boot-card.php`  
* `patterns/boot-card-grid.php`  
* `patterns/boot-hero.php`  
* `patterns/boot-fact-box.php`


Rendering rules:

* One visible H1 per page

* Single template order: hero (featured image \+ H1) → two-column (Description rich vs Fact Box) → Gallery → Personal Notes → CTA

* Fact Box columns (desktop): brand, silhouette, closure, heel type/height, material/leather type, color, sizes EU, country, care, product link

Accessibility/performance:

* Alt text mandatory

* Contrast AA target

* Use `loading="lazy"` for below-the-fold media, responsive images with `srcset`/`sizes`

  ---

  ## **6\) `theme.json` Tokens (starter)**

* `{`  
*   `"settings": {`  
*     `"color": {`  
*       `"palette": [`  
*         `{"slug":"base","color":"#FFFFFF","name":"Base"},`  
*         `{"slug":"contrast","color":"#0A0A0A","name":"Contrast"},`  
*         `{"slug":"primary","color":"#0A84FF","name":"Primary"},`  
*         `{"slug":"accent","color":"#F59E0B","name":"Accent"},`  
*         `{"slug":"neutral-700","color":"#374151","name":"Neutral 700"},`  
*         `{"slug":"neutral-200","color":"#E5E7EB","name":"Neutral 200"}`  
*       `]`  
*     `},`  
*     `"typography": {`  
*       `"fontFamilies": [`  
*         `{"slug":"heading","fontFamily":"Inter, system-ui, sans-serif","name":"Headings"},`  
*         `{"slug":"body","fontFamily":"Lora, Georgia, serif","name":"Body"},`  
*         `{"slug":"ui","fontFamily":"Open Sans, system-ui, sans-serif","name":"UI"}`  
*       `],`  
*       `"fontSizes": [`  
*         `{"slug":"base","size":"16px","name":"Base"},`  
*         `{"slug":"h1","size":"clamp(2rem,4vw,3rem)","name":"H1"},`  
*         `{"slug":"h2","size":"clamp(1.5rem,3vw,2.25rem)","name":"H2"},`  
*         `{"slug":"h3","size":"1.75rem","name":"H3"},`  
*         `{"slug":"small","size":"0.875rem","name":"Small"}`  
*       `]`  
*     `},`  
*     `"spacing": {`  
*       `"spacingScale": {`  
*         `"steps": [`  
*           `{"slug":"spacing-10","size":"0.25rem","name":"4px"},`  
*           `{"slug":"spacing-20","size":"0.5rem","name":"8px"},`  
*           `{"slug":"spacing-30","size":"0.75rem","name":"12px"},`  
*           `{"slug":"spacing-40","size":"1rem","name":"16px"},`  
*           `{"slug":"spacing-50","size":"1.5rem","name":"24px"},`  
*           `{"slug":"spacing-60","size":"2rem","name":"32px"},`  
*           `{"slug":"spacing-70","size":"3rem","name":"48px"},`  
*           `{"slug":"spacing-80","size":"4rem","name":"64px"}`  
*         `]`  
*       `}`  
*     `}`  
*   `}`  
* `}`  
    
  ---

  ## **7\) Generator Prompts (drop-in)**

1. CPT \+ Taxonomies (PHP)  
    “Using TEXT\_DOMAIN=lbc and FN\_PREFIX=lbc\_, generate PHP to register CPT `designer_boot` and taxonomies `brand, heel_height, material, country, color, silhouette, closure`. Include `show_in_rest`, labels, `rewrite` slugs from Section 2, and menu icon `dashicons-universal-access`.”

2. ACF Field Group (JSON)  
    “Create an ACF group ‘Boot Details’ (location: post\_type \== designer\_boot) with keys and types exactly as Section 2.3. Mark `lbc_featured_alt` required. Export JSON.”

3. Block Templates  
    “Create `single-designer_boot.html` using parts: hero-boot, boot-fact-box, boot-gallery, boot-notes, cta-enquire. Create `archive-designer_boot.html` with a grid Query Loop showing brand badge, silhouette, heel height, and color. Ensure one visible H1.”

4. Import Spec  
    “Output a CSV header for `designer_boot` with columns matching Section 8\. Provide three sample rows for GUCCI, Louis Vuitton, Prada using Section 9 sample content.”

5. Editorial Copy  
    “Write a 25-word excerpt and 120–180-word description for a designer ankle boot. Tone concise and elegant; include material, silhouette, heel, fit guidance. Avoid hype.”

   ---

   ## **8\) CSV Import Spec (designer boots)**

Headers:

* `post_type,post_title,post_excerpt,post_content,lbc_description_rich,lbc_featured_desc,lbc_featured_alt,lbc_featured_caption,lbc_sizes_eu,lbc_heel_type,lbc_heel_height_mm,lbc_leather_type,lbc_leather_color,lbc_country_of_origin,lbc_care,lbc_product_link,brand,heel_height,material,country,color,silhouette,closure,featured_image,gallery,slug`


Notes:

* `post_type` \= designer\_boot

* Taxonomies pipe-separated if multiple (e.g., color: “Black”)

* `gallery` pipe-separated filenames

* `slug` optional; if omitted WP generates from `post_title`

  ---

  ## **9\) Sample Entries (JSON and CSV rows)**

  ### **9.1 JSON (ready for headless seeding)**

GUCCI Horsebit

* `{`  
*   `"post_type": "designer_boot",`  
*   `"post_title": "GUCCI Horsebit Ankle Boot – Black Calfskin",`  
*   `"post_excerpt": "Iconic horsebit ankle boot in smooth black calfskin with a low rubber block heel and side-zip convenience—versatile from desk to dinner.",`  
*   `"meta": {`  
*     `"lbc_featured_alt": "GUCCI Horsebit ankle boot in black calfskin, side view",`  
*     `"lbc_featured_desc": "Three-quarter angle showing horsebit hardware and block heel.",`  
*     `"lbc_description_rich": "The GUCCI Horsebit ankle boot pairs Italian craftsmanship with everyday wearability. Smooth black calfskin shapes a refined silhouette, anchored by a low rubber block heel for stability. A discreet side zip streamlines entry without interrupting the profile. Dress it up with tailoring or down with denim; the horsebit hardware signals timeless luxury. Expect a comfortable, true-to-size fit with minimal break-in.",`  
*     `"lbc_sizes_eu": "35–39",`  
*     `"lbc_heel_type": "Low rubber block",`  
*     `"lbc_heel_height_mm": 50,`  
*     `"lbc_leather_type": "calfskin",`  
*     `"lbc_leather_color": "Black",`  
*     `"lbc_country_of_origin": "Italy",`  
*     `"lbc_care": "Wipe with soft cloth; avoid saturation.",`  
*     `"lbc_product_link": "https://www.reversible.com/shopping/women/item/gucci-womens-boot-with-horsebit-705714541"`  
*   `},`  
*   `"tax": {`  
*     `"brand": ["GUCCI"],`  
*     `"heel_height": ["low"],`  
*     `"material": ["calfskin"],`  
*     `"country": ["Italy"],`  
*     `"color": ["Black"],`  
*     `"silhouette": ["ankle boot"],`  
*     `"closure": ["side zip"]`  
*   `},`  
*   `"media": {`  
*     `"featured_image": "designer-boot-gucci-horsebit-black-hero.jpg",`  
*     `"gallery": [`  
*       `"designer-boot-gucci-horsebit-black-heel.jpg",`  
*       `"designer-boot-gucci-horsebit-black-sole.jpg",`  
*       `"designer-boot-gucci-horsebit-black-hardware.jpg"`  
*     `]`  
*   `},`  
*   `"slug": "designer-boot-gucci-horsebit-black"`  
* `}`


Louis Vuitton Swing Platform

* `{`  
*   `"post_type": "designer_boot",`  
*   `"post_title": "Louis Vuitton Swing Platform Ankle Boot – Black Lambskin",`  
*   `"post_excerpt": "Supple lambskin ankle boot with a balanced platform and medium block heel—modern height with confident traction.",`  
*   `"meta": {`  
*     `"lbc_featured_alt": "Louis Vuitton Swing Platform ankle boot in black lambskin, profile",`  
*     `"lbc_featured_desc": "Profile view emphasising platform and heel.",`  
*     `"lbc_description_rich": "Crafted in soft black lambskin, the Swing Platform ankle boot delivers statement height without sacrificing stability. A medium block heel and balanced platform distribute weight evenly, while the clean ankle line keeps the silhouette sharp. The look reads modern and architectural—ideal for evening dressing or elevating minimalist daywear. Fit is true; the platform offsets perceived heel height.",`  
*     `"lbc_sizes_eu": "35–39",`  
*     `"lbc_heel_type": "Medium block with platform",`  
*     `"lbc_heel_height_mm": 75,`  
*     `"lbc_leather_type": "lambskin",`  
*     `"lbc_leather_color": "Black",`  
*     `"lbc_country_of_origin": "Italy",`  
*     `"lbc_care": "Condition occasionally; avoid abrasive contact."`  
*   `},`  
*   `"tax": {`  
*     `"brand": ["Louis Vuitton"],`  
*     `"heel_height": ["medium","platform"],`  
*     `"material": ["lambskin"],`  
*     `"country": ["Italy"],`  
*     `"color": ["Black"],`  
*     `"silhouette": ["ankle boot"],`  
*     `"closure": ["side zip"]`  
*   `},`  
*   `"media": {`  
*     `"featured_image": "designer-boot-louis-vuitton-swing-platform-black-hero.jpg",`  
*     `"gallery": [`  
*       `"designer-boot-lv-swing-platform-black-heel.jpg",`  
*       `"designer-boot-lv-swing-platform-black-zip.jpg"`  
*     `]`  
*   `},`  
*   `"slug": "designer-boot-lv-swing-platform-black"`  
* `}`


Prada 85 Leather

* `{`  
*   `"post_type": "designer_boot",`  
*   `"post_title": "Prada 85 Leather Ankle Boots – Black Nappa",`  
*   `"post_excerpt": "Sleek nappa ankle boots with an elegant high heel—streamlined lines and a close, tailored fit.",`  
*   `"meta": {`  
*     `"lbc_featured_alt": "Prada 85 leather ankle boots in black nappa, three-quarter view",`  
*     `"lbc_featured_desc": "Three-quarter view highlighting tapered toe and high heel.",`  
*     `"lbc_description_rich": "Prada’s 85 leather ankle boots deliver a polished profile in supple black nappa. The tapered toe elongates the line, while the high heel adds lift without bulk. A smooth interior and clean ankle finish suit evening looks and sharp daytime tailoring. Expect a closer fit through the ankle; if between sizes, consider the half size up.",`  
*     `"lbc_sizes_eu": "35–40",`  
*     `"lbc_heel_type": "High stiletto-like block",`  
*     `"lbc_heel_height_mm": 85,`  
*     `"lbc_leather_type": "nappa",`  
*     `"lbc_leather_color": "Black",`  
*     `"lbc_country_of_origin": "Italy",`  
*     `"lbc_care": "Use shoe trees; store in dust bags."`  
*   `},`  
*   `"tax": {`  
*     `"brand": ["Prada"],`  
*     `"heel_height": ["high"],`  
*     `"material": ["nappa"],`  
*     `"country": ["Italy"],`  
*     `"color": ["Black"],`  
*     `"silhouette": ["ankle boot"],`  
*     `"closure": ["side zip"]`  
*   `},`  
*   `"media": {`  
*     `"featured_image": "designer-boot-prada-85-leather-black-hero.jpg",`  
*     `"gallery": [`  
*       `"designer-boot-prada-85-leather-black-heel.jpg",`  
*       `"designer-boot-prada-85-leather-black-profile.jpg",`  
*       `"designer-boot-prada-85-leather-black-sole.jpg"`  
*     `]`  
*   `},`  
*   `"slug": "designer-boot-prada-85-leather-black"`  
* `}`


  ### **9.2 CSV rows (aligned to Section 8 headers)**

Row 1 (GUCCI):

* `designer_boot,GUCCI Horsebit Ankle Boot – Black Calfskin,"Iconic horsebit ankle boot in smooth black calfskin with a low rubber block heel and side-zip convenience—versatile from desk to dinner.",,The GUCCI Horsebit ankle boot pairs Italian craftsmanship with everyday wearability. Smooth black calfskin shapes a refined silhouette, anchored by a low rubber block heel for stability. A discreet side zip streamlines entry without interrupting the profile. Dress it up with tailoring or down with denim; the horsebit hardware signals timeless luxury. Expect a comfortable, true-to-size fit with minimal break-in.,Three-quarter angle showing horsebit hardware and block heel.,GUCCI Horsebit ankle boot in black calfskin, side view,,35–39,Low rubber block,50,calfskin,Black,Italy,Wipe with soft cloth; avoid saturation.,https://www.reversible.com/shopping/women/item/gucci-womens-boot-with-horsebit-705714541,GUCCI,low,calfskin,Italy,Black,ankle boot,side zip,designer-boot-gucci-horsebit-black-hero.jpg,"designer-boot-gucci-horsebit-black-heel.jpg|designer-boot-gucci-horsebit-black-sole.jpg|designer-boot-gucci-horsebit-black-hardware.jpg",designer-boot-gucci-horsebit-black`


Row 2 (Louis Vuitton):

* `designer_boot,Louis Vuitton Swing Platform Ankle Boot – Black Lambskin,"Supple lambskin ankle boot with a balanced platform and medium block heel—modern height with confident traction.",,Crafted in soft black lambskin, the Swing Platform ankle boot delivers statement height without sacrificing stability. A medium block heel and balanced platform distribute weight evenly, while the clean ankle line keeps the silhouette sharp. The look reads modern and architectural—ideal for evening dressing or elevating minimalist daywear. Fit is true; the platform offsets perceived heel height.,Profile view emphasising platform and heel.,Louis Vuitton Swing Platform ankle boot in black lambskin, profile,,35–39,Medium block with platform,75,lambskin,Black,Italy,Condition occasionally; avoid abrasive contact,,Louis Vuitton,"medium|platform",lambskin,Italy,Black,ankle boot,side zip,designer-boot-louis-vuitton-swing-platform-black-hero.jpg,"designer-boot-lv-swing-platform-black-heel.jpg|designer-boot-lv-swing-platform-black-zip.jpg",designer-boot-lv-swing-platform-black`


Row 3 (Prada):

* `designer_boot,Prada 85 Leather Ankle Boots – Black Nappa,"Sleek nappa ankle boots with an elegant high heel—streamlined lines and a close, tailored fit.",,Prada’s 85 leather ankle boots deliver a polished profile in supple black nappa. The tapered toe elongates the line, while the high heel adds lift without bulk. A smooth interior and clean ankle finish suit evening looks and sharp daytime tailoring. Expect a closer fit through the ankle; if between sizes, consider the half size up.,Three-quarter view highlighting tapered toe and high heel.,Prada 85 leather ankle boots in black nappa, three-quarter view,,35–40,High stiletto-like block,85,nappa,Black,Italy,Use shoe trees; store in dust bags.,,Prada,high,nappa,Italy,Black,ankle boot,side zip,designer-boot-prada-85-leather-black-hero.jpg,"designer-boot-prada-85-leather-black-heel.jpg|designer-boot-prada-85-leather-black-profile.jpg|designer-boot-prada-85-leather-black-sole.jpg",designer-boot-prada-85-leather-black`  
    
  ---

  ## **10\) Block Patterns — recommended content**

`patterns/boot-card.php`

* Image (featured), brand badge (taxonomy term), title, short excerpt, quick facts (heel height, silhouette, color), button “View details”.

`patterns/boot-card-grid.php`

* Query Loop grid (3 or 4 columns), using `boot-card` pattern per post.

`patterns/boot-hero.php`

* Cover block with featured image, H1 title, brand and silhouette chips.

`patterns/boot-fact-box.php`

* Definition list with keys: Brand, Model (from title), Silhouette, Closure, Heel type, Heel height (mm), Material/Leather, Color, Sizes (EU), Country, Care, Product link.

  ---

  ## **11\) Single Template Wire (block order)**

`single-designer_boot.html`

1. parts/hero-boot.html

2. Group (columns):

   * Column A: Post Content (intro) \+ `lbc_description_rich` (render as content)

   * Column B: parts/boot-fact-box.html

3. parts/boot-gallery.html (3+ images; lightbox plugin optional)

4. parts/boot-notes.html (render `lbc_personal_notes` when present)

5. parts/cta-enquire.html (button: “Enquire” or “Find a retailer” → `lbc_product_link` if set)

`archive-designer_boot.html`

* H1 “Designer Boots”

* Query Loop (cards), pagination, term filter pills (optional pattern)

  ---

  ## **12\) Editorial Prompts**

Excerpt (25 words):  
 “Write a 25-word, concrete value statement for this boot including material, silhouette, heel type/height, and fit note. Avoid hype; prefer clear benefits.”

Description (120–180 words):  
 “Describe material, construction, silhouette, heel, comfort/fit, and styling use-cases. Include care tip and one sentence on sizing. Tone concise, elegant, neutral.”

Alt text (featured and gallery):  
 “Describe what is visible (angle, material, detail). Include brand \+ model \+ colour. Avoid phrases like ‘image of’.”

---

## **13\) Acceptance Checks**

* CPT and taxonomies registered; REST enabled; archive at `/designer-boots/`

* ACF group “Boot Details” active for `designer_boot`; required fields enforced

* Single template renders hero → description vs fact box → gallery → notes → CTA

* One visible H1 per page; semantically ordered headings

* Images optimized (WebP/JPG), responsive `srcset`; alt text filled

* CSV/JSON import aligns with Section 8 headers

* Core Web Vitals sensible on archive and single

  ---

  ## **14\) Maintenance Notes**

* Treat Sections 2 and 8 as the source of truth for structure/imports

* Version this file (e.g., `v1.0.0`). On schema change, bump minor/major

* When adding taxonomies or fields, update this file first, then regenerate PHP, ACF JSON, templates, and import specs

