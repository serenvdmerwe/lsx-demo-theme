# **Typography Guide**

*A structured typography guide for balance and clarity*

**Project:** Luxury Black Heels Demo (ZA · en-GB)  
 **Font Pairing:** **Playfair Display** (headings) \+ **Montserrat** (body) \+ **Open Sans** (UI)

---

## **0\. Deliverables**

* **Primary heading font (Google Font):** Playfair Display

* **Body text font (Google Font):** Montserrat

* **UI/Caption font (Google Font):** Open Sans

* **Font weights & responsive scale:** Playfair 700/600 · Montserrat 400/500 · Open Sans 400/600 · **Scale:** Major Third \+ fluid clamp

* **Line-height rules:** Body **1.5** / Headings **1.2–1.3**

* **theme.json typography setup:** included below (paste into theme)

---

## **1\. Headings (H1–H3)**

* **Font:** Playfair Display (**700** primary / **600** secondary)

* **Tone/feel:** Elegant, editorial, premium

* **Best for:** Headlines like “Step Into Luxury” / “Discover the Edit”

* **Brand fit:** Serif contrast communicates heritage \+ craftsmanship; pairs with modern sans for a luxe, contemporary feel

* **Alternative:** Cormorant Garamond (more classical, softer serifs)

* **System fallback stack:** `"Playfair Display", Georgia, "Times New Roman", serif`

---

## **2\. Body Text (Paragraphs, Blog Content)**

* **Font:** Montserrat (**400** regular / **500** for emphasis; italics sparingly)

* **Tone/feel:** Modern, clean, neutral-friendly

* **Best for:** Long-form readability, product descriptions, care notes

* **Italics usage:** Quotes, model names, brief emphasis (avoid for long blocks)

* **Alternative:** Inter (more utilitarian, excellent legibility)

* **System fallback stack:** `"Montserrat", system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif`

---

## **3\. Navigation, Captions, Microcopy**

* **Font:** Open Sans (**400** / **600**)

* **Use in:** Menus, buttons, form labels, captions, badges

* **Why:** Neutral, compact metrics; contrasts subtly with Montserrat while staying legible in small sizes

* **Alternative:** IBM Plex Sans (slightly more engineered feel)

* **System fallback stack:** `"Open Sans", system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif`

---

## **4\. Hierarchy in Use**

* **H1:** Playfair 700, **clamp(2.25rem, 2.5vw \+ 1rem, 3rem)**, line-height **1.2**

* **H2/H3:** Playfair 600, **H2 clamp(1.75rem, 1.5vw \+ 1rem, 2.25rem)** · **H3 1.5rem**, line-height **1.25**

* **Body:** Montserrat 400, **1rem (16px)**, line-height **1.5**

* **Captions / Buttons / Forms:** Open Sans 600 (buttons) / 400 (labels, captions), **0.875–1rem**, text-transform **none** (sentence case)

* **Responsive notes:**

  * Use **clamp()** scaling between **360px** and **1440px** breakpoints.

  * Slightly tighten letter-spacing (-0.01em) on large H1 if needed.

  * Maintain minimum tap target **44×44px** for buttons/inputs.

---

## **5\. Pairing Justification**

* **Playfair Display** delivers **confident, editorial** headlines aligned to luxury positioning.

* **Montserrat** ensures **clean, modern readability** for product copy and long-form content.

* **Open Sans** keeps **UI text clear and accessible**, with robust hinting at small sizes.

* **Performance:** Load **2–3 weights per family** (Playfair 700/600; Montserrat 400/500; Open Sans 400/600). Use `display=swap`; subset **latin** (and **latin-ext** only if required).

---

## **6\. theme.json – Typography Section**

