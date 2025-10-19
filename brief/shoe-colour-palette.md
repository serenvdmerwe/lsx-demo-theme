# **Colour Palette**

**\[Theme / Project Name\]: Luxury Black Heels Demo**

---

## **0\. Deliverables**

* Core semantic palette (primary, secondary, accent, neutral, background)

* Light & dark variations

* 10-step neutral scale (UI, surfaces, text)

* 3 accent bands (brand hues & CTAs)

* theme.json partial (copy-paste)

* Accessibility notes (AA/AAA targets)

---

## **1\. Purpose**

* Define light/dark palettes for brand consistency and speed to execution.

* Core Palette \= **Primary, Secondary, Accent, Neutral, Background**.

* **Light mode:** muted neutrals, strong text contrast.

* **Dark mode:** deep backgrounds, tuned accents for legibility.

* **Accessibility:** AA for body (≥4.5:1), AA large (≥3:1).

* **Implementation:** `theme.json → settings.color.palette`.

* **Naming:** `primary`, `secondary`, `accent`, `neutral-0..900`.

---

## **2\. Core Semantic Palette**

* **Base (background):** `#F8F8F8` *(Ivory surfaces)*

* **Contrast (text):** `#000000` *(Default body on light)*

* **Primary (brand/core UI):** `#000000` *(Obsidian Black—headings, key UI)*

* **Secondary (supporting brand):** `#4A1C2C` *(Deep Burgundy—highlights, section accents)*

* **Accent (interactive/highlight):** `#D4AF37` *(Gold—CTAs, key lines; use sparingly for text)*

* **Base Dark (background):** `#000000` *(Dark surfaces)*

* **Contrast Light (text on dark):** `#F8F8F8` *(Ivory text on black)*

Mapping: Buttons \= Gold bg \+ Black text; Links \= Burgundy text on light; Emphasis lines/icons \= Gold.

---

## **3\. Neutral Scale (UI, backgrounds, text contrast)**

* **neutral-0** → `#FFFFFF` *(pure light / page edge)*

* **neutral-100** → `#F8F8F8` *(base surface)*

* **neutral-200** → `#F0F0F0` *(muted surface)*

* **neutral-300** → `#E5E5E5` *(card alt)*

* **neutral-400** → `#CCCCCC` *(lines/borders light)*

* **neutral-500** → `#A6A6A6` *(disabled text/icons)*

* **neutral-600** → `#808080` *(secondary text on light)*

* **neutral-700** → `#4D4D4D` *(strong UI text)*

* **neutral-800** → `#333333` *(body text on light)*

* **neutral-900** → `#000000` *(pure dark / headings)*

---

## **4\. Accent Scale (Brand Hues)**

**Accent Set A — Burgundy (brand editorial)**

* accent-a-100 `#F6EEF1`

* accent-a-200 `#E7D3D9`

* accent-a-300 `#CFA4B0`

* accent-a-400 `#7A3045`

* accent-a-500 `#4A1C2C` *(Deep Burgundy core)*

**Accent Set B — Gold (brand metal)**

* accent-b-100 `#FFF4CC`

* accent-b-200 `#FBE08A`

* accent-b-300 `#EBC753`

* accent-b-400 `#C59A2F`

* accent-b-500 `#D4AF37` *(Gold core)*

**Accent Set C — Action Amber (CTA/alerts)**

* accent-c-100 `#FFE3A1`

* accent-c-200 `#F2B744`

* accent-c-300 `#C98C1A`

* accent-c-400 `#8A5E0E` *(CTA hover/active, high contrast)*

Use **Set C** for CTAs and priority highlights (meets contrast with black/ivory). **Set A/B** for brand identity, chips, subtle UI accents.

---

## **5\. Example theme.json Partial**

