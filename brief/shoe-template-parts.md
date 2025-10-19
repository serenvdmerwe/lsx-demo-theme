# **Template Parts**

\[Theme / Project Name\]: Luxury Black Heels Demo

---

## **Template Parts — Approach & Checklist**

Parts to ship (recommended):

* `parts/header.html`

* `parts/footer.html`

* `parts/sidebar.html` (Blog/Archive only)

* `parts/hero.html` (front/archives/special pages)

* `parts/post-meta.html` (journal) / `parts/product-quick-meta.html` (shop)

* `parts/comments.html` (journal only)

* `parts/cta-banner.html`

* `parts/search-panel.html` (off-canvas)

* `parts/skip-links.html`

* `parts/breadcrumbs.html`

* `parts/site-notice.html`

* `parts/mobile-nav-panel.html`

* `parts/author-card.html`

Global guardrails:

* Single visible H1 per view; provide visually hidden fallback where designs hide titles.

* AA contrast minimum, consistent focus outlines, keyboard operability.

* Keep DOM lean; lazy-load heavy widgets and media.

---

## **1\) Header**

Purpose: brand identity and primary navigation with luxury-grade polish.

Minimum blocks/elements:

* Site Logo (SVG) or Site Title linked to home

* Navigation (block-based)

* Mobile toggle (hamburger) with proper ARIA states

* Optional compact search trigger

Recommended structure:

* Top of DOM: `parts/skip-links.html` (links to `#content`, `#primary-nav`, `#footer`)

* Main row: Logo (left) · Primary Nav (center) · Utilities (right)

* Utilities: Search trigger → `parts/search-panel.html`, Cart (demo), Account (optional)

Header selections:

* Include: Logo/Brand Name; Primary Navigation Menu; Search (as panel); Contact in menu; Call-to-Action button (See the Collection); Shopping Cart icon (demo); User Profile toggle (optional off by default); Announcement Bar (`parts/site-notice.html`); Dropdown menus; Accessibility-respecting focus styles; Trust badges in footer (not header)

* Exclude or relocate: Tagline (front hero), Social icons (footer), Subscription box (use CTA banner), Breadcrumbs (separate part below hero), Live chat, Appointment, Wishlist, Store finder, Promotional banners in header

Fast QA checklist:

* Logo links home; alt text present

* Navigation labels are descriptive; `aria-expanded` and `aria-controls` wired on mobile toggle

* Search trigger labelled (“Open search”)

* Focus trap and ESC-to-close for mobile and search panels

---

## **2\) Footer**

Purpose: secondary navigation, credibility, and legal with clear hierarchy.

Minimum blocks/elements:

* Copyright (auto year)

* Legal/Compliance menu (Privacy, Terms)

* Secondary navigation

* Social links

Footer sections (proposed):

* Row 1: Newsletter CTA

* Row 2: Separator

* Row 3: Logos and affiliations (trust badges, accessibility note)

* Row 4: Five-column content

* Row 5: Separator

* Row 6: Bottom bar — Copyright, Legal, Social

Footer columns mapping:

* Column 1: Logo \+ short tagline (Crafted to Command)

* Column 2: Footer Menu 1 (Shop: Heels, Boots, Collections)

* Column 3: Footer Menu 2 (Journal: Styling, Care, Materials)

* Column 4: Footer Menu 3 (About, Contact, Accessibility)

* Column 5: Contact email, reassurance microcopy, compact search

Footer element selections:

* Include: Navigation links; Legal links; Social icons; Logo; Contact email; Recent posts; Certifications and memberships; CTA; Brief about; Copyright; Subscription form; Logos and affiliations; Compact search

* Optional: Sitemap page link

Fast QA checklist:

* Logical groupings; visible headings (screen-reader only where appropriate)

* Descriptive link names

* Contrast meets AA; tap targets at least 44px

---

## **3\) Sidebars (optional, high leverage)**

Use on Journal single and Journal archives. Avoid on Product pages.

Sidebar elements for Journal:

* Search bar

* Recent posts (5)

* Categories and tags (chips)

* Newsletter signup (small)

* Related posts (taxonomy driven)

* Author bio (`parts/author-card.html`)

Shop archive alternative:

* Use a top filter row (Heel Type, Material, Finish); on mobile, expose as filter drawer.

Mobile behaviour:

* Stack after main content or use off-canvas drawer with labelled toggle (“Filters”, “Journal menu”).

* Implement focus trap and ESC close.

---

## **Utility Template Parts (ship now)**

`parts/skip-links.html`

* Links: “Skip to content” (`#content`), “Skip to navigation” (`#primary-nav`), “Skip to footer” (`#footer`)

* First tabbable elements; visible on focus

`parts/site-notice.html`

* Dismissible promo or announcement; persist dismissal state (localStorage)

* `role="region"`; use `aria-live="polite"` only if content updates dynamically

`parts/breadcrumbs.html`

* `<nav aria-label="Breadcrumb">` with separators marked `aria-hidden="true"`

* Compatible with Yoast or RankMath breadcrumb blocks; avoid duplication

`parts/search-panel.html`

* Off-canvas or overlay search with labelled close button

* Keyboard trap; restore focus to trigger on close

`parts/mobile-nav-panel.html`

* Reuse Navigation block; accessible close; backdrop click and ESC to close

`parts/hero.html`

* Dynamic title or term name; optional lead; optional background image

* Place breadcrumbs beneath; ensure only one H1 per page

`parts/post-meta.html` (Journal)

* Author, date, categories/tags, optional reading time

* Semantic list or definition list for meta

`parts/product-quick-meta.html` (Shop)

* Heel height/type, material, finish, fit, size range (definition list)

* Small share or bookmark buttons with clear labels

`parts/cta-banner.html`

* Headline with one or two supporting lines, primary button (See the Collection), secondary button (Read the Journal)

`parts/comments.html` (optional)

* Heading “Comments”, Comment List, Comment Form with labelled inputs

* Anti-spam and privacy reassurance

---

## **theme.json hooks (summary)**

* Register template parts (`templateParts`) and style via tokens: Primary Black `#000000`, Burgundy `#4A1C2C`, Gold `#D4AF37`, Ivory `#F8F8F8`.

* Typography: Playfair (headings), Montserrat (body), Open Sans (UI).

* Spacing: 4px scale mapped to header/footer/hero paddings.

* Buttons and captions: UI font with medium weight; enforce AA contrast.

---

## **IDs and Accessibility Map**

* Main wrapper: `id="content"`

* Primary nav wrapper: `id="primary-nav"`

* Footer wrapper: `id="footer"`

* Search trigger: `aria-controls="search-panel" aria-expanded="false"`

* Mobile menu trigger: `aria-controls="mobile-nav" aria-expanded="false"`

---

## **Acceptance Criteria**

* Skip links present, target existing IDs, and are visible on focus

* Header, mobile navigation, and search panel are keyboard operable with focus trap and ESC close

* One visible H1 per page; hero respects page semantics

* Footer meets AA contrast and exposes legal links and copyright year

* Sidebar collapses on mobile or moves off-canvas; no duplicated, conflicting navigation

* Breadcrumbs correct on singular, archive, and taxonomy views

* No layout shift from late-loading parts (reserve space; lazy-load judiciously)

