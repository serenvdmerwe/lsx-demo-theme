# **Style Guide Template**

**\[Theme / Project Name\]: Luxury Black Heels Demo**  
 **Brand:** Luxury Black Heels · **POC:** Seren van der Merwe (Owner)  
 **Version:** v1.0 — 2025-10-09 · **Repo/Folder:** `[add URL]`

---

## **0\. Deliverables**

**What to capture**  
 A single source of truth for colours, type, layout, logo usage, dark theme, and voice.

**Fields to fill**

* Brand: Luxury Black Heels

* Point of contact: Seren van der Merwe, Owner

* Version/Date: v1.0 — 2025-10-09

* Repository/Folder link: `[add URL]`

**Prompts**

* “List all output assets required for Luxury Black Heels across print, web, and app, with file formats and min sizes. Include a checklist and acceptance criteria.”

* “Write logo usage rules (clear space, min logo size in px/mm, incorrect usage examples) for a minimalist luxury footwear brand.”

---

## **1\. Colours**

**What to capture**  
 Compact, couture-inspired palette with usage \+ contrast rules.

**Fields to fill**

* **Primary (Leather/Obsidian):** Name: Obsidian Black · HEX **\#000000** · RGB 0,0,0 · CMYK 0,0,0,100  
   **Use:** headings, key UI, borders. **Contrast:** AAA on Ivory, AA on light tints.

* **Secondary (Burgundy/Richness):** Name: Deep Burgundy · HEX **\#4A1C2C** · RGB 74,28,44 · CMYK 0,62,41,71  
   **Use:** links, section accents. **Contrast:** pass for headings on Ivory; avoid small body text on Ivory.

* **Accent (Metal/Hardware):** Name: Accent Gold · HEX **\#D4AF37** · RGB 212,175,55 · CMYK 0,17,74,17  
   **Use:** CTAs, dividers, icons; avoid as small body text on light.

* **Highlight (Amber/Action):** Name: Action Amber · HEX **\#C98C1A** · RGB 201,140,26 · CMYK 0,30,87,21  
   **Use:** CTA hover/active, alerts.

* **Neutrals (N0–N900):**  
   N0 **\#FFFFFF**, N100 **\#F8F8F8**, N200 **\#F0F0F0**, N300 **\#E5E5E5**, N400 **\#CCCCCC**,  
   N500 **\#A6A6A6**, N600 **\#808080**, N700 **\#4D4D4D**, N800 **\#333333**, N900 **\#000000**

**Gradients (optional)**

* Gold Sheen: `#D4AF37 → #C59A2F` (large shapes only; never for small text)

**Tokens (for code)**  
 `--color-primary:#000000; --color-secondary:#4A1C2C; --color-accent:#D4AF37; --color-highlight:#C98C1A; --color-bg:#F8F8F8; --color-text:#000000;`

**How to gather inputs**  
 Sample finishes (calfskin, lambskin, metal hardware) from product photography; validate contrast ≥4.5:1.

**Prompts**

* “From these image refs \[upload later\], propose a 4-colour palette \+ neutrals with HEX/RGB/CMYK and usage notes. Ensure AA body text.”

* “Suggest hover/focus states for Primary/CTA with ±10–20% luminance shifts.”

---

## **2\. Typography**

**What to capture**  
 Elegant headlines \+ modern, readable body; licensing \+ fallbacks.

**Fields to fill**

* **Headings:** Playfair Display · **700/600** · Google Fonts (web licence)  
   Style: bold editorial; tracking 0 to \+2%; case: Title Case.

* **Body:** Montserrat · **400/500** · Google Fonts  
   Style: clean modern; comfortable long-form.

* **Buttons/Meta:** Open Sans · **600/400** · Google Fonts

* **Fallback stacks**  
   Headings: `"Playfair Display", Georgia, "Times New Roman", serif`  
   Body: `"Montserrat", system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif`

* **Type scale** (base 16px, ratio \~1.25; fluid via clamp)  
   H1 `clamp(2.25rem, 2.5vw + 1rem, 3rem)`; H2 `clamp(1.75rem, 1.5vw + 1rem, 2.25rem)`; H3 `1.5rem`; Body `1rem`; Small `0.875rem`  
   Line length 60–75ch; line height body **1.5**, headings **1.2–1.3**.

**How to gather inputs**  
 Match to brand traits (elegant, confident, warm); test mobile readability; confirm licences.

