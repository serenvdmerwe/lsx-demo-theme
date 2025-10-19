# Reusable Header Component Documentation

This child theme includes a flexible, reusable header component that can be used in multiple ways across your WordPress site.

## Features

- **Responsive Design**: Mobile-first approach with hamburger menu
- **Flexible Options**: Show/hide logo, navigation, and CTA buttons
- **Sticky Header**: Optional sticky positioning
- **Block Editor Support**: Includes block patterns for Gutenberg
- **Multiple Implementation Methods**: Function calls, template parts, and block patterns
- **Customizable CTAs**: Primary and secondary call-to-action buttons
- **Accessibility**: ARIA labels and keyboard navigation support

## Implementation Methods

### 1. PHP Function (Recommended)

The most flexible way to use the header component:

```php
<?php
// Basic usage with defaults
lsx_demo_child_header_component();

// Custom configuration
lsx_demo_child_header_component(array(
    'show_logo' => true,
    'show_nav' => true,
    'show_cta' => true,
    'cta_text' => 'Get Started',
    'cta_link' => '#contact',
    'cta_secondary_text' => 'Learn More',
    'cta_secondary_link' => '#about',
    'container_class' => 'custom-header-component',
    'sticky' => false
));
?>
```

### 2. Template Part

Include the header component as a template part:

```php
<?php
// Include the template part
get_template_part('parts/header', 'component');

// Or include directly with arguments
$args = array('sticky' => true, 'cta_text' => 'Shop Now');
include get_stylesheet_directory() . '/parts/header-component.php';
?>
```

### 3. Block Pattern (Gutenberg)

In the block editor, you can:
1. Go to Patterns → Browse all patterns
2. Look for "Custom Header Component" pattern
3. Insert it into your template or page

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `show_logo` | boolean | `true` | Display site logo or title |
| `show_nav` | boolean | `true` | Display navigation menu |
| `show_cta` | boolean | `true` | Display CTA buttons |
| `cta_text` | string | `'Get Started'` | Primary CTA button text |
| `cta_link` | string | `'#contact'` | Primary CTA button link |
| `cta_secondary_text` | string | `'Learn More'` | Secondary CTA button text |
| `cta_secondary_link` | string | `'#about'` | Secondary CTA button link |
| `container_class` | string | `'custom-header-component'` | CSS class for header container |
| `sticky` | boolean | `false` | Make header sticky on scroll |

## Usage Examples

### Homepage Header
```php
<?php
lsx_demo_child_header_component(array(
    'cta_text' => 'Start Free Trial',
    'cta_link' => '/signup',
    'cta_secondary_text' => 'Watch Demo',
    'cta_secondary_link' => '/demo',
    'sticky' => true
));
?>
```

### Shop Header
```php
<?php
lsx_demo_child_header_component(array(
    'cta_text' => 'View Cart',
    'cta_link' => '/cart',
    'cta_secondary_text' => 'Wishlist',
    'cta_secondary_link' => '/wishlist',
    'container_class' => 'shop-header'
));
?>
```

### Minimal Header (No CTAs)
```php
<?php
lsx_demo_child_header_component(array(
    'show_cta' => false,
    'container_class' => 'minimal-header'
));
?>
```

### Logo Only Header
```php
<?php
lsx_demo_child_header_component(array(
    'show_nav' => false,
    'show_cta' => false,
    'container_class' => 'logo-only-header'
));
?>
```

## Customization

### CSS Customization

The header component includes comprehensive CSS that can be customized in your `style.css`:

```css
/* Customize header background */
.reusable-header-component {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* Customize CTA buttons */
.cta-primary {
    background: #ff6b6b;
    border-radius: 25px;
}

/* Customize navigation */
.header-menu a {
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
```

### JavaScript Customization

The header includes built-in mobile menu functionality. You can extend it:

```javascript
// Add custom behavior
document.addEventListener('DOMContentLoaded', function() {
    // Custom scroll behavior for sticky header
    const header = document.querySelector('.sticky-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
});
```

## File Structure

```
lsx-demo-child/
├── functions.php                 # Main functions and header component function
├── header.php                   # Custom header template
├── header-examples.php          # Usage examples
├── style.css                    # Header component styles
└── parts/
    ├── header-component.html    # Block editor pattern
    └── header-component.php     # PHP template part
```

## WordPress Menu Setup

1. Go to **Appearance > Menus** in WordPress admin
2. Create a new menu or edit existing one
3. Assign the menu to "Primary Menu" location
4. The header component will automatically display this menu

## Block Theme Support

If you're using a block theme approach:
1. The header pattern is automatically registered
2. Use the block editor to insert the pattern
3. Customize colors and spacing using block settings

## Troubleshooting

### Menu Not Showing
- Ensure you have assigned a menu to the "Primary Menu" location
- Check that menu items are published and not draft

### CTA Buttons Not Working
- Verify the links are correct (use full URLs for external links)
- Check CSS for display issues

### Mobile Menu Issues
- Ensure JavaScript is loading properly
- Check for JavaScript conflicts with other plugins

### Styling Issues
- Clear any caching plugins
- Check CSS specificity if custom styles aren't applying
- Use browser dev tools to inspect element styles

## Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Notes

- The header component is lightweight and optimized
- CSS uses modern features with fallbacks
- JavaScript is vanilla (no jQuery dependency)
- Responsive images for logos are supported