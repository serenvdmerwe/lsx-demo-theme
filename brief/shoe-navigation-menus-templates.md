# **Navigation Menus**

\[Luxury Black Heels Demo\]

## **0\. Deliverables**

-   Primary menu information architecture (labels, slugs, depth).

-   Footer menu matrix (admin/legal/social).

-   Sidebar menus (contextual quick links \+ sub-nav).

-   Two example mega menus for Shop and Collections.

-   Implementation notes (WP locations, accessibility, and mobile patterns).

---

## **1\) Introduction to Navigation Menus — Guardrails**

-   Cap primary to 6–7 items max; everything else nests.

-   Labels \= plain English; no jargon; 1–2 words when possible.

-   Always show current location state; keep identical across pages.

-   Mobile: collapse to a single toggle; trap focus; restore on close.

-   SEO: slugs in kebab-case; ensure each item resolves to a canonical URL.

---

## **2\) Primary Menu (Header)**

**Location:** `header-primary`
**Pattern:** flat 6 items with targeted dropdowns

-   Home (`/`)

-   Shop (`/shop/`)

    -   New Arrivals (`/shop/?sort=newest`)

    -   Bestsellers (`/shop/?sort=bestsellers`)

    -   Heels by Height

        -   75 mm (`/shop/heels/75mm/`)

        -   95 mm (`/shop/heels/95mm/`)

        -   105 mm (`/shop/heels/105mm/`)

    -   Materials

        -   Italian Leather (`/shop/material/leather/`)

        -   Suede (`/shop/material/suede/`)

        -   Patent Finish (`/shop/finish/patent/`)

-   Collections (`/collections/`)

    -   The Obsidian Edit (`/collections/obsidian/`)

    -   Atelier Line (`/collections/atelier/`)

    -   Seasonal Capsules (`/collections/seasonal/`)

-   Blog (`/blog/`)

    -   Styling & Looks (`/category/styling/`)

    -   Care & Materials (`/category/care/`)

    -   Insights (`/category/insights/`)

-   About (`/about/`)

    -   Craft & Materials (`/about/craft/`)

    -   Sustainability (`/about/sustainability/`)

-   Contact (`/contact/`)

**Utility icons (right-aligned, secondary):** Search, Cart, Account

-   Search opens off-canvas panel; Cart → `/cart/`; Account → `/my-account/` (optional for demo).

---

## **3\) Footer Menus**

**Locations:** `footer-primary`, `footer-legal`, `footer-social`
Use a 4-column layout \+ bottom bar.

### **Footer Page Menus (4 columns)**

**Column 1 — Shop**

-   Shop All (`/shop/`)

-   New Arrivals (`/shop/?sort=newest`)

-   Bestsellers (`/shop/?sort=bestsellers`)

-   Heels by Height (`/shop/heels/`)

-   Materials (`/shop/material/`)

**Column 2 — Collections**

-   All Collections (`/collections/`)

-   Obsidian Edit (`/collections/obsidian/`)

-   Atelier Line (`/collections/atelier/`)

-   Seasonal Capsules (`/collections/seasonal/`)

-   Lookbooks (future) (`/collections/lookbooks/`)

**Column 3 — Blog**

-   Blog Home (`/blog/`)

-   Styling & Looks (`/category/styling/`)

-   Care & Materials (`/category/care/`)

-   Insights (`/category/insights/`)

-   All Posts (`/blog/`)

**Column 4 — Brand**

-   About (`/about/`)

-   Craft & Materials (`/about/craft/`)

-   Sustainability (`/about/sustainability/`)

-   Contact (`/contact/`)

-   Newsletter (`/contact/#newsletter` or modal)

### **Legal Menu**

**Location:** `footer-legal`

-   Terms & Conditions (`/terms/`)

-   Privacy Policy (`/privacy-policy/`)

-   Legal Disclaimer (`/legal-disclaimer/`)

-   Sitemap (HTML) (`/sitemap/`) \[optional\]

### **Social Menu**

**Location:** `footer-social`
(Replace with real profiles when ready.)