**Prompts**

* “Recommend headings/body fonts for a luxury footwear brand (elegant, modern). Include licence links and CSS fallbacks.”

* “Generate a modular scale (base 16px, ratio 1.25) with rem values and clamp examples.”

---

## **3\. Style & Layout**

**What to capture**  
 Imagery, grid, spacing, shapes, iconography, component patterns.

**Fields to fill**

* **Imagery:** Source: in-house/editorial; Style: dramatic directional light, macro texture; Post: subtle contrast, true colour.

* **Shapes:** Subtle rounded corners; radius **12px** (cards, swatches).

* **Grid:** 12-col; gutter **16–24px**; max width **1200–1440px**.

* **Spacing scale:** 4/8/12/16/24/32/48/64/96/128px (tokens: spacing-10..100).

* **Icons:** Line-based; stroke **1.5px**; motifs: heel, leather, care, sizing.

* **Cards (CPT Product):** photo → name → short description → Fact chips (brand, heel, material) → CTA “View details”.

* **CTAs:** Primary: Gold bg **\#D4AF37** \+ Black text **\#000**; Hover: Amber **\#C98C1A**; Focus: 2px outline (AA contrast).

**How to gather inputs**  
 Inventory components (Hero, Card, Gallery, CTA bar); document states.

**Prompts**

* “Define responsive grid & spacing for a luxury e-commerce site; include breakpoints and example CSS variables.”

* “Write accessible card guidelines (image alt, focus order, button labels).”

---

## **4\. Logo & Branding**

**What to capture**  
 Marks, clear space, min sizes, lockups.

**Fields to fill**

* **Primary logo:** Symbol (abstract heel) \+ Wordmark (Playfair).

* **Secondary logo:** Symbol-only.

* **Tagline lockup:** “Crafted to Command” below/right (Montserrat).

* **Mono/Reverse:** Yes.

* **Clear space:** X \= cap height of “L”.

* **Min sizes:** Primary ≥ **160px**; Symbol ≥ **24px** (screen).

* **Incorrect usage:** No stretching, colour swaps, shadows, or busy backgrounds.

**How to gather inputs**  
 Test at favicon 16px; provide vector grid.

**Prompts**

* “Draft logo usage rules for Luxury Black Heels with clear space \= X, min sizes, and misuse examples.”

---

## **5\. Dark Theme Version**

**What to capture**  
 Tokens, logo variant, contrast.

**Fields to fill**

* **Background:** Black **\#000000**

* **Text:** Ivory **\#F8F8F8** (AA+)

* **Illustration/Accent:** Gold **\#D4AF37** (lines/icons), Amber **\#C98C1A** (hover/active)

* **Logo (dark):** Inverted/light version; file: `/brand/lbh_logo_dark.svg`

* **Applications:** Footers, hero overlays, lookbooks

**How to gather inputs**  
 Run dark-mode audits; ensure focus rings meet AA.

**Prompts**

* “Create dark theme tokens from light palette; ensure AA text; propose hover/focus states.”

---

## **6\. Voice & Tone**

**What to capture**  
 Audience, personality, do/don’t, microcopy.

**Fields to fill**

* **Audience:** Fashion-conscious shoppers, boutique buyers, design agencies.

* **Personality:** Elegant, confident, warm, expert.

* **Regional cues:** ZA context, global polish.

* **Do:** plain English, active verbs, material specifics, fit guidance.

* **Don’t:** hype, vague superlatives, jargon.

* **Tagline:** Options — “Crafted to Command” (chosen) · “Step Into Luxury” · “Defining the Heel”

* **Sample microcopy:**  
   Buttons: “See the Collection”, “Discover the Edit”, “Book a Styling Consult”  
   Empty state: “No items yet — add your first product.”

**How to gather inputs**  
 Interview stakeholders; extract frequently used phrases.

**Prompts**

* “Write a voice & tone guide for Luxury Black Heels (elegant, confident, warm, expert) with do/don’t \+ microcopy.”

---

## **Optional: WordPress/Theme Mapping**

