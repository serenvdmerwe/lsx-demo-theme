# **Website Brief Template**

Luxury Black Heels — Strategy & Block Theme Brief

## **0\. Deliverables**

* **Design assets:** Logo pack (light/dark, with/without tagline, icon), colour/typography/spacing sheets.

* **Content:** Pages (Home, About, Shop, Collections, Journal, Contact), CPT entries (10+ products), Journal posts (10+), FAQs per page.

* **Technical:** Block theme repo, `theme.json` (colours/typography/spacing), templates & parts, core patterns (hero, CTA, grids).

* **Documentation:** README, CONTRIBUTING, style guide, authoring guide/onboarding.

## **1\. Project Overview**

* **Project name:** Luxury Black Heels (LBH)

* **Objective:** Showcase a high-end e-commerce demo focused exclusively on luxury black high-heel boots, demonstrating best-in-class UX, content structure, and WooCommerce readiness.

* **Approach:** WordPress Block Theme (FSE), semantic design tokens, performance-first, accessibility-led, SEO/AEO/SGO aligned.

## **2\. Objectives & Goals**

* **Demonstrate** premium product merchandising and storytelling for luxury footwear.

* **Publish** supporting narratives (Journal: styling, care, insights) to drive organic discovery.

* **Convert** interest into portfolio credibility and inbound opportunities.

* **Prioritise** accessibility (WCAG 2.2 AA), Core Web Vitals, scalable IA, and modular patterns.

## **3\. Design System**

* **Colours (tokens):**  
   Primary Black `#000000`; Burgundy `#4A1C2C`; Accent Gold `#D4AF37`; Charcoal `#333333`; Ivory `#F8F8F8`.  
   Light/Dark palettes; AA contrast minimums.

* **Typography:**  
   Headings—Playfair Display; Body—Montserrat; UI—Open Sans. Defined sizes via modular scale; clamp for responsiveness.

* **Spacing:** 4px base; steps: 4, 8, 12, 16, 24, 32, 48, 64, 96\. Tokens `spacing-10 … spacing-240`.

* **Logos:** SVG masters; variants for light/dark; icon mark; tagline lockup.

* **Imagery:** Editorial, high-contrast product shots; texture focus (leather, suede, patent).

## **4\. Information Architecture (Core Pages)**

* **Home** `/`

* **Shop (CPT archive)** `/shop/`

* **Collections** `/collections/` (Obsidian Edit, Atelier Line, Seasonal Capsules)

* **Single Product** `/product/{slug}/`

* **Journal** `/journal/` (+ category/tag/author archives)

* **About** `/about/` (Craft & Materials, Sustainability)

* **Contact** `/contact/`

* **Utility:** Search results, 404, Privacy, Terms, Legal disclaimer

**Taxonomies**

* **Product:** Heel Height (75/95/105 mm), Material (Leather, Suede, Patent), Finish, Collection.

* **Journal:** Categories—Styling & Looks, Care & Materials, Insights; Tags—brand/story keywords.

**Additional**

* Author archive, date archives, sitemap page (optional).

## **5\. Templates & Template Parts**

* **Templates:** `index`, `front-page`, `home` (posts index), `archive`, `archive-product`, `taxonomy-*`, `single`, `single-product`, `page`, `search`, `404`, `author`, `date`.

* **Template Parts:** `header`, `footer`, `sidebar` (contextual), `hero`, `post-meta`, `cta-banner`, `comments`, `mobile-nav-panel`, `skip-links`, `breadcrumbs`, `site-notice`.

* **Sidebar usage:** Journal and Shop archives (filters, categories, recent posts, CTA). Stacks under content on mobile.

## **6\. Content Model**

**Custom Post Type: Product (Luxury Black Heels)**

* **Fields:** Title, Excerpt (25 words), Featured image (alt/desc), Description (100–200 words), Fact Box (Heel Height, Material, Finish, Collection, Care), Gallery (2–6), Videos (optional URL), Care Instructions (rich text), Prompt Notes (internal), SKU/Price (if simulating checkout).

* **Taxonomies:** Heel Height, Material, Finish, Collection.

**Blog Posts (Journal)**

