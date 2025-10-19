# **Block Theme**

**\[Theme / Project Name\]: Luxury Black Heels Demo**

---

## **0\) Deliverables**

* Confirmed template matrix (required vs optional)

* Template Part map (header, footer, hero, quick-meta, TOC, etc.)

* theme.json responsibilities (palette, type, spacing, templateParts)

* Accessibility \+ performance guardrails

* Notes for editor assignment / fallbacks

---

## **1\) Block Theme Templates (project-specific)**

### **1.1 `index.html` (fallback)**

**Purpose:** final safety net.  
 **Minimum:** Header (part) · Query Loop (generic) · Footer (part)  
 **Recommended:** site title/tagline in header; light utility area.  
 **Notes:** keep minimal; inherits global styles.

---

### **1.2 `front-page.html` (static landing)**

**Purpose:** luxury brand landing.  
 **Minimum:** Header · **Hero/Cover** (collection claim \+ CTA) · Featured Query Loop (selected products) · Footer  
 **Recommended:** newsletter/lead capture; lightweight assets; AA contrast.  
 **Content pattern:** H1 “Crafted to Command”, subcopy, primary CTA → `/shop/`.

---

### **1.3 `home.html` (posts index)**

**Purpose:** Journal/blog listing.  
 **Minimum:** Header · Query Loop (posts) · Pagination · Footer  
 **Recommended:** sidebar pattern (recent, categories, search) or chips/pills for categories.  
 **Notes:** set accessible H1 “Journal”.

---

### **1.4 `single.html` & `single-product.html`**

**Purpose:** Single post / single product PDP.  
 **Minimum (post):** Header · Post Title (H1) · Featured Image · Post Content · Post Meta · Footer  
 **Minimum (product):** Header · **Product Title (H1)** · **Media gallery** · **Fact Box / Specs** (pattern) · Description · Related Products · Footer  
 **Recommended:** share/bookmark; **Related by taxonomy** (Heel Type/Material).  
 **Notes:** product H1 must be unique; keep spec grid keyboard-navigable.

---

### **1.5 `page.html`**

**Purpose:** About, Contact, static pages.  
 **Minimum:** Header · (Optional Title) · Content · Footer  
 **Recommended:** contact pattern (form \+ reassurance copy), breadcrumbs on deep pages.

---

### **1.6 `archive.html` & `archive-product.html`**

**Purpose:** generic/archive; **Shop** catalogue.  
 **Minimum:** Header · Archive Title (dynamic) · Query Loop · Pagination · Footer  
 **Recommended (Shop):** filters (Heel Type, Material, Finish), grid/list toggle, intro blurb (80–120 words).  
 **Notes:** consistent pagination semantics; AA contrast for pills.

---

### **1.7 `category.html` / `tag.html` / `taxonomy-{taxonomy}.html`**

**Purpose:** Journal terms; Product facets.  
 **Minimum:** Header · Term title+description · Query Loop scoped to term · Pagination · Footer  
 **Recommended:** term hero, related terms, helpful empty state.

---

### **1.8 `search.html`**

**Purpose:** search results.  
 **Minimum:** Header (with visible search block) · H1 “Search results for: {query}” · Query Loop · Search form · Footer  
 **Recommended:** results count (sr-only), suggestions if 0 results.

---

### **1.9 `404.html`**

**Purpose:** helpful not-found.  
 **Minimum:** Header · H1 “Page not found” · actions (search, home, shop, journal) · Footer  
 **Recommended:** friendly illustration; recent posts/products.

---

### **1.10 `attachment.html`**

**Purpose:** media attachment.  
 **Minimum:** Header · Attachment display \+ caption/alt · meta · Footer  
 **Notes:** verify alt; responsive images.

---

### **1.11 `embed.html`**

**Purpose:** safe wrapper for embeds.  
 **Minimum:** Header · Responsive Embed · Footer  
 **Notes:** lazy-load; sanitize.

---

### **1.12 `date.html` / `author.html`**

**Purpose:** date/author archives for Journal.  
 **Minimum:** Header · Archive title (dynamic) · Query Loop · Pagination · Footer  
 **Recommended:** author bio card (template part).

---

### **1.13 `taxonomy-{taxonomy}-{term}.html` (optional)**

**Purpose:** highly tailored term pages (e.g., `taxonomy-heel_type-stiletto.html`)  
 **Value:** bespoke hero \+ curated content for key terms.

