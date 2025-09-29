# **🎣 Brandon’s Fishing Adventures**

## _Block Theme Website Brief_

Here’s a **detailed Block Theme Website Brief** for Brandon’s Fishing Adventures, consolidating our planning discussions and the developer planning notes from your uploaded documents.

---

### **1. Project Overview**

-   **Goal:** Build a WordPress block theme for Brandon’s Fishing Adventures that is visually appealing, easy to navigate, and optimized for storytelling and SEO.
-   **Audience:** Fishing enthusiasts, beginners, and conservation-minded individuals.

---

### **2. Objectives**

-   Showcase Brandon’s fishing stories and species profiles.
-   Provide a user-friendly guide to fish species in KZN.
-   Encourage engagement through blog posts and a contact form.

---

### **3. Design System**

-   **Typography:** Montserrat (headings), Lora (body), Open Sans (UI).
-   **Colours:** River blues, muted greens, warm greys, burnt orange.
-   **Spacing:** Consistent 4px-based scale.

---

### **4. Information Architecture**

-   **Pages:** Home, About, Fish (CPT archive), Blog, Contact.
-   **Taxonomies:** Species, Locations.
-   **Templates:** Single Fish, Single Blog Post, Archive Pages.

---

### **5. Templates & Template Parts**

-   **Header:** Logo, navigation, search bar.
-   **Footer:** Social links, copyright, quick links.
-   **Single Fish Template:** Hero image, description, fact box, related species.
-   **Blog Template:** Featured image, content, author bio, related posts.

---

### **6. Content Model**

-   **Fish CPT:** Species name, description, habitat, fishing season, bait.
-   **Blog Posts:** Title, featured image, content, tags, categories.
-   **Contact Form:** Name, email, message.

---

### **7. Homepage Layout**

-   Hero section with Brandon’s story.
-   Featured fish species.
-   Latest blog posts.
-   Call-to-action: “Explore the Fish Guide.”

---

### **8. Calls-to-Action**

-   “View Species” (Fish CPT archive).
-   “Read More” (Blog posts).
-   “Contact Brandon” (Contact page).

---

### **9. Content Checklist**

-   Fish profiles (10 species).
-   Blog posts (5–10 initial posts).
-   High-quality images with alt text.


---

## **2\. Site Structure** {#2.-site-structure}

**Define overall architecture**

* Home

* About

* Services/Products/CPT archive

* Blog (index \+ category/tag/author archives)

* Contact

* 404/Search

**Deliverables:**

* Sitemap diagram (tree or flowchart)

* Content hierarchy outline

---

## **3\. Style Guide** {#3.-style-guide}

**Colours**

* Light and dark palettes defined in theme.json.

**Spacing & Layout**

* Scale (4px → 96px) with predictable increments.

* Consistent use across sections and templates.

**Responsive Design**

* Mobile-first breakpoints (small, medium, large, extra-large).

* Patterns that scale gracefully across devices.

---

## **4\. Brand Guide** {#4.-brand-guide}

**Personality & Positioning**

* Define 3–5 keywords that capture the brand (e.g. adventurous, calm, professional).

**Mood Board**

* Collection of colours, photography, textures, type examples.

**Values & Mission**

* 3–5 guiding statements about the brand’s purpose and promise.

---

## **5\. Voice & Tone Guide** {#5.-voice-&-tone-guide}

**Voice**

* Friendly, human, warm (or adjusted per project).

**Tone by Page**

* Homepage: energetic, inspiring.

* About: personal, storytelling.

* CPT Archive: informative, educational.

* Blog: conversational.

* Contact: clear, approachable.

**Writing Guidelines**

* Active voice, short sentences (8–18 words).

* UK spelling, inclusive language.

* Value \+ verb in headlines, clear CTAs.

**Sample Content Snippets**

* CTA: “Discover the Fish of KZN”

* Form microcopy: “Enter your email”

* Error state: “Email is missing ‘@’. Add it to continue.”