`{`  
  `"version": 3,`  
  `"settings": {`  
    `"color": {`  
      `"defaultPalette": false,`  
      `"palette": [`  
        `{ "slug": "base",       "name": "Base",       "color": "#F8F8F8" },`  
        `{ "slug": "contrast",   "name": "Contrast",   "color": "#000000" },`  
        `{ "slug": "primary",    "name": "Primary",    "color": "#000000" },`  
        `{ "slug": "secondary",  "name": "Secondary",  "color": "#4A1C2C" },`  
        `{ "slug": "accent",     "name": "Accent",     "color": "#D4AF37" },`

        `{ "slug": "neutral-0",  "name": "Neutral 0",  "color": "#FFFFFF" },`  
        `{ "slug": "neutral-100","name": "Neutral 100","color": "#F8F8F8" },`  
        `{ "slug": "neutral-200","name": "Neutral 200","color": "#F0F0F0" },`  
        `{ "slug": "neutral-300","name": "Neutral 300","color": "#E5E5E5" },`  
        `{ "slug": "neutral-400","name": "Neutral 400","color": "#CCCCCC" },`  
        `{ "slug": "neutral-500","name": "Neutral 500","color": "#A6A6A6" },`  
        `{ "slug": "neutral-600","name": "Neutral 600","color": "#808080" },`  
        `{ "slug": "neutral-700","name": "Neutral 700","color": "#4D4D4D" },`  
        `{ "slug": "neutral-800","name": "Neutral 800","color": "#333333" },`  
        `{ "slug": "neutral-900","name": "Neutral 900","color": "#000000" },`

        `{ "slug": "accent-a-100","name": "Accent A 100","color": "#F6EEF1" },`  
        `{ "slug": "accent-a-200","name": "Accent A 200","color": "#E7D3D9" },`  
        `{ "slug": "accent-a-300","name": "Accent A 300","color": "#CFA4B0" },`  
        `{ "slug": "accent-a-400","name": "Accent A 400","color": "#7A3045" },`  
        `{ "slug": "accent-a-500","name": "Accent A 500","color": "#4A1C2C" },`

        `{ "slug": "accent-b-100","name": "Accent B 100","color": "#FFF4CC" },`  
        `{ "slug": "accent-b-200","name": "Accent B 200","color": "#FBE08A" },`  
        `{ "slug": "accent-b-300","name": "Accent B 300","color": "#EBC753" },`  
        `{ "slug": "accent-b-400","name": "Accent B 400","color": "#C59A2F" },`  
        `{ "slug": "accent-b-500","name": "Accent B 500","color": "#D4AF37" },`

        `{ "slug": "accent-c-100","name": "Accent C 100","color": "#FFE3A1" },`  
        `{ "slug": "accent-c-200","name": "Accent C 200","color": "#F2B744" },`  
        `{ "slug": "accent-c-300","name": "Accent C 300","color": "#C98C1A" },`  
        `{ "slug": "accent-c-400","name": "Accent C 400","color": "#8A5E0E" }`  
      `]`  
    `}`  
  `}`  
`}`

**Optional dark-mode tokens (CSS variables or alt palette)**

* `--color-base-dark: #000000`

* `--color-contrast-light: #F8F8F8`

* For dark backgrounds, prefer **accent-b-400** / **accent-c-200** for higher legibility.

---

## **6\. Key Points**

* **AA by default:** Black on Ivory ≈ 15:1; Burgundy on Ivory passes for body only at ≥16px and strong weight—prefer headings/links.

* **Gold usage:** Avoid Gold for body text on light backgrounds (contrast risk). Use Gold as **background** with **Black text**, or as icons/lines.

* **CTAs:** Use **accent-c-300** (Amber) bg \+ **Black** text; hover **accent-c-400**; disabled \= `neutral-500` bg \+ `neutral-700` text.

* **Governance:** Document per-token usage (e.g., “accent-b-\* not for body text”). Keep implementations consistent across blocks/templates.

* **Dev-ready:** Slugs match theme.json; neutrals drive structure; accent bands drive identity and priority.

