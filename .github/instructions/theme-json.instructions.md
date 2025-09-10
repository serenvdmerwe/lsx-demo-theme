---
applyTo: "**/theme.json"
description: "Guidance for editing theme.json (colors, typography, spacing)"
---

# theme.json Instructions

## General Guidelines

- Use named tokens (e.g., primary, accent) consistently across JSON.
- Always validate your JSON using a linter or online validator.
- Follow design specs from the LSX Design System.
- Keep the structure organized and readable with appropriate indentation.
- Add comments when necessary using JSON comment syntax.

## Color Palettes

- Define color palettes using named tokens (primary, secondary, accent, etc.).
- Include both solid colors and gradients where appropriate.
- Ensure sufficient contrast ratios for accessibility (minimum 4.5:1 for text).
- Group related colors logically in the palette.
- Include dark mode alternatives where applicable.

## Typography

- Ensure typography entries have descriptive slugs.
- Provide complete font-size definitions with both pixel and rem values.
- Include fluid values for responsive typography using clamp().
- Define a complete type scale with appropriate ratios.
- Specify font-family, font-weight, and line-height values.
- Configure appropriate drop caps and letter spacing options.

## Spacing

- Create a consistent spacing scale (e.g., xs, sm, md, lg, xl).
- Provide fluid values for spacing, especially for margins and paddings.
- Define appropriate spacings for block gaps and margins.
- Use consistent units (rem preferred) throughout spacing values.
- Configure responsive spacing adjustments for different viewport sizes.

## Layout

- Define appropriate content width and wide width values.
- Configure layout constraints for different viewport sizes.
- Set up proper block gap values for consistent spacing.
- Define appropriate content and wide size constraints.
- Configure responsive layout adjustments.

## Custom Values

- When adding custom values, use descriptive names that reflect purpose.
- Document any non-standard additions to theme.json.
- Keep custom values organized and grouped logically.
- Ensure backward compatibility with core blocks.
- Test custom values across different block types before implementation.
