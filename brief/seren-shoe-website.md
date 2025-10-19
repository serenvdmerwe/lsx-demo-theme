# **Seren’s Shoe Website**

## *Block Theme Website Brief*

Here’s a **detailed Block Theme Website Brief** for Seren’s Shoe Website, consolidating our planning discussions and the developer planning notes from your uploaded documents.

---

[1\. Project Overview](#1.-project-overview)

[2\. Objectives](#2.-objectives)

[3\. Design System](#3.-design-system)

[4\. Information Architecture](#4.-information-architecture)

[5\. Templates & Template Parts](#5.-templates-&-template-parts)

[6\. Content Model](#6.-content-model)

[7\. Homepage Layout](#7.-homepage-layout)

[8\. Calls-to-Action](#8.-calls-to-action)

[9\. Content Checklist](#9.-content-checklist)

[10\. Technical Implementation](#10.-technical-implementation)

[11\. Development Workflow](#11.-development-workflow)

[12\. SEO, AEO & SGO](#12.-seo,-aeo-&-sgo)

---

## **1\. Project Overview** {#1.-project-overview}

The goal is to design and build a **custom WordPress block theme** for Brandon’s personal fishing adventures. The site will document species profiles, share fishing stories, and connect visitors to the rivers of KwaZulu-Natal, with a focus on **clean UX, accessibility, performance, and SEO**.

The site uses **Full Site Editing (FSE)** principles, powered by `theme.json` for global styles, custom templates, and patterns.

---

## **2\. Objectives** {#2.-objectives}

* **Showcase luxury shoe** **brands** in an e-commerce environment.

* **Publish blog posts**: Luxury boots.

* **Introduce Velore Heels** and the black boot journey.

* **Support discoverability** via SEO, AEO (Answer Engine Optimisation), and SGO (Search Generative Optimisation).

* **Ensure performance & accessibility**: lightweight, mobile-first, Core Web Vitals optimised.

---

## **3\. Design System** {#3.-design-system}

* **Colours:** Inspired by Minimalistic Living Spaces ( Black Obsidian and Pearl, Smooth Black Leathers, Gold Buckles and Pins).

* **Typography:** Google Fonts pairing — **Playfair Display (headings)** \+ **Inter (body, UI)**.

* **Spacing scale:** 4px → 96px, slugged as `spacing-10` to `spacing-100`.

* **Logos:** Light & dark variants, with and without tagline.

* **Imagery:** Realistic fish photography/illustrations, river landscapes, Brandon’s portraits.

---

## **4\. Information Architecture** {#4.-information-architecture}

**Pages:**

* Home `/`

* About `/about/`

* Fish Archive `/fish/`

* Fish Single Template `/fish/{species}/`

* Blog `/blog/`

* Blog Archives: Category, Tag, Author

* Contact `/contact/`

**Taxonomies:**

* Fish CPT: `species` taxonomy (Yellowfish, Tilapia, Catfish, Tigerfish, Other River Fish).

* Blog: Categories (Adventures, Tips & Tricks, Conservation, Gear, Seasons), Tags (Huttenspruit, Fly Fishing, etc.).

---

## **5\. Templates & Template Parts** {#5.-templates-&-template-parts}

* **Templates:**

  * `index.html`, `archive.html`, `singular.html`

  * `page.html`, `page-no-title.html`, `page-with-sidebar.html`

  * `author.html`, `category.html`, `tag.html`, `404.html`, `search.html`

* **Template Parts:**

  * `header.html`, `footer.html`, `sidebar.html`, `comments.html`

**Sidebar:** Appears on blog posts & archives — recent posts, categories dropdown, featured fish spotlight, CTA.

---

## **6\. Content Model** {#6.-content-model}

* **Fish CPT**: Featured Image, Description, Habitat, Season, Size, Bait/Lure, Conservation, Brandon’s Notes, Gallery.

* **Blog Posts**: Title, featured image, 2–3 content images, structured headings.

* **Pages**: Rich media content (portrait galleries, scenic banners, call-to-action blocks).

---

## **7\. Homepage Layout** {#7.-homepage-layout}

1. **Hero**: Landscape river image, headline, CTA (“Explore the Fish of Huttenspruit”).

2. **Intro**: Brandon’s fishing story.

3. **Featured Fish**: 3 species cards.

4. **Recent Blog Posts**: 3–4 posts.

5. **About Preview**: Brandon’s portrait \+ teaser.

6. **CTA Banner**: “Learn about fish species in KZN” → `/fish/`.

7. **Contact Teaser**: Simple link to Contact page.

---

## **8\. Calls-to-Action** {#8.-calls-to-action}

* **Primary CTA:** “Discover the Fish of KZN” → `/fish/`.

* **Secondary CTA:** “Read Brandon’s Stories” → `/blog/`.  
   Consistent use across pages, sidebar, and footer.

---

## **9\. Content Checklist** {#9.-content-checklist}

* Light & dark logos (with & without tagline).

* 10 fish species profiles (with featured images).

* 10 blog posts (outlined, featured images \+ 2–3 visuals each).

* About page images (portrait gallery).

* Homepage hero image.

* Contact page scenic background \+ Brandon portrait \+ optional Huttenspruit map.

---

## **10\. Technical Implementation** {#10.-technical-implementation}

* **Parent Theme:** Based on Ollie or similar modern block starter  
  Github-Issues  
  .

* **theme.json:** Controls colours, typography, spacing, and block settings.

* **Patterns:** Hero, CTA, Section layouts (5 registered from WP.org).

* **Post Formats:** Audio & Video (for podcasts/fishing clips).

* **Assets Folder:** `/assets/css`, `/assets/js`, `/assets/images`.

* **Functions.php:** Custom functionality, enqueue scripts, template part registration.

* **Accessibility:** Conform to WCAG; test with Lighthouse & WP a11y tools.

* **Performance:** PageSpeed Insights, Core Web Vitals optimised.

---

## **11\. Development Workflow** {#11.-development-workflow}

* **Local Dev:** WordPress Studio \+ GitHub Desktop \+ VS Code  
  Github-Issues  
  .

* **Version Control:** GitHub repo with CONTRIBUTING.md & CODE\_OF\_CONDUCT.md.

* **Testing:** WP Theme Unit Test data, Gutenberg Test Data.

* **CI/CD:** GitHub Actions for linting, PHPCS, PHPUnit.

* **Staging:** Deployed with All-in-One WP Migration plugin  
  Github-Issues  
  .

---

## **12\. SEO, AEO & SGO** {#12.-seo,-aeo-&-sgo}

* **SEO:** Optimised slugs, Yoast plugin setup, descriptive titles & meta descriptions.

* **AEO:** FAQ schema per page.

* **SGO:** Natural, conversational copy; descriptive alt text; internal linking between species and stories.

---

✅ This brief unites **design**, **content**, and **technical requirements** into one clear document for Brandon’s Block Theme project.

---

Would you like me to also prepare this as a **one-page visual PDF brief** (with sections, colour palette, typography, and IA diagram) so it can be handed off directly to a developer or designer?

