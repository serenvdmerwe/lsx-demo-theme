# **Custom Spacing Scale**

**\[Theme/Project Name\]: Luxury Black Heels Demo**  
 Guidelines for modular spacing and visual hierarchy

---

## **0\. Deliverables**

* Base spacing unit \+ modular scale.

* Named spacing tokens for UI, content, and layout.

* Small / medium / large usage guidance.

* Mobile-responsive rules.

* `theme.json` partial for WordPress.

* Mapping notes for design tools (Figma variables/tokens).

---

## **1\. Purpose**

* Create rhythm and consistency across templates and blocks.

* Provide a shared language for design, dev, and content.

* Scale predictably from micro UI to full-bleed sections.

---

## **2\. Base Unit & Increments**

* **Base Unit:** **4px** (`0.25rem`)

* **Increments:** **4, 8, 12, 16, 24, 32, 48, 64, 96, 128** (balanced, production-proven)

---

## **3\. Naming Convention**

`spacing-[token] → value`

* `spacing-10 → 4px`

* `spacing-20 → 8px`

* `spacing-30 → 12px`

* `spacing-40 → 16px`

* `spacing-50 → 24px`

* `spacing-60 → 32px`

* `spacing-70 → 48px`

* `spacing-80 → 64px`

* `spacing-90 → 96px`

* `spacing-100 → 128px`

---

## **4\. Usage**

* **Small spacing (UI):** buttons, input paddings, chip gaps, card inner gutters → `10–40`.

* **Medium spacing (content):** paragraph gaps, card padding, grid gutters → `50–70`.

* **Large spacing (layout):** section padding, hero breathing room, inter-section dividers → `80–100`.

---

## **5\. Responsive Rules**

* **Mobile-first:** reduce large spacings by **20–30%** under **480–600px**.

  * e.g., `spacing-100 (128px)` → **96–100px**; `spacing-80 (64px)` → **48–56px**.

* **Clamps for sections:** `padding-block: clamp(2rem, 4vw, 6rem)` (maps to `60–90`).

* **Minimum tap target:** **44×44px** (use ≥ `spacing-40` paddings where relevant).

---

## **6\. Implementation**

* Add tokens under `settings.spacing.spacingScale` in `theme.json`.

* Mirror the same tokens in **Figma Variables** (category: Spacing).

* Legacy CSS fallback: export as `:root { --spacing-10: .25rem; … }`.

---

## **7\. Spacing Strategy for Luxury Black Heels Demo**

* **Base unit:** `4px` (`0.25rem`).

* **Progression:** Multiples of the base unit with meaningful jumps at content/layout breakpoints.

* **Use-case mapping:**

  * **Small paddings/margins:** `10–40` (form controls, badges, micro-layout).

  * **Section spacing / grid gaps:** `50–80`.

  * **Major layout spacing (heroes, lookbooks):** `90–100`.

---

## **8\. Spacing Scale**

| Slug | Size (rem) | Px Equivalent | Suggested Use |
| ----- | ----- | ----- | ----- |
| spacing-10 | 0.25rem | 4px | Icon gaps, hairline insets, chip spacing |
| spacing-20 | 0.5rem | 8px | Tight button padding, small label gaps |
| spacing-30 | 0.75rem | 12px | Input inner padding, compact card gutters |
| spacing-40 | 1rem | 16px | Base body line gaps, default block padding |
| spacing-50 | 1.5rem | 24px | Paragraph spacing, grid gaps (mobile) |
| spacing-60 | 2rem | 32px | Card padding (default), grid gaps (tablet) |
| spacing-70 | 3rem | 48px | Section inner padding (tight), feature rows |
| spacing-80 | 4rem | 64px | Section padding (standard), archive rows |
| spacing-90 | 6rem | 96px | Hero top/bottom, inter-section dividers |
| spacing-100 | 8rem | 128px | Large hero breathing room, campaign landing |

---

## **9\. theme.json Partial**

`{`  
  `"version": 3,`  
  `"settings": {`  
    `"spacing": {`  
      `"spacingScale": {`  
        `"steps": [`  
          `{ "slug": "spacing-10",  "size": "0.25rem", "name": "4px"   },`  
          `{ "slug": "spacing-20",  "size": "0.5rem",  "name": "8px"   },`  
          `{ "slug": "spacing-30",  "size": "0.75rem", "name": "12px"  },`  
          `{ "slug": "spacing-40",  "size": "1rem",    "name": "16px"  },`  
          `{ "slug": "spacing-50",  "size": "1.5rem",  "name": "24px"  },`  
          `{ "slug": "spacing-60",  "size": "2rem",    "name": "32px"  },`  
          `{ "slug": "spacing-70",  "size": "3rem",    "name": "48px"  },`  
          `{ "slug": "spacing-80",  "size": "4rem",    "name": "64px"  },`  
          `{ "slug": "spacing-90",  "size": "6rem",    "name": "96px"  },`  
          `{ "slug": "spacing-100", "size": "8rem",    "name": "128px" }`  
        `]`  
      `}`  
    `}`  
  `}`  
`}`

---

## **10\. Why This Works**

* **Precision at the micro level** (4–16px) without losing macro rhythm.

* **Consistent scaling** from component padding to hero spacing.

* **Token-first handoff** → design (Figma) → `theme.json` → CSS variables.

* **Responsive by design** with clamp-ready ranges and mobile reductions.

If you want, I can also output a **Figma variables JSON** and a **CSS variables map** (`--spacing-10` … `--spacing-100`) so devs and designers are literally on the same grid from day one.

