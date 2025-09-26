# **Custom spacing scale**

Got it. Instead of copying the default example in your reference doc, here’s a **custom spacing scale** for Brandon’s fishing block theme that feels natural, airy, and outdoorsy — while staying consistent and predictable for `theme.json`.

---

## **🎣 Spacing Strategy for Brandon’s Theme**

* **Base unit**: 4px (0.25rem) — small enough for fine control.

* **Scale progression**: multiples of 4px, but grouped in **meaningful steps** (8px, 16px, 24px, etc.) for real-world layouts.

* **Use case mapping**:

  * Small paddings/margins → 4–12px.

  * Section spacing / grid gaps → 16–32px.

  * Major layout spacing → 48–80px.

---

## **📏 Spacing Scale**

| Slug | Size | Px Equivalent | Suggested Use |
| ----- | ----- | ----- | ----- |
| `spacing-10` | 0.25rem | 4px | Fine adjustments, borders, icon gaps |
| `spacing-20` | 0.5rem | 8px | Small gaps, inline elements |
| `spacing-30` | 0.75rem | 12px | Button padding, card insets |
| `spacing-40` | 1rem | 16px | Default paragraph gap, list spacing |
| `spacing-50` | 1.5rem | 24px | Block gaps, between form fields |
| `spacing-60` | 2rem | 32px | Section padding, grid gutters |
| `spacing-70` | 3rem | 48px | Major section padding, image margins |
| `spacing-80` | 4rem | 64px | Hero sections, homepage blocks |
| `spacing-90` | 5rem | 80px | Full-page breathing space, dividers |
| `spacing-100` | 6rem | 96px | Top-level layout rhythm |

---

## **📄 theme.json Partial**

`{`  
  `"version": 3,`  
  `"settings": {`  
    `"spacing": {`  
      `"spacingScale": {`  
        `"steps": [`  
          `{ "slug": "spacing-10", "size": "0.25rem", "name": "4px" },`  
          `{ "slug": "spacing-20", "size": "0.5rem",  "name": "8px" },`  
          `{ "slug": "spacing-30", "size": "0.75rem", "name": "12px" },`  
          `{ "slug": "spacing-40", "size": "1rem",    "name": "16px" },`  
          `{ "slug": "spacing-50", "size": "1.5rem",  "name": "24px" },`  
          `{ "slug": "spacing-60", "size": "2rem",    "name": "32px" },`  
          `{ "slug": "spacing-70", "size": "3rem",    "name": "48px" },`  
          `{ "slug": "spacing-80", "size": "4rem",    "name": "64px" },`  
          `{ "slug": "spacing-90", "size": "5rem",    "name": "80px" },`  
          `{ "slug": "spacing-100","size": "6rem",    "name": "96px" }`  
        `]`  
      `}`  
    `}`  
  `}`  
`}`

---

## **✅ Why This Works**

* Keeps **small increments** for UI precision (buttons, cards).

* Scales up to **big layout spacing** for Brandon’s large fish images and story-driven templates.

* Easy to map into **Figma tokens → theme.json → CSS vars**.

---

