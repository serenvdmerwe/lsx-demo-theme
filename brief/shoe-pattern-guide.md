# **Pattern Guide**

\[Theme / Project Name\]: Luxury Black Heels Demo

---

## **0\. Deliverables**

* Pattern pack: metadata \+ sample markup for each pattern.

* Categories, keywords, descriptions.

* Placeholder content and variation notes.

* Responsive rules and fallback variants.

* Registration metadata (slug, filename, viewportWidth).

---

## **1\. Purpose**

Reusable block patterns accelerate page building, enforce consistency, and reduce rework. This guide specifies exactly what each pattern is, how it behaves, and how it’s registered so editors can assemble premium, on-brand pages quickly.

---

## **2\. How to Use This Guide**

* Clients: review and confirm titles, copy, and media requirements.

* Developers: convert each definition into `patterns/*.php` or `patterns/*.json`; register via `register_block_pattern()`.

* Editors: use patterns as building blocks inside Site Editor; swap variants per context.

---

## **3\. Pattern Definition Fields (filled for your theme)**

Below are nine high-value patterns to ship first. Repeat the schema for future additions.

### **P1 — Hero: Luxury Statement**

* **Title:** Hero — Luxury Statement

* **Slug:** `heels-luxe/hero-luxury-statement`

* **Categories:** `hero`, `section`

* **Keywords:** `cover`, `headline`, `cta`, `above-the-fold`

* **Description:** Full-width hero with dramatic imagery, headline, subhead, primary/secondary CTAs.

* **Viewport Width:** `1400`

**Markup / Structure (excerpt):**

 `<!-- wp:cover {"dimRatio":60,"overlayColor":"primary","minHeight":70,"minHeightUnit":"vh"} -->`  
  `<!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->`  
    `<!-- wp:heading {"level":1} -->Step Into Luxury<!-- /wp:heading -->`  
    `<!-- wp:paragraph -->Premium black high-heel boots, crafted to command.<!-- /wp:paragraph -->`  
    `<!-- wp:buttons -->`  
      `<!-- wp:button {"className":"is-style-fill"} --><a class="wp-block-button__link">See the Collection</a><!-- /wp:button -->`  
      `<!-- wp:button {"className":"is-style-outline"} --><a class="wp-block-button__link">Read the Journal</a><!-- /wp:button -->`  
    `<!-- /wp:buttons -->`  
  `<!-- /wp:group -->`  
`<!-- /wp:cover -->`

*   
* **Default Settings:** padding `spacing-160` top/bottom; overlay `primary` at 60%; buttons use `accent` and `neutral-900`.

* **Variations:** media-left / media-right; dark-image vs light-image.

* **Responsive Rules:** headline clamps; buttons stack on mobile; minHeight 50–70vh on small screens.

* **Fallback:** group with background color if no image.

* **Media Requirements:** 16:9 or 3:4 hero JPG/WEBP; alt describes pose/material.

* **Placeholder Text:** H1 “Step Into Luxury”; sub “Premium black high-heel boots…”.

* **Notes:** Ensure single visible H1 on page.

---

### **P2 — Product Grid 3-up (Shop)**

* **Title:** Grid — Products 3-up

* **Slug:** `heels-luxe/grid-products-3`

* **Categories:** `query`, `shop`, `section`

* **Keywords:** `products`, `grid`, `catalog`

* **Description:** Responsive 3-column grid of products with image, title, price, quick meta.

* **Viewport Width:** `1200`

* **Markup / Structure:** Query Loop → Post Template with Featured Image, Title, Price (Woo blocks), small meta `dl`.

* **Defaults:** gap `spacing-60`; image ratio 3:4; add “View details” button.

* **Variations:** 2-up (editorial), 4-up (dense).

* **Responsive:** 1-col ≤ 640px; 2-col ≤ 1024px.

* **Fallback:** static card trio if Woo not active.

* **Media:** 900–1200px height; consistent background.

* **Notes:** enable hover quick view (optional).

---

### **P3 — Product Specs Band**

* **Title:** Product — Quick Specs Band

* **Slug:** `heels-luxe/product-quick-specs`

* **Categories:** `product`, `meta`, `section`

* **Keywords:** `specs`, `details`, `dl`

* **Description:** Definition list for heel height, material, finish, fit, size range.

* **Viewport Width:** `1100`

* **Markup:** `group > columns (2–3)` with `dl/dt/dd` via List/Paragraph mapping or custom HTML block.

* **Defaults:** subdued background `neutral-100`, inner padding `spacing-80`.

* **Variations:** compact inline row; iconified labels.

* **Responsive:** stack pairs; maintain readable line-length.

* **Fallback:** single column list.

* **Notes:** ensure semantics for screen readers.

---

### **P4 — Feature Cards (Editorial Trio)**

* **Title:** Cards — Features 3

* **Slug:** `heels-luxe/cards-features-3`

* **Categories:** `feature`, `section`

* **Keywords:** `benefits`, `materials`, `craft`

* **Description:** Three cards with icon/image, headline, 2–3 lines body, link.

* **Viewport Width:** `1200`

* **Defaults:** radius large; subtle shadow; equal heights.

* **Variations:** icon-top, media-left, dark variant.

* **Responsive:** 1-col stack on mobile; maintain touch targets.

---

### **P5 — Lookbook Strip (Media \+ Text)**

* **Title:** Lookbook — Split Media/Text

* **Slug:** `heels-luxe/lookbook-split`

* **Categories:** `media`, `section`