`{`  
  `"version": 3,`  
  `"settings": {`  
    `"color": {`  
      `"palette": [`  
        `{"name": "Primary",   "slug": "primary",   "color": "#000000"},`  
        `{"name": "Secondary", "slug": "secondary", "color": "#4A1C2C"},`  
        `{"name": "Accent",    "slug": "accent",    "color": "#D4AF37"},`  
        `{"name": "Highlight", "slug": "highlight", "color": "#C98C1A"},`  
        `{"name": "Background","slug": "base",      "color": "#F8F8F8"}`  
      `]`  
    `},`  
    `"typography": {`  
      `"fontFamilies": [`  
        `{"slug": "heading", "fontFamily": "Playfair Display, Georgia, 'Times New Roman', serif"},`  
        `{"slug": "body",    "fontFamily": "Montserrat, system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif"},`  
        `{"slug": "ui",      "fontFamily": "Open Sans, system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif"}`  
      `],`  
      `"fontSizes": [`  
        `{"slug": "base", "size": "1rem"},`  
        `{"slug": "h1",   "size": "clamp(2.25rem, 2.5vw + 1rem, 3rem)"},`  
        `{"slug": "h2",   "size": "clamp(1.75rem, 1.5vw + 1rem, 2.25rem)"},`  
        `{"slug": "h3",   "size": "1.5rem"}`  
      `]`  
    `},`  
    `"spacing": {`  
      `"spacingScale": {`  
        `"steps": [`  
          `{"slug": "spacing-10","size":"0.25rem","name":"4px"},`  
          `{"slug": "spacing-20","size":"0.5rem","name":"8px"},`  
          `{"slug": "spacing-30","size":"0.75rem","name":"12px"},`  
          `{"slug": "spacing-40","size":"1rem","name":"16px"},`  
          `{"slug": "spacing-60","size":"2rem","name":"32px"},`  
          `{"slug": "spacing-80","size":"4rem","name":"64px"}`  
        `]`  
      `}`  
    `}`  
  `}`  
`}`

---

## **Acceptance Criteria (for sign-off)**

* Palette documented with HEX/RGB/CMYK \+ WCAG notes; hover/focus states defined.

* Fonts chosen with licences \+ fallbacks; scale and clamp sizes set.

* Grid, spacing, core components documented with examples.

* Logo variants exported (light/dark/mono); usage rules finalised (clear space, min sizes).

* Dark theme tokens validated for contrast \+ focus visibility.

* Voice & tone with examples and tagline approved.

* Versioned release with changelog.

---

## **Brand Style Snapshot Graphic – Prompt (Portrait)**

**Inputs**  
 Brand name: Luxury Black Heels  
 Tagline: Crafted to Command  
 Logo: `[upload path or URL]` (alt: “Luxury Black Heels wordmark with heel symbol”)  
 **Colours** — Primary `#000000`, Secondary `#4A1C2C`, Accent `#D4AF37`, Highlight `#C98C1A`, Neutral `#F8F8F8`  
 **Typography** — Headings: Playfair Display; Body: Montserrat; Buttons: Open Sans  
 **Text colours** — Headings: `#000000`; Body: `#000000` on `#F8F8F8`; Button text: `#000000` on `#D4AF37`  
 Canvas size: A4 portrait 2480×3508 px (or 1080×1350 px)

**Prompt (copy/paste into your image tool)**  
 Design a clean portrait brand style snapshot poster for **Luxury Black Heels**. Use a neutral background **\#F8F8F8**.  
 Layout (top → bottom, grid-based):  
 Header: place the logo at the top; add the tagline **“Crafted to Command”** beneath.  
 Colours: show swatches for **Primary \#000000**, **Secondary \#4A1C2C**, **Accent \#D4AF37**, **Highlight \#C98C1A**, **Neutral \#F8F8F8** with HEX labels.  
 Typography: display samples for Headings (Playfair Display), Body (Montserrat), Buttons (Open Sans). Include the labels “HEADINGS” and “Body”, plus a pill button labelled **“Primary Button”**.  
 Text colours: include chips/labels for **Headings \#000000**, **Body \#000000**, **Button text \#000000**.  
 Voice & Tone: a short paragraph (Elegant, confident, warm, expert — concise description).  
 Constraints: portrait (A4 2480×3508 or 3:4); generous white space; subtle dividers; 8–12px corner radius on swatches/button; only provided brand colours; show HEX codes next to swatches; minimal and legible; no heavy textures.

**Acceptance checks**  
 Portrait orientation; logo clear; 3–5 colour swatches with HEX; type specimens for headings/body/buttons; separate text-colour chips; voice & tone text; clean alignment; adequate contrast.