---

## **6\. Logo Brief & Design** {#6.-logo-brief-&-design}

**Requirements:**

* SVG format, created in Figma (with AI assistance optional).

* Variants: light, dark, with/without tagline, favicon.

* Works at multiple sizes and contexts (print, digital, social).

**Usage Guidelines:**

* Minimum size, clear space, approved backgrounds.

---

## **7\. Custom Post Type, Fields & Taxonomy Brief** {#7.-custom-post-type,-fields-&-taxonomy-brief}

**Define Structures**

* CPT name & purpose (e.g. Fish, Tours, Products).

* Fields (e.g. description, gallery, location, size).

* Taxonomies (e.g. species, categories).

**Relationships**

* CPT ↔ Blog posts (cross-linking).

* CPT ↔ Taxonomies (archives, filtering).

---

## **8\. SEO Checklist** {#8.-seo-checklist}

**Requirements:**

* Install Yoast SEO.

* Descriptive slugs.

* H1 per page.

* Optimised meta descriptions.

* Alt text for images.

**Keyword Strategy:**

* Identify 5–10 core keywords.

* Map keywords to pages.

**Metadata Specs:**

* Title length: 55–60 chars.

* Meta description: 150–160 chars.

---

## **9\. Website Tagline Ideas** {#9.-website-tagline-ideas}

**Process:**

* Brainstorm 5–10 options.

* Test with target audience.

* Select final with rationale.

**Examples:**

* “Explore the Fish of Huttenspruit”

* “Adventures by the River”

---

## **10\. Content Collection Checklist** {#10.-content-collection-checklist}

**Assets:**

* Logos (all variants).

* Hero images.

* Portraits.

* CPT entries (10 minimum).

* Blog posts (10 minimum).

* Contact page media.

**Process:**

* Gather raw text \+ media.

* Apply formatting (headings, captions, alt text).

* Upload to CMS.

**Formatting Guidelines:**

* Filenames: page-section.jpg (e.g. fish-smallmouth-yellowfish.jpg).

* Use consistent aspect ratios for images.

---

## **11\. Typography** {#11.-typography}

**Purpose:** Ensure consistent type usage across the site.

* **Font Pairing:** Define heading and body fonts. Example: *Playfair Display* (headings) \+ *Inter* (body).

* **Weights & Styles:** Headings (600–700 bold), Body (400 regular, 500 medium).

* **Scale:** Modular scale, e.g. H1 \= 2.5rem, H2 \= 2rem, body \= 1rem.

* **Line Height:** Body 1.4–1.6 for readability.

* **Responsive Adjustments:** Smaller heading sizes on mobile.

---

## **12\. Colours** {#12.-colours}

**Purpose:** Define light and dark palettes for brand consistency.

* **Core Palette:** Primary, Secondary, Accent, Neutral, Background.

* **Light Mode:** Muted neutrals with strong contrast text.

* **Dark Mode:** Dark backgrounds with adjusted accents.

* **Accessibility:** Contrast ratio AA+ (4.5:1 text, 3:1 large text).

* **Implementation:** theme.json under `settings.color.palette`.

* **Naming Conventions:** Slugs (e.g. primary, secondary, neutral-100 → neutral-900).

---

## **13\. Spacing** {#13.-spacing}

**Purpose:** Create rhythm and consistency for layouts.

* **Base Unit:** 4px. Increments: 4, 8, 12, 16, 24, 32, 48, 64, 96\.

* **Naming Convention:** spacing-10 \= 4px, spacing-20 \= 8px, etc.

* **Usage:**

  * Small spacing: buttons, inputs.

  * Medium spacing: content gaps.

  * Large spacing: section dividers.

* **Responsive Rules:** Reduce padding/margins on mobile.

* **Implementation:** theme.json under `settings.spacing`.

---

👉 This document provides a reusable framework for briefing **any block theme website project**, ensuring all strategy, design, content, and technical considerations are addressed upfront.

