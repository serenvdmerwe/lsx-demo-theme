# **Brand Guide (One-Pager)**

**\[\[PROJECT\_NAME: Luxury Black Heels Demo\]\]**

**Use:** Copy into your AI tool, tweak any bracketed items, run. Outputs are concise, WCAG-aware, and ready for designers, devs, and writers.

---

## **0\. Deliverables**

*  Full logo set: primary / secondary / icon

*  Tagline \+ usage rules

*  Colour palette with HEX/HSL \+ contrast notes

*  Typography hierarchy \+ scale (rem) \+ fallbacks

*  Imagery & style direction (do/don’t)

*  Voice, tone, and microcopy patterns

*  SEO basics checklist for **ZA** (English, en-GB)

*  Token pack: **theme.json** keys \+ **CSS variables**

---

## **1\. Logos**

**Primary:** Wordmark \+ minimal heel-icon **(monoline, geometric)** \+ tagline  
 **Secondary:** Wordmark \+ icon (no tagline)  
 **Icon/Mark:** Heel-icon only; use for favicon/social; avoid text below 24px  
 **Tagline:** “**Crafted to Command**”  
 **Usage Rules**

* Clear space: height of first cap letter

* Minimum size: print **20 mm** / web **64 px** width

* Don’t: stretch, skew, add effects, or place over busy/low-contrast backgrounds; maintain contrast ≥ **4.5:1**  
   **File Exports:** SVG \+ PNG (transparent) — light/dark; with/without tagline; icon-only; favicon **16/32px**; Apple Touch **180px**

---

## **2\. Colours**

Palette inspired by **couture fashion** (leather, metal hardware, editorial lighting).

* **Primary — Obsidian Black**: `#000000` / `hsl(0, 0%, 0%)` *(Headings, accents, backgrounds in dark mode)*

* **Secondary — Deep Burgundy**: `#4A1C2C` / `hsl(340, 44%, 20%)` *(Buttons hover, highlights)*

* **Neutral — Charcoal**: `#333333` / `hsl(0, 0%, 20%)` *(Body text, borders)*

* **Accent — Gold**: `#D4AF37` / `hsl(46, 63%, 53%)` *(CTAs, key lines—use sparingly)*

* **White/Ivory**: `#F8F8F8` *(Light backgrounds)*

**Accessibility & Usage**

* Primary on White: `#000000` on `#F8F8F8` ≈ **15.3:1** ✓ body/UI

* Gold on White: may fail body text—use for icons/lines/large headings only; pair with **Black/Charcoal** for contrast

* Button states (tokens):

  * `btn-bg` \= `#D4AF37` → hover `#4A1C2C` → active `#333333` → disabled `#E0E0E0`

  * `btn-fg` \= `#000000` → hover `#F8F8F8` → active `#F8F8F8` → disabled `#9E9E9E`

**Tokens**

* CSS: `--color-primary:#000000; --color-secondary:#4A1C2C; --color-accent:#D4AF37; --color-neutral-700:#333333; --color-bg:#F8F8F8;`

* theme.json: `settings.color.palette["brand-primary"]="#000000"`, etc.

---

## **3\. Typography**

* **Headings:** *Playfair Display* (serif), weight **700**

* **Body:** *Montserrat* (sans), weights **400/500**

* **Meta/Notes:** *Open Sans* (sans), weight **400**

**Scale & Rules (rem)**

* H1 **3.0** | H2 **2.25** | H3 **1.5** | Body **1.0** | Small **0.875**

* Line-height: **1.4–1.6** body, **1.2–1.3** headings; paragraph spacing **0.75em**

* Headlines: *value \+ verb*, no filler

* Body: short, plain sentences (**8–18 words**); en-GB spelling

**Tokens**

* CSS:  
   `--font-headings:"Playfair Display",serif; --font-body:"Montserrat",system-ui,sans-serif; --size-h1:3rem; --size-body:1rem;`

* theme.json: `typography.fontFamilies` & `typography.fontSizes` mapped as above

---

## **4\. Imagery & Style**

* **Photography:** Real product; minimalist angles on dark backdrops; dramatic, directional light; texture focus (calfskin/lambskin, stitching, metal hardware). Diverse models where used.