---

## **2\) Post Format Templates (Journal)**

* **`single-post.html` (standard/longform):** add TOC part \+ author card \+ related posts.

* **`single-post-gallery.html`:** full-bleed gallery, lightbox, alt/captions.

* **`single-post-video.html`:** responsive Video block \+ transcript region.

* **`single-post-quote.html` / `single-post-aside.html`:** typography-first; ensure accessible H1 (visually hidden if needed).

---

## **3\) Page Templates (variants)**

* **`page-no-title.html`** — hero-led pages (H1 hidden visually but present for a11y).

* **`page-with-sidebar.html`** — Contact/Docs style; sidebar holds FAQs/CTAs.

---

## **4\) Special Templates**

* **`privacy-policy.html`** — Header · H1 · Content · Footer; add ToC pattern.

* **`offline/maintenance.html`** — ultra-light page; short ETA; no heavy assets.

* **`coming-soon.html`** — logo, headline, email capture, basic legal links.

* **Feeds** — default WP feed outputs; ensure validity.

---

## **5\) Template Parts ( `/parts/` )**

* `header.html` — logo, primary nav (Home, Shop, Journal, About, Contact), search, cart (demo).

* `footer.html` — secondary logo, menu, social, legal, copyright, trust badges.

* `hero-front.html` — large claim \+ CTA (obeys theme.json tokens).

* `product-quick-meta.html` — compact band: heel height/type, material, fit.

* `product-facts.html` — grid spec (Fact Box) mapped to ACF/meta.

* `author-card.html` — avatar, bio, links.

* `toc.html` — generated anchors for longform posts.

* `filters-shop.html` — taxonomy chips \+ sort (accessibly labelled).

---

## **6\) theme.json Responsibilities (extract)**

* **Global color/typography/spacing** tokens (already defined: Primary Black, Burgundy, Gold, Ivory; Playfair/Montserrat/Open Sans; 4px spacing scale).

* **`templateParts` registration** for header/footer/hero variations.

* **Typography:** fontFamilies \+ fontSizes; headings use Playfair, body Montserrat, UI Open Sans.

* **Buttons and captions:** UI font \+ weights; AA contrast enforced.

* **Layout:** content size / wide size; container padding by spacing tokens.

* **Settings → `customTemplates` (optional):** label variants in editor.

---

## **7\) General Notes (project guardrails)**

* **Single visible H1** per view; use visually-hidden H1 if design hides title.

* **show\_in\_rest \= true** for CPT/taxonomies to power Query Loop and headless use.

* **Accessibility:** heading order, skip-links, keyboard focus, aria-labels for filters, transcripts for video.

* **Performance:** responsive images (`srcset`), lazy-load, minimal CLS, paginated lists.

* **Schema:** BreadcrumbList (global), Product (PDPs), BlogPosting/Article (posts), FAQ where used.

* **Editor UX:** prefer core blocks/patterns; avoid bespoke block lock-in unless required.

---

## **8\) Required vs Optional (sign-off matrix)**

**Required now:**  
 `front-page.html`, `home.html`, `single-product.html`, `single.html`, `page.html`, `archive-product.html`, `search.html`, `404.html`, `index.html`, parts (`header`, `footer`, `hero-front`, `product-facts`, `filters-shop`)

**Phase 2 (recommended):**  
 `taxonomy-{taxonomy}.html` (heel\_type, material), `page-no-title.html`, `single-post-gallery.html`, `privacy-policy.html`, `coming-soon.html`, `author.html`, `date.html`

---

## **9\) Editor Assignment Notes**

* Set **Front page** \= “Home” (static) using `front-page.html`.

* Set **Posts page** \= “Journal” → `home.html`.

* Ensure **Shop archive** uses `archive-product.html` (Woo has\_archive true).

* Bind **patterns** to categories (Hero, Specs, Filters) for quick insertion.

---

## **10\) Acceptance Criteria (for go-live)**

* All chosen templates render with a single H1 and pass axe/ARC checks.

* Core Web Vitals budgets met (LCP \< 2.5s; CLS \< 0.1; INP within good).

* Taxonomies filter Shop correctly; pagination accessible.

* Product Fact Box maps 1:1 to meta/ACF; alt text present on all gallery images.

* Search shows query in H1; 404 provides helpful routes.

