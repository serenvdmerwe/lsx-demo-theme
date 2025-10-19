# **Website Tagline Guide**

**\[Theme / Project Name\]: Luxury Black Heels Demo**

---

## **0\. Deliverables**

* 10 brainstormed options (with variants).

* **Final tagline selection \+ rationale.**

* **Logo brief update** (lockups, usage).

* Style & typography recommendations (tokenised).

* Deliverables pack: **logo with tagline / without / monochrome** (light & dark).

---

## **1\. Purpose**

* Provide a **repeatable, testable** process for taglines.

* Align messaging with **luxury/editorial** positioning and your CPT-driven product focus.

* Integrate the tagline into **logo, theme, and templates** consistently.

* Validate resonance with **fashion-conscious shoppers, boutique buyers, and agencies**.

---

## **2\. How to Use this Guide**

**Clients**

1. Shortlist 5–10 options below.

2. Pulse-test with 5–10 target users (or LinkedIn peers).

3. Select a winner; approve logo brief update.

**Designers/Developers**

1. Apply final tagline to primary lockup.

2. Export **light/dark, with/without, symbol-only, monochrome**.

3. Add tagline to theme metadata (site tagline) and hero patterns.

---

## **3\. Process**

**Brainstorm (10 options)**

1. Luxury in Every Step

2. Where Elegance Meets Edge

3. Crafted to Command Attention

4. Confidence, Elevated

5. For the Walk That Turns Heads

6. Sophistication in Motion

7. Defining Style, One Heel at a Time

8. The Art of the Heel

9. Bold. Elegant. Timeless.

10. Unmistakably Luxurious

**Test method**

* Quick survey (A/B/C), 1–5 scale for **Memorability / Premium feel / Fit**.

* Qualitative prompt: “How does this tagline make you feel about the product?”

**Final selection**  
 **Chosen tagline:** **Crafted to Command**  
 **Rationale:** Clear, aspirational, timeless; telegraphs **craftsmanship \+ authority**; fits short wordmark lockups and hero CTAs; global en-GB friendly.

---

## **4\. Suggested Tagline Examples (generic formats for future variants)**

* “Explore the \[Subject\] of \[Location\]”

* “Adventures by the \[Theme\]”

* “Your guide to \[Topic\] and beyond”

* “Stories from the \[Theme\], experiences for a lifetime”

* “Inspired by \[Topic\], designed for you”

Use these only when spinning up new verticals (lookbooks, collabs); keep the core tagline stable.

---

## **5\. Logo Brief Update with Tagline**

**Primary Lockup**

* **Structure:** Wordmark (**Playfair Display Bold**) \+ minimal heel symbol (monoline).

* **Tagline placement:** Beneath wordmark, **Montserrat Medium** (–1 size step vs wordmark), letter-spacing \+1–2%.

* **Alignment:** Left lockup; maintain symbol width ≈ x-height × 1.2.

**Style Guidelines**

* **Visual tone:** Elegant, editorial, modern, calm confidence.

* **Palette:** Obsidian **\#000000**, Deep Burgundy **\#4A1C2C**, Accent Gold **\#D4AF37**, Ivory **\#F8F8F8**.

* **Typographic pairing:**

  * Brand name: **Playfair Display 700**

  * Tagline: **Montserrat 500/600** (avoid italics; sentence case)

* **Accessibility:** Contrast ≥ **4.5:1** for small text. Prefer **Black on Ivory** for small tagline; if Gold is used, apply as **rule/line**, not text.

**Deliverables**

* **Full logo (with tagline)** – light/dark.

* **Logo (no tagline)** – light/dark.

* **Monochrome** (1-colour) \+ **reversed**.

* **Favicon & app icons** (16/32/48/180/512–1024).

* Usage sheet: clear space **X \= cap-height of “L”**, min sizes (Primary ≥ **160px**, Symbol ≥ **24px**).

**Theme tokens (for dev)**

* `site.tagline = "Crafted to Command"`

* `--tagline-font: "Montserrat", system-ui, sans-serif;`

* `--tagline-size: clamp(0.875rem, 0.6vw + 0.6rem, 1rem);`

* `--tagline-color: #000000;`

---

## **6\. Why This Works**

* **Clarity:** A compact line that scales across hero, logo, and metadata.

* **Differentiation:** Leans into **craft \+ authority** vs generic luxury clichés.

* **System-fit:** Works in **lockups, SEO snippets, and CTA language**.

* **Longevity:** Timeless wording reduces rework across campaigns.

---

## **4\. Style & Typography Recommendations (integration quick wins)**

* **Hero usage:** H6 style, sentence case, above H1; spacing token `spacing-30/40`.

* **Alt lockup:** Horizontal rule in Gold under wordmark; tagline in Black/Charcoal for AA.

* **CTA echo:** Use derivative copy in buttons: **“Step Into Luxury”**, **“Discover the Edit”**.

* **Don’t:** Stack tagline at micro sizes \<14px on light backgrounds; switch to symbol-only or no-tag variant.

---

## **Deliverables Package (for handoff)**

* `/logo/masters`: `lbh_primary_withtag_light.svg`, `..._dark.svg`, `..._mono.svg`

* `/logo/exports/png`: 64/128/256/512/1024

* `/app-icons`: 16/32/48/180/512/1024

* `/usage-guide`: PDF with clear space, min sizes, do/don’t

* `/tokens`: `theme.json` snippet \+ CSS vars (tagline font/size/colour)

