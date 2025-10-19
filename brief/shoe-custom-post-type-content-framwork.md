# **Custom Post Type Content Framework**

**\[Theme / Project Name\]: Luxury Black Heels Demo**  
 **CPT Name:** `product` (Luxury Black Heels) · **Archive:** `/shop/` · **Single:** `/shop/%postname%/`

---

## **0\. Deliverables**

* Reusable CPT schema: **Featured image, Description, Fact Box, Gallery, Videos, Notes, Prompt Notes**.

* **Taxonomy map** for filtering (Collections, Heel Type, Material, Finish, Occasion, Fit).

* AI-ready prompt fields (short/long) for content generation and updates.

* **Implementation playbook** for block templates \+ ACF/Meta registration.

* Example **JSON partial** for imports/seed data.

---

## **1\. Purpose**

* Standardise every product entry for consistency and velocity.

* Serve humans **and** AI: narrative \+ structured data in one place.

* Enrich with metadata (alt text, taxonomies, accessibility).

* Create evergreen, SEO-smart content for archives and PDPs.

---

## **2\. Base Structure & Fields (per entry)**

* **Title** — product name (e.g., “Obsidian Stiletto Ankle Boot”).

* **Excerpt** — 25-word teaser for archives/search.

* **Featured Image** — file, **alt**, short **description**.

* **Description** — 100–200 words; story \+ materials \+ benefits.

* **Fact Box** — quick-glance specs (see §8).

* **Additional Images (Gallery)** — ordered set; each with alt.

* **Videos (optional)** — URL \+ 1-sentence context.

* **Personal Notes (optional)** — buyer/stylist fit tips.

* **Prompt Notes (AI)** — instructions to expand, localise, or re-write.

**Recommended taxonomies**

* **Collections** (FW25, Capsule, Limited)

* **Heel Type** (Stiletto, Block, Kitten)

* **Material** (Calfskin, Suede, Patent)

* **Finish** (Matte, Gloss, Metallic)

* **Occasion** (Evening, Editorial, Work)

* **Fit** (True to size, Narrow, Wide)

---

## **3\. Naming Convention**

* **Images:** `product-[slug].jpg` → `product-obsidian-stiletto-ankle-boot.jpg`  
   Gallery: `product-[slug]-01.jpg`, `-02.jpg` …

* **Taxonomy terms:** Comma-separated (e.g., `Collections: FW25, Capsule`).

* **Slugs:** lowercase, hyphens → `/shop/obsidian-stiletto-ankle-boot/`.

---

## **4\. Usage**

* **Excerpt** → archive tiles, search results, social cards.

* **Description** → primary PDP narrative (above fold).

* **Fact Box** → spec sidebar/accordion for instant clarity.

* **Notes** → humanise with fit/care tips (optional).

* **Media** → proof of craft (macro textures, 3/4, on-foot).

---

## **5\. Responsive Rules**

* **Featured**: serve responsive sources (`1920, 1440, 1280, 768`).

* **Fact Box**: grid (≥768px), stacks vertically on mobile.

* **Galleries**: lightbox \+ keyboard nav; swipe on mobile.

* **Typography/spacing**: use theme tokens (AA contrast) across breakpoints.

---

## **6\. Implementation**

* **CPT**: register or reuse WooCommerce `product`; add meta via **ACF** or block-based **custom fields**.

* **Templates**: `archive-product.html`, `single-product.html` (block theme).

* **Fields**: map ACF groups → “Images”, “Specs (Fact Box)”, “SEO”, “Notes”.

* **Accessibility**: mandatory **alt**; focus states; table semantics for spec grid.

* **Taxonomies**: register hierarchical (Collections) and flat (Heel Type, Material…).

* **Related**: surface via shared taxonomies (e.g., same Heel Type).

---

## **7\. Content Strategy for Products**

* **Title** — precise \+ evocative (avoid fluff).

* **Excerpt** — 1–2 sentences; mention **material \+ heel \+ use case**.

* **Description** — 100–200 words: craft, comfort, styling, longevity.

* **Fact Box** — consistent fields; terse labels; real numbers.

* **Notes** — sizing nudges; care shortcuts.

* **Media** — set: hero (3/4), side, macro, on-foot, detail.

---

## **8\. Fact Box Schema (Product-specific)**