* **Tone:** Minimal, editorial, confident

* **Layout:** Clean grid; white/ivory or deep black sections; **12px** card radius

* **Icons:** Simple line icons themed to *luxury footwear* (heel, leather, care, sizing)

* **Do:** show sole/tread; macro texture; consistent angles

* **Don’t:** busy props; mixed colour casts; over-retouching

* **Rights:** Licensed stock or in-house; track attributions centrally

---

## **5\. Voice & Tone**

**Voice:** Elegant, confident, warm, expert, pragmatic  
 **Tone by Section**

* Homepage: energetic, bold, welcoming

* About: personal storytelling, values-led

* Shop/Products: informative, visual, guide-like (materials, fit, use)

* Blog: conversational, insight-driven

* Contact: simple, approachable  
   **Style Rules:** Oxford comma **Yes**; contractions **OK**; reading level **Year 8–9**

---

## **6\. Microcopy Patterns**

* **Forms:** “Enter your email”, “Send your message”

* **Validation:** “Email is missing ‘@’. Add it to continue.”

* **Success:** “Thanks\! We’ll get back to you soon.”

* **Empty state:** “No items yet — add your first product.”

* **CTAs:** “Step Into Luxury”, “Discover the Edit”, “See the Collection”, “Book a Styling Consult”

---

## **7\. SEO Basics (for ZA)**

* Human-first writing; **en-GB**

* Slugs: `/shop/designer-black-heel-boot/` (descriptive, lowercase, hyphens)

* Title **50–60** chars; meta **140–160** chars

* Alt text: what \+ why (“Black calfskin ankle boot, side zip, low block heel”)

* Internal links: Blog ↔ Shop; use descriptive anchors

* Headings: one **H1** per page; logical **H2–H3**

* Performance: compress, lazy-load, **WebP**; monitor Core Web Vitals

---

### **Handoff Checklist (auto-append)**

* Asset pack (logos, colour tokens, type tokens)

* **theme.json** snippet (palette \+ typography)

* CSS variables list

* Favicon \+ touch icons

* Accessibility note with contrast table

* Version & date: **v1.0 – 2025-10-09**

---

#### **Example Token Snippets**

**theme.json (excerpt)**

`{`  
  `"settings": {`  
    `"color": {`  
      `"palette": [`  
        `{ "slug": "brand-primary",   "color": "#000000", "name": "Primary Black" },`  
        `{ "slug": "brand-secondary", "color": "#4A1C2C", "name": "Deep Burgundy" },`  
        `{ "slug": "brand-accent",    "color": "#D4AF37", "name": "Accent Gold" },`  
        `{ "slug": "neutral-700",     "color": "#333333", "name": "Charcoal" },`  
        `{ "slug": "background",      "color": "#F8F8F8", "name": "Ivory" }`  
      `]`  
    `},`  
    `"typography": {`  
      `"fontFamilies": [`  
        `{ "slug": "headings", "fontFamily": "Playfair Display, serif" },`  
        `{ "slug": "body",     "fontFamily": "Montserrat, system-ui, sans-serif" }`  
      `],`  
      `"fontSizes": [`  
        `{ "slug": "h1",   "size": "3rem" },`  
        `{ "slug": "h2",   "size": "2.25rem" },`  
        `{ "slug": "h3",   "size": "1.5rem" },`  
        `{ "slug": "body", "size": "1rem" },`  
        `{ "slug": "small","size": "0.875rem" }`  
      `]`  
    `}`  
  `}`  
`}`

**CSS variables**

`:root{`  
  `--color-primary:#000000;`  
  `--color-secondary:#4A1C2C;`  
  `--color-accent:#D4AF37;`  
  `--color-neutral-700:#333333;`  
  `--color-bg:#F8F8F8;`

  `--font-headings:"Playfair Display",serif;`  
  `--font-body:"Montserrat",system-ui,sans-serif;`

  `--size-h1:3rem;`  
  `--size-h2:2.25rem;`  
  `--size-h3:1.5rem;`  
  `--size-body:1rem;`  
  `--size-small:0.875rem;`

  `--radius-card:12px;`  
`}`