* **Keywords:** `lookbook`, `editorial`, `story`

* **Description:** Alternating image and copy; optional “Shop the look”.

* **Defaults:** 50/50 split; generous spacing; optional background tint.

* **Variations:** reverse order; full-bleed image.

* **Responsive:** stack; image first; clamp text.

---

### **P6 — Newsletter Banner (CTA)**

* **Title:** CTA — Newsletter Banner

* **Slug:** `heels-luxe/cta-newsletter`

* **Categories:** `call-to-action`, `footer`, `section`

* **Keywords:** `subscribe`, `email`, `exclusive`

* **Description:** Narrow band with headline, short line, email field, button.

* **Defaults:** background `neutral-100` (light) or `primary` (dark), AA contrast.

* **Variations:** full-width vs contained; light/dark.

* **Responsive:** input/button stack; keep label visible for accessibility.

---

### **P7 — Journal Highlight (Post Teasers)**

* **Title:** Journal — Highlight Row

* **Slug:** `heels-luxe/journal-highlight`

* **Categories:** `blog`, `query`, `section`

* **Keywords:** `posts`, `teasers`, `editorial`

* **Description:** Three recent posts with image, title, excerpt, “Read more”.

* **Defaults:** gap `spacing-60`; aspect 16:9; excerpts 18–24 words.

* **Variations:** 1 featured \+ 2 small; 4-up dense.

* **Responsive:** 1-col stack then 2-col.

---

### **P8 — Testimonials (Quote Carousel or Grid)**

* **Title:** Social Proof — Testimonials

* **Slug:** `heels-luxe/social-proof`

* **Categories:** `testimonials`, `trust`, `section`

* **Keywords:** `reviews`, `quotes`, `ratings`

* **Description:** Quotes with name/initials; optional rating stars and logos.

* **Defaults:** 2- or 3-col grid; caption style; photo optional.

* **Variations:** single large quote; slider (plugin-optional).

* **Accessibility:** provide cite; avoid motion dependence.

---

### **P9 — Breadcrumb Header (Page/Archive)**

* **Title:** Header — Breadcrumb \+ Title

* **Slug:** `heels-luxe/header-breadcrumb-title`

* **Categories:** `header`, `section`, `taxonomy`

* **Keywords:** `breadcrumbs`, `title`, `wayfinding`

* **Description:** Compact header row with breadcrumbs and H1/term title.

* **Defaults:** small padding; subtle divider.

* **Variations:** with description; with icon.

* **Notes:** ensure only one H1 per view.

---

## **4\. Pattern Strategy & Hierarchy**

* **Atomic:** Buttons, headings, dividers, badges.

* **Composite:** Feature cards, product card, testimonial item.

* **Section-level:** Hero, product grids, lookbook strips, newsletter CTAs, breadcrumb headers.

* Combine composites into sections for speed and consistency; avoid bespoke one-offs unless justified.

---

## **5\. Naming & File Conventions**

* Directory: `patterns/`

* Filenames mirror slugs: `hero-luxury-statement.php`, `grid-products-3.json`, etc.

* Slug prefix: `heels-luxe/`

* Header comments include: Title, Slug, Categories, Keywords, Description, ViewportWidth.

* JSON uses tidy formatting; PHP follows PSR-style.

---

## **6\. Usage Examples & Inspiration**

* Use the official Pattern Directory for references to hero, CTA, and media sections.

* Prioritise visually self-explanatory layouts with minimal required editing.

* Keep patterns token-driven (theme.json colours, typography, spacing).

---

## **7\. Responsive Behavior & Fallbacks**

* Prefer core layout supports (columns, gap, justify, align) over custom CSS.

* Column stacks at ≤ 768px; preserve readable line-lengths.

* Decorative elements may hide on narrow screens.

* Provide simplified fallbacks: image → background colour; grid → single column; carousel → grid.

---

## **8\. Registration Metadata Examples**

**PHP header style (example for Hero):**

`<?php`  
`/**`  
 `* Title: Hero — Luxury Statement`  
 `* Slug: heels-luxe/hero-luxury-statement`  
 `* Categories: hero, section`  
 `* Keywords: cover, headline, cta, above-the-fold`  
 `* Description: Full-width hero with dramatic imagery, headline, subhead, and CTAs.`  
 `* ViewportWidth: 1400`  
 `*/`  
`?>`  
`<!-- block markup here -->`

**JSON style (example for Product Grid 3-up):**

`{`  
  `"title": "Grid — Products 3-up",`  
  `"slug": "heels-luxe/grid-products-3",`  
  `"categories": ["query","shop","section"],`  
  `"keywords": ["products","grid","catalog"],`  
  `"description": "Responsive 3-column product grid with image, title, price, and quick meta.",`  
  `"viewportWidth": 1200,`  
  `"content": "<!-- wp:query {\"query\":{\"perPage\":6}} --><!-- wp:post-template -->...<!-- /wp:post-template --><!-- /wp:query -->"`  
`}`

---

## **9\. How to Use This Template**

* Duplicate the P1–P9 schema for any new pattern.

* Confirm copy, imagery, and tokens before registration.

* Implement, register, and test across breakpoints and colour modes.

* Review in context (front page, shop, journal, single product) and refine.

---

## **10\. Why This Works**

* Eliminates guesswork with complete metadata and sample markup.

* Enforces naming and structure discipline for maintainability.

* Keeps patterns responsive, accessible, and token-driven.

* Speeds editorial assembly while protecting brand consistency.