-   Instagram

-   Pinterest

-   YouTube

-   LinkedIn

**Bottom bar:** © {YEAR} Luxury Black Heels. All rights reserved. | Legal menu | Social icons

---

## **4\) Sidebar Menus (Contextual)**

**Location:** `sidebar-primary` (visible on Journal and Shop archives; stacked under content on mobile)

**A. Journal Sidebar (posts and /journal/)**

-   Search

-   Categories

    -   Styling & Looks

    -   Care & Materials

    -   Insights

-   Recent Posts (5)

-   Featured Post

-   CTA: “Discover the Collection” → `/collections/`

**B. Shop Sidebar (archive /shop/)**

-   Filters (block): Size, Heel Height, Material, Finish

-   Sort by: Newest | Price | Bestsellers

-   CTA: “The Obsidian Edit” → `/collections/obsidian/`

---

## **5\) Mega Menus (Examples)**

### **Mega Menu: Shop**

**Trigger:** hover/click on “Shop”
**Layout:** 3 columns \+ promo tile

-   **Column 1 — Shop by Height**

    -   75 mm

    -   95 mm

    -   105 mm

-   **Column 2 — Materials**

    -   Italian Leather

    -   Suede

    -   Patent Finish

-   **Column 3 — Curated**

    -   New Arrivals

    -   Bestsellers

    -   Editor’s Picks

-   **Promo Tile (right)**

    -   Image: “Black Obsidian Boot”

    -   Text: “Crafted to Command”

    -   CTA: View Product

### **Mega Menu: Collections**

**Trigger:** “Collections”
**Layout:** 3 columns \+ wide banner

-   **Column 1**

    -   The Obsidian Edit

-   **Column 2**

    -   Atelier Line

-   **Column 3**

    -   Seasonal Capsules

-   **Banner (full-width bottom)**

    -   “Explore Lookbooks” → future `/collections/lookbooks/`

**Accessibility:**

-   Toggle uses `aria-expanded`, `aria-controls`.

-   Panel uses `role="dialog"` pattern when overlay; trap focus; ESC closes.

---

## **Implementation Notes (WordPress)**

-   **Menu Locations:** register `header-primary`, `footer-primary`, `footer-legal`, `footer-social`, `sidebar-utility` in `theme.json` or `functions.php`.

-   **Block theme:** use Navigation block instances saved to these locations; export as patterns for repeat use.

-   **Active state:** ensure visible current-menu-item styles and aria-current on active links.

-   **Mobile pattern:** off-canvas panel (Template Part: `parts/mobile-nav-panel.html`) with focus trap and backdrop click to dismiss.

-   **Performance:** avoid deep nesting beyond 3 levels; lazy-load images inside mega menus.

---

## **Quick Copy — Primary Menu (CSV import friendly)**

`Label,URL,Parent`
`Home,/,`
`Shop,/shop/,`
`New Arrivals,/shop/?sort=newest,Shop`
`Bestsellers,/shop/?sort=bestsellers,Shop`
`Heels by Height,/shop/heels/,Shop`
`75 mm,/shop/heels/75mm/,Heels by Height`
`95 mm,/shop/heels/95mm/,Heels by Height`
`105 mm,/shop/heels/105mm/,Heels by Height`
`Materials,/shop/material/,Shop`
`Italian Leather,/shop/material/leather/,Materials`
`Suede,/shop/material/suede/,Materials`
`Patent Finish,/shop/finish/patent/,Materials`
`Collections,/collections/,`
`Obsidian Edit,/collections/obsidian/,Collections`
`Atelier Line,/collections/atelier/,Collections`
`Seasonal Capsules,/collections/seasonal/,Collections`
`Journal,/journal/,`
`Styling & Looks,/category/styling/,Journal`
`Care & Materials,/category/care/,Journal`
`Insights,/category/insights/,Journal`
`About,/about/,`
`Craft & Materials,/about/craft/,About`
`Sustainability,/about/sustainability/,About`
`Contact,/contact/,`