`{`  
  `"$schema": "https://schemas.wp.org/trunk/theme.json",`  
  `"version": 3,`  
  `"settings": {`  
    `"typography": {`  
      `"fontFamilies": [`  
        `{`  
          `"fontFamily": "Playfair Display, Georgia, 'Times New Roman', serif",`  
          `"slug": "heading-font",`  
          `"name": "Heading (Playfair Display)"`  
        `},`  
        `{`  
          `"fontFamily": "Montserrat, system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif",`  
          `"slug": "body-font",`  
          `"name": "Body (Montserrat)"`  
        `},`  
        `{`  
          `"fontFamily": "Open Sans, system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif",`  
          `"slug": "ui-font",`  
          `"name": "UI (Open Sans)"`  
        `}`  
      `],`  
      `"fontSizes": [`  
        `{ "slug": "font-size-100", "size": "0.75rem",  "name": "Tiny" },`  
        `{ "slug": "font-size-200", "size": "1rem",     "name": "Base" },`  
        `{ "slug": "font-size-300", "size": "0.875rem", "name": "Small" },`  
        `{ "slug": "font-size-400", "size": "1.125rem", "name": "Medium" },`  
        `{ "slug": "font-size-500", "size": "1.25rem",  "name": "Large" },`  
        `{ "slug": "font-size-600", "size": "1.5rem",   "name": "X-Large" },`  
        `{ "slug": "font-size-700", "size": "1.875rem", "name": "Huge" },`  
        `{ "slug": "font-size-800", "size": "2.25rem",  "name": "Gigantic" },`  
        `{ "slug": "font-size-900", "size": "3rem",     "name": "Colossal" }`  
      `],`  
      `"lineHeight": true,`  
      `"dropCap": false`  
    `},`  
    `"styles": {`  
      `"typography": {`  
        `"fontFamily": "var(--wp--preset--font-family--body-font)",`  
        `"fontSize": "var(--wp--preset--font-size--font-size-200)",`  
        `"lineHeight": "1.5"`  
      `},`  
      `"elements": {`  
        `"heading": {`  
          `"typography": {`  
            `"fontFamily": "var(--wp--preset--font-family--heading-font)",`  
            `"fontWeight": "700",`  
            `"lineHeight": "1.25"`  
          `}`  
        `},`  
        `"button": {`  
          `"typography": {`  
            `"fontFamily": "var(--wp--preset--font-family--ui-font)",`  
            `"fontWeight": "600",`  
            `"textTransform": "none",`  
            `"fontSize": "var(--wp--preset--font-size--font-size-200)",`  
            `"letterSpacing": "0.02em"`  
          `}`  
        `},`  
        `"caption": {`  
          `"typography": {`  
            `"fontFamily": "var(--wp--preset--font-family--ui-font)",`  
            `"fontSize": "var(--wp--preset--font-size--font-size-100)",`  
            `"lineHeight": "1.4"`  
          `}`  
        `}`  
      `}`  
    `}`  
  `}`  
`}`

**Implementation notes**

* **Google Fonts API (example):**  
   `https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500&family=Open+Sans:wght@400;600&display=swap`

* **Max files:** keep to **≤ 6** font files initially.

* **Subsetting:** `latin` (add `latin-ext` only if needed).

* Serve fonts with long cache headers; preconnect to `fonts.gstatic.com`.

---

## **7\. Key Points**

* **Fonts:** Playfair (H1–H3), Montserrat (body), Open Sans (UI/buttons/captions).

* **Sizes:** tokenised scale **100–900**; base **1rem (16px)** aligned to your spacing system.

* **Defaults:** body Montserrat 400; H1 Playfair 700; buttons Open Sans 600\.

* **Accessibility:** maintain AA contrast, minimum tap targets, visible focus (outline \+ 2px).

* **Governance:** limit custom letter-spacing; avoid all-caps for long labels; keep headlines ≤ 8–12 words.

---

## **8\. Typography Specimen Sheet Example**

* **H1 / Playfair 700 / 3rem / 1.2:** “Step Into Luxury”

* **H2 / Playfair 600 / 2.25rem / 1.25:** “Discover the Edit”

* **H3 / Playfair 600 / 1.5rem / 1.25:** “Materials & Care”

* **Body / Montserrat 400 / 1rem / 1.5:** “Crafted in black calfskin with a low block heel for all-day poise.”

* **Caption / Open Sans 400 / 0.875rem / 1.4:** “Side view shown. True-to-size fit.”

* **Button / Open Sans 600 / 1rem:** “See the Collection”

