# **Typography**

**Google Fonts typography breakdown** tailored for Brandon’s Fishing Adventures site. It balances friendliness, readability, and a natural, outdoors-inspired vibe.

---

## **1\. Headings (H1–H3)**

**Montserrat** (Bold / Semi-Bold)

-   Clean, geometric sans-serif with a modern but approachable feel.

-   Works well for strong headlines like _“Smallmouth Yellowfish”_ or _“Fishing Adventures in KZN”_.

-   Keeps the site adventurous yet professional.

Alternative: **Raleway** (slightly more elegant, softer personality).

---

## **2\. Body Text (Paragraphs, Blog Content)**

**Lora** (Regular / Italic)

-   Warm, humanist serif that’s easy to read in longer paragraphs.

-   Adds a touch of personality and storytelling character, perfect for Brandon’s blog-style writing.

-   Italics can be used for anecdotes, fish species names, or quotes.

Alternative: **Merriweather** (slightly darker tone, very readable on screen).

---

## **3\. Navigation, Captions, Microcopy**

**Open Sans** (Regular / Medium)

-   Neutral and highly legible.

-   Great for menus, buttons, forms, and small UI text.

-   Provides balance against the personality of Montserrat and Lora.

Alternative: **Work Sans** (friendly, a bit more rounded).

---

## **4\. Hierarchy in Use**

-   **H1:** Montserrat Bold, 36–48px

-   **H2/H3:** Montserrat Semi-Bold, 24–32px

-   **Body:** Lora Regular, 16–18px, line-height 1.6–1.8

-   **Captions / Buttons / Forms:** Open Sans Medium, 14–16px

---

## **5\. Pairing Justification**

-   **Montserrat** gives Brandon’s site a modern adventure look.

-   **Lora** softens it with warmth and readability for long fishing stories.

-   **Open Sans** keeps functional areas clean, ensuring accessibility and contrast in UI elements.

This trio has excellent **Google Fonts performance**, so the site won’t get slowed down by heavy font loads.

![][image1]

Great — let’s extend the **typography tokens** into a `theme.json` structure that matches both your **standardisation doc** and the Brandon project’s chosen fonts (Montserrat for headings, Lora for body, Open Sans for UI/microcopy).

Here’s a **ready-to-use theme.json snippet**:

---

## **📄 theme.json – Typography Section**

`{`
 `"$schema": "https://schemas.wp.org/wp/6.8/block.json",`
 `"version": 3,`
 `"settings": {`
 `"typography": {`
 `"fontFamilies": [`
 `{`
 `"fontFamily": "'Montserrat', sans-serif",`
 `"slug": "montserrat",`
 `"name": "Montserrat"`
 `},`
 `{`
 `"fontFamily": "'Lora', serif",`
 `"slug": "lora",`
 `"name": "Lora"`
 `},`
 `{`
 `"fontFamily": "'Open Sans', sans-serif",`
 `"slug": "open-sans",`
 `"name": "Open Sans"`
 `}`
 `],`
 `"fontSizes": [`
 `{ "slug": "font-size-100", "size": "0.75rem", "name": "Tiny" },`
 `{ "slug": "font-size-200", "size": "1rem",    "name": "Base" },`
 `{ "slug": "font-size-300", "size": "1.25rem", "name": "Small" },`
 `{ "slug": "font-size-400", "size": "1.5rem",  "name": "Medium" },`
 `{ "slug": "font-size-500", "size": "2rem",    "name": "Large" },`
 `{ "slug": "font-size-600", "size": "2.5rem",  "name": "X-Large" },`
 `{ "slug": "font-size-700", "size": "3rem",    "name": "Huge" },`
 `{ "slug": "font-size-800", "size": "4rem",    "name": "Gigantic" },`
 `{ "slug": "font-size-900", "size": "5rem",    "name": "Colossal" }`
 `],`
 `"lineHeight": true,`
 `"dropCap": false`
 `},`
 `"styles": {`
 `"typography": {`
 `"fontFamily": "var(--wp--preset--font-family--lora)",`
 `"fontSize": "var(--wp--preset--font-size--font-size-200)",`
 `"lineHeight": "1.6"`
 `},`
 `"elements": {`
 `"heading": {`
 `"typography": {`
 `"fontFamily": "var(--wp--preset--font-family--montserrat)",`
 `"fontWeight": "700",`
 `"lineHeight": "1.3"`
 `}`
 `},`
 `"button": {`
 `"typography": {`
 `"fontFamily": "var(--wp--preset--font-family--open-sans)",`
 `"fontWeight": "600",`
 `"textTransform": "uppercase",`
 `"fontSize": "var(--wp--preset--font-size--font-size-200)"`
 `}`
 `},`
 `"caption": {`
 `"typography": {`
 `"fontFamily": "var(--wp--preset--font-family--open-sans)",`
 `"fontSize": "var(--wp--preset--font-size--font-size-100)"`
 `}`
 `}`
 `}`
 `}`
 `}`
`}`

---

## **✅ Key Points**

-   **Fonts**: Montserrat (headings), Lora (body text), Open Sans (UI, buttons, captions).

-   **Font Sizes**: numeric scale `100–900`, multiples of 8px as per standardisation.

-   **Defaults**: body text \= Lora, base size \= 1rem (16px).

-   **Headings**: Montserrat, bold, tighter line-height for impact.

-   **Buttons/Captions**: Open Sans, more compact, clear for UI.

---

Would you like me to **also generate a fluid typography extension** (using `clamp()` values in the theme.json) so font sizes adapt smoothly across mobile–desktop breakpoints?