* **Fields:** Title, Featured image, 2–3 inline images w/ alt, structured headings (H2/H3), pull-quotes, related links (Products/Collections).

**Pages**

* **Blocks:** Hero, media \+ text, grids, CTA banners, FAQ accordions, contact form.

## **7\. Homepage Layout**

1. **Hero:** “Crafted to Command” \+ primary CTA “Shop the Collection” \+ high-impact hero image.

2. **Brand Intro:** 2–3 lines on craftsmanship and exclusivity.

3. **Featured Products:** 3–6 cards (editor-select or Query Loop: bestsellers).

4. **Collections Strip:** Obsidian Edit / Atelier / Seasonal.

5. **Journal Teaser:** Latest 3 posts (Styling, Care, Insights).

6. **Craft & Materials:** Short band \+ link to About/Craft.

7. **CTA Banner:** “Step Into Luxury” \+ CTA.

8. **Trust Row (optional):** Press badges/affiliations (placeholder).

## **8\. Calls-to-Action**

* **Primary:** “Shop the Collection”, “Discover Timeless Elegance”

* **Secondary:** “Read the Journal”, “Explore Craft & Materials”

* **Utility:** “Join the List”, “Contact the Studio”

## **9\. Content Checklist**

* **Logos:** SVG \+ PNG (light/dark; with/without tagline; icon).

* **Images:** Hero, banners, product galleries (1200–1600px width), editorial textures.

* **CPT Entries:** 10+ products, each with fact box and care notes.

* **Journal:** 10 posts (styling, care, insights).

* **Contact:** Scenic background, portrait/icon, form copy.

* **Alt text & captions:** For all media; filenames kebab-case.

## **10\. Technical Implementation**

* **Theme base:** Custom block theme starter.

* **`theme.json`:** Colour palette (brand \+ neutrals), typography (families, sizes, line-height), spacing scale, block supports.

* **Patterns:** Hero, Product grid, Collection strip, CTA banner, Journal list, FAQ.

* **WooCommerce (sim/demo):** Product templates; attributes mapped to taxonomies; custom tabs (Care, Materials).

* **Accessibility:** One visible H1; keyboard nav; focus states; alt text; aria where needed.

* **Performance:** Optimised images (`srcset`, lazy), minified assets, critical CSS if needed, preconnect for fonts, `display=swap`.

## **11\. Workflow**

* **Version control:** GitHub (main/dev branches, PR reviews).

* **Local dev:** WP \+ FSE; WordPress Studio/Local; VS Code.

* **Testing:** WP Theme Unit Test, Gutenberg test content, a11y checks (axe), PageSpeed.

* **CI/CD:** Linting (PHPCS), build & deploy to staging, migration to live.

* **Content ops:** Authoring guide; checklist gating (alt text, meta, internal links).

## **12\. SEO, AEO & SGO**

* **SEO:** Yoast installed; descriptive slugs (`/product/black-obsidian-boot/`), single H1, H2/H3 hierarchy, meta titles 55–60 chars, descriptions 150–160 chars; image alt with material/finish context.

* **Internal linking:** Journal ↔ Products/Collections; pillar pages (Shop, Collections).

* **AEO:** FAQ schema on key pages (Care, Shipping/Returns—demo).

* **SGO:** Conversational copy, entity-rich terms (materials, heel heights), clear intents; align anchor text with targets.

## **13\. FAQs (Per Page)**

* **Home:** Who are we? What defines our craftsmanship?

* **About:** What materials do we use? How do we ensure longevity?

* **Shop Archive:** How to choose heel height? What sizes are offered (demo)?

* **Single Product:** Care instructions? Heel height, fit guidance, finish details.

* **Journal:** Posting cadence? Can readers request topics?

* **Contact:** Typical response time? Collaboration/press enquiries?

---

### **Next steps (execution-ready)**

* I can convert this brief into:

  * `theme.json` starter (palette/typography/spacing prefilled).

  * Pattern files (`patterns/*.json`) for hero, grids, CTAs, FAQs.

  * Template scaffolds for `front-page`, `archive-product`, `single-product`, `search`, `404`.

  * Navigation block exports for header/footer menus.