| Field | Example | Notes |
| ----- | ----- | ----- |
| Category | Women’s Stiletto Boots | Product type / taxonomy |
| Collection | FW25 Capsule | Seasonal/limited labels |
| Heel Height | 100 mm (4 in) | Numeric \+ imperial |
| Heel Type | Stiletto | Controlled list |
| Material | Italian calfskin leather | Primary material |
| Finish | Polished / Patent | Visual finish |
| Lining | Leather lining | Comfort/quality signal |
| Sole | Leather sole, rubber insert | Grip/wear |
| Fit | True to size (narrow toe) | Fit advisory |
| Size Range | EU 35–42 | Availability window |
| Colour | Black (Obsidian) | Palette alignment |
| Closure | Side zip | Practical detail |
| Weight | 340 g (size 39\) | Optional |
| Care | Condition monthly; avoid moisture | Short actionable |
| Sustainability | Long-life construction | Optional |
| SKU | LBH-OBSIDIAN-100 | Unique |
| Status/Notes | In stock | Inventory/legal |

*(Adapt fields per collection or add “Price” if simulating checkout.)*

---

## **9\. Example JSON Partial (Generic → Product)**

`{`  
  `"post_type": "product",`  
  `"title": "Obsidian Stiletto Ankle Boot",`  
  `"excerpt": "Polished Italian calfskin, a sleek 100 mm heel, and a confident ankle silhouette—crafted for evening edits and timeless wardrobes.",`  
  `"featured_image": {`  
    `"file": "product-obsidian-stiletto-ankle-boot.jpg",`  
    `"alt": "Black stiletto ankle boot in polished leather, side profile",`  
    `"description": "Editorial side profile highlighting heel curve and polished finish."`  
  `},`  
  `"description": "Crafted in Italian calfskin with a polished sheen, the Obsidian Boot pairs a sculpted 100 mm stiletto with a supportive ankle cut. A leather lining and refined toe shape create comfort without compromise, while a subtle rubber insert adds grip to the leather sole. Dress for evening, editorial, or any moment that calls for quiet confidence. Built to last with care instructions that preserve form and finish.",`  
  `"fact_box": {`  
    `"category": "Women’s Stiletto Boots",`  
    `"location_or_use": "Evening, Editorial",`  
    `"season_or_date": "FW25 Capsule",`  
    `"size_or_range": "EU 35–42",`  
    `"materials_or_tools": "Italian calfskin leather; leather lining; leather sole with rubber insert",`  
    `"status_or_notes": "In stock; Fit: True to size (narrow toe)"`  
  `},`  
  `"gallery": [`  
    `{ "file": "product-obsidian-stiletto-ankle-boot-01.jpg", "alt": "Three-quarter front view on neutral backdrop" },`  
    `{ "file": "product-obsidian-stiletto-ankle-boot-02.jpg", "alt": "Macro texture of polished calfskin" },`  
    `{ "file": "product-obsidian-stiletto-ankle-boot-03.jpg", "alt": "On-foot styling with evening dress" }`  
  `],`  
  `"videos": [`  
    `"https://example.com/videos/obsidian-boot-hero.mp4"`  
  `],`  
  `"personal_notes": "Best for standard width; if between sizes, choose the larger. Avoid wet pavements.",`  
  `"prompt_notes": "Rewrite description in 120–140 words, en-GB. Keep ‘Italian calfskin’, ‘100 mm heel’. Tone: elegant, confident, warm. Include care line."`  
`}`

---

## **10\. Why This Works**

* **Repeatable**: every product ships with the same IA, so templates never break.

* **AI-ready**: “Prompt Notes” enable safe, constrained expansion/localisation.

* **Structured \+ narrative**: Fact Box for scanning; Description for desire.

* **Filterable**: taxonomies power relevant related items and archives.

* **Accessible \+ SEO-smart**: mandatory alt, concise excerpts, semantic spec grid.

---

### **Quick Implementation Snippets (bonus)**

**CPT Fields (ACF group names)**

* `lbh_featured_image_alt`, `lbh_featured_image_desc`

* `lbh_fact_category`, `lbh_fact_collection`, `lbh_fact_heel_height_mm`, `lbh_fact_heel_type`, `lbh_fact_material`, `lbh_fact_finish`, `lbh_fact_fit`, `lbh_fact_size_range`, `lbh_fact_care`, `lbh_fact_sku`, `lbh_fact_status`

* `lbh_gallery[] (file+alt)`

* `lbh_videos[] (url+note)`

* `lbh_personal_notes`, `lbh_prompt_notes`

**Archive Card Content Rules**

* **Order:** Image → Title → Excerpt (≤25 words) → Key chips (Heel Height, Material) → CTA.

* **Alt** derives from Featured Image alt; chips from Fact Box.

**Authoring QA (per entry)**

* Title ≤ 65 chars, Excerpt 22–28 words.

* Featured Image ≥ 1600px wide, alt present, no “image of”.

* Fact Box fields complete; numbers normalised (mm/in).

* Gallery has 3–5 images; each with alt.

* Prompt Notes present (≤300 chars) for future AI edits.

