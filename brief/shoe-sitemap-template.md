# **Sitemaps**

\[Theme / Project Name\]: Luxury Black Heels Demo

## **0\. Deliverables**

* Text sitemap (hierarchical list below) ready for client sign-off.

* Visual sitemap (GlooMaps link \+ PNG export).

* XML sitemap configuration (Yoast) with page inclusion/exclusion rules.

---

## **1\. Text Sitemap**

Use these slugs/titles verbatim unless noted. Keep exactly one H1 per page and map CTAs accordingly.

* Homepage (`/`)

  * Hero: “Step Into Luxury”

  * Featured Products (3)

  * Journal Highlights (3)

  * Brand Promise band

  * Newsletter CTA

* Shop (`/shop/`) — product archive

  * Filters (Size, Heel Height, Material, Finish)

  * Sorting (Newest, Price, Bestsellers)

* Collections (`/collections/`) — optional archive (Lookbooks)

  * Collection: The Obsidian Edit (`/collections/obsidian/`)

  * Collection: Atelier Line (`/collections/atelier/`)

* Product (single) — template only (`/product/{product-slug}/`)

  * Example: Black Obsidian Boot (`/product/black-obsidian-boot/`)

  * System pages:

    * Cart (`/cart/`)

    * Checkout (`/checkout/`)

    * Order Received (Thank You) (`/checkout/order-received/`)

    * My Account (`/my-account/`) \[optional for demo\]

* Journal (`/journal/`) — posts index

  * Categories

    * Styling & Looks (`/category/styling/`)

    * Care & Materials (`/category/care/`)

    * Insights (`/category/insights/`)

  * Single Post (template) (`/journal/{post-slug}/`)

* About (`/about/`)

  * Craft & Materials (`/about/craft/`)

  * Sustainability (`/about/sustainability/`)

* Contact (`/contact/`)

  * Thank You (form confirmation) (`/contact/thanks/`)

* Legal (`/legal/`)

  * Privacy Policy (`/privacy-policy/`)

  * Terms & Conditions (`/terms/`)

  * Legal Disclaimer (`/legal-disclaimer/`)

* Utility

  * Search Results (`/search/?q={query}`)

  * 404 Not Found (`/404/`) \[template\]

  * Sitemap (HTML for humans, optional) (`/sitemap/`)

Notes:

* If you prefer a leaner MVP, convert **Collections** to a single page with featured looks.

* Keep product slugs descriptive and short: `/product/black-leather-stiletto-95mm/`.

---

## **2\. Visual Sitemap**

**Tool:** GlooMaps

**Steps**

1. Build the structure above in GlooMaps (root → sections → children).

2. Click **SAVE** to generate a shareable URL (store this in project docs).

3. Export a **PNG** and add it to the repo/docs folder:  
    `docs/sitemaps/luxury-black-heels-visual-sitemap-v1.png`

4. Add the GlooMaps URL to your briefing pack and link it from the project README.

**Conventions**

* Use node notes for template hints (e.g., “single product”, “archive”).

* Colour-code: Shop (products) / Journal (content) / Legal (compliance).

---

## **3\. XML Sitemap**

**Purpose:** Help search engines discover and prioritise your pages.

**Plugin:** Yoast SEO (recommended)

**Configuration (Yoast → Settings → Site features → XML sitemaps)**

* Enable **XML sitemaps**.

* Include: Pages, Posts (Journal), Products.

* Exclude from sitemap:

  * Cart (`/cart/`)

  * Checkout (`/checkout/`)

  * Order Received (`/checkout/order-received/`)

  * My Account (`/my-account/`) if present

  * 404 template, search results, internal utility pages

* Optional: exclude **Collections** if they’re purely editorial and duplicated by product/category pages.

**Sitemap index**

* `https://{domain}/sitemap_index.xml`

  * `page-sitemap.xml`

  * `post-sitemap.xml`

  * `product-sitemap.xml`

  * `category-sitemap.xml` (Journal)

  * `product-cat-sitemap.xml` (if using Woo categories)

**Best-practice notes**

* Ensure each indexed URL returns 200, is canonical, and has unique title/meta.

* Use clean slugs (kebab-case; no stop words unless meaningful).

* Regenerate after major IA changes; resubmit in Google Search Console.

* Block low-value pages via `noindex` where appropriate (Yoast per-page setting).

---

### **Ready-to-copy “Text Sitemap” block (for handoff)**

`Homepage (/)`  
  `About`  
    `Craft & Materials`  
    `Sustainability`  
  `Shop (/shop/)`  
    `Product (single) (/product/{product-slug}/)`  
    `Cart (/cart/)`  
    `Checkout (/checkout/)`  
    `Order Received (/checkout/order-received/)`  
    `My Account (/my-account/) [optional]`  
  `Collections (/collections/)`  
    `The Obsidian Edit (/collections/obsidian/)`  
    `Atelier Line (/collections/atelier/)`  
  `Journal (/journal/)`  
    `Category: Styling & Looks`  
    `Category: Care & Materials`  
    `Category: Insights`  
    `Post (single) (/journal/{post-slug}/)`  
  `Contact (/contact/)`  
    `Thank You (/contact/thanks/)`  
  `Legal (/legal/)`  
    `Privacy Policy (/privacy-policy/)`  
    `Terms & Conditions (/terms/)`  
    `Legal Disclaimer (/legal-disclaimer/)`  
  `Utility`  
    `Search Results (/search/?q={query})`  
    `404 Not Found (/404/)`  
    `Sitemap (HTML) (/sitemap/) [optional]`  
