# LSX Demo Theme - Copilot Configuration

This configuration file enhances GitHub Copilot's understanding of the LSX Demo Theme project structure and development patterns.

## File Structure Guidelines

When working with Copilot in this repository, follow these patterns:

### Block Patterns
- New block patterns should be added to the `/patterns` directory
- Follow naming convention: `category-descriptive-name.php`
- Include pattern registration at the top of each file
- Document pattern usage in code comments

### Template Parts
- Store reusable template parts in `/parts` directory
- Use semantic HTML5 elements within template parts
- Utilize theme.json variables for styling

### Theme Features
- Register new features in `functions.php` using proper WordPress hooks
- Separate functionality into logical files in a `/inc` directory if needed
- Document all functions with proper PHPDoc comments

## Copilot Tips

- When asking Copilot to create a new pattern, specify:
  - The pattern category (banner, cta, etc.)
  - Responsive behavior expectations
  - Accessibility requirements
  - Which theme.json variables to utilize

- When modifying existing patterns:
  - Reference the pattern by exact filename
  - Describe the changes needed
  - Consider accessibility implications

## Theme.json Usage

Copilot should prioritize using theme.json variables for:
- Color palettes
- Typography settings
- Spacing values
- Layout configurations

## WordPress Coding Standards

All PHP code should follow WordPress Coding Standards:
- Use 4-space indentation (not tabs)
- Follow WordPress naming conventions
- Properly sanitize and escape all dynamic data
- Use WordPress translation functions for all user-facing strings
