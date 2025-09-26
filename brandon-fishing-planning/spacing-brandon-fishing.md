# **Custom Spacing Scale**

Here’s a **custom spacing scale** for Brandon’s fishing block theme that feels natural, airy, and outdoorsy — while staying consistent and predictable for `theme.json`.

---

## **🎣 Spacing Strategy for Brandon’s Theme**

-   **Base unit**: 4px (0.25rem) — small enough for fine control.
-   **Scale progression**: multiples of 4px, but grouped in **meaningful steps** (8px, 16px, 24px, etc.) for real-world layouts.
-   **Use case mapping**:
    -   Major layout spacing → 48–80px.

---

## **📏 Spacing Scale**

| Slug         | Size    | Px Equivalent | Suggested Use                        |
| ------------ | ------- | ------------- | ------------------------------------ |
| `spacing-10` | 0.25rem | 4px           | Fine adjustments, borders, icon gaps |
| `spacing-20` | 0.5rem  | 8px           | Small gaps, inline elements          |
| `spacing-30` | 0.75rem | 12px          | Button padding, card insets          |
| `spacing-40` | 1rem    | 16px          | Default paragraph gap, list spacing  |
| `spacing-50` | 1.5rem  | 24px          | Block gaps, between form fields      |
| `spacing-60` | 2rem    | 32px          | Section padding, grid gutters        |
| `spacing-70` | 3rem    | 48px          | Major section padding, image margins |
| `spacing-80` | 4rem    | 64px          | Hero sections, homepage blocks       |

---

## **📄 Example theme.json Partial**

```json
{
    "spacing": {
        "spacing-10": "0.25rem",
        "spacing-20": "0.5rem",
        "spacing-30": "0.75rem",
        "spacing-40": "1rem",
        "spacing-50": "1.5rem",
        "spacing-60": "2rem",
        "spacing-70": "3rem",
        "spacing-80": "4rem"
    }
}
```
