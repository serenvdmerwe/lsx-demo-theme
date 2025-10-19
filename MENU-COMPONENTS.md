# Reusable Menu Components Documentation

This theme includes a comprehensive set of reusable menu components that you can use throughout your WordPress site. Here's how to implement and customize them.

## Quick Start

### 1. Setting Up Menus in WordPress Admin

1. Go to **Appearance > Menus** in your WordPress admin
2. Create menus and assign them to these locations:
   - **Primary Menu**: Main navigation (header)
   - **Secondary Menu**: Secondary navigation (sidebar)
   - **Footer Menu**: Footer navigation
   - **Mobile Menu**: Mobile-specific navigation

### 2. Using Template Parts (Recommended for Block Themes)

Template parts are located in the `parts/` directory:

```html
<!-- Primary navigation -->
<!-- wp:template-part {"slug":"menu-primary"} /-->

<!-- Mobile navigation -->
<!-- wp:template-part {"slug":"menu-mobile"} /-->

<!-- Footer navigation -->
<!-- wp:template-part {"slug":"menu-footer"} /-->

<!-- Breadcrumb navigation -->
<!-- wp:template-part {"slug":"menu-breadcrumb"} /-->
```

### 3. Using PHP Functions (Classic Themes)

```php
<?php
// Display primary menu
lsx_demo_theme_display_menu('primary');

// Display simple horizontal menu
lsx_demo_theme_simple_menu('primary', 'custom-class');

// Display mobile menu with toggle
lsx_demo_theme_mobile_menu('mobile', 'Menu');
?>
```

## Available Functions

### `lsx_demo_display_menu($location, $args)`

Displays a full-featured navigation menu with dropdown support.

**Parameters:**
- `$location` (string): Menu location ('primary', 'secondary', 'footer', 'mobile')
- `$args` (array): Additional WordPress wp_nav_menu arguments

**Example:**
```php
lsx_demo_display_menu('primary', array(
    'menu_class' => 'custom-nav-menu',
    'container_class' => 'custom-navigation-wrapper'
));
```

### `lsx_demo_simple_menu($location, $class)`

Displays a simple horizontal menu without dropdowns.

**Parameters:**
- `$location` (string): Menu location
- `$class` (string): Additional CSS class

**Example:**
```php
lsx_demo_simple_menu('footer', 'footer-simple-nav');
```

### `lsx_demo_mobile_menu($location, $toggle_text)`

Displays a mobile-friendly menu with hamburger toggle.

**Parameters:**
- `$location` (string): Menu location
- `$toggle_text` (string): Text for toggle button

**Example:**
```php
lsx_demo_mobile_menu('mobile', 'Navigation');
```

### `lsx_demo_get_menu_items($location)`

Returns menu items as an array for custom implementations.

**Parameters:**
- `$location` (string): Menu location

**Example:**
```php
$menu_items = lsx_demo_get_menu_items('primary');
foreach ($menu_items as $item) {
    echo '<a href="' . $item->url . '">' . $item->title . '</a>';
}
```

## Custom Walker Class

The theme includes a custom walker class `LSX_Demo_Menu_Walker` that adds:
- Enhanced CSS classes
- Proper dropdown structure
- Accessibility improvements
- Active state management

## CSS Classes

### Navigation Wrapper Classes
- `.navigation-wrapper` - Base wrapper class
- `.primary-navigation` - Primary menu wrapper
- `.footer-navigation` - Footer menu wrapper
- `.mobile-menu-wrapper` - Mobile menu wrapper

### Menu Classes
- `.nav-menu` - Base menu class
- `.menu-item` - Individual menu item
- `.has-dropdown` - Menu item with submenu
- `.sub-menu` - Dropdown/submenu
- `.current-menu-item` - Active menu item
- `.mobile-nav-menu` - Mobile-specific menu

### Simple Menu Classes
- `.simple-menu` - Simple horizontal menu
- `.menu-link` - Simple menu links
- `.current` - Active simple menu link

### Mobile Menu Classes
- `.mobile-menu-toggle` - Toggle button
- `.mobile-navigation-wrapper` - Mobile menu container
- `.is-open` - Active state for mobile menu

### Breadcrumb Classes
- `.breadcrumb-navigation` - Breadcrumb wrapper
- `.breadcrumb-list` - Breadcrumb list
- `.breadcrumb-item` - Individual breadcrumb
- `.breadcrumb-link` - Breadcrumb links
- `.breadcrumb-current` - Current page breadcrumb

## JavaScript Features

The menu components include JavaScript for:
- Mobile menu toggle functionality
- Dropdown menu keyboard navigation
- Smooth scroll for anchor links
- Active state management
- Responsive menu handling
- Search integration

### Keyboard Navigation
- **Enter/Space**: Toggle dropdown menus
- **Arrow Down**: Open dropdown and focus first item
- **Arrow Up/Down**: Navigate within dropdown
- **Escape**: Close dropdown/mobile menu

## Customization

### Adding Custom Styles

Add your custom styles after the theme's CSS or create a child theme:

```css
/* Custom menu styles */
.nav-menu .menu-item a {
    color: #custom-color;
    font-weight: bold;
}

.nav-menu .menu-item:hover a {
    background-color: #custom-hover-color;
}
```

### Creating Custom Menu Layouts

You can create custom menu layouts by combining the PHP functions:

```php
<div class="custom-header-menu">
    <div class="menu-left">
        <?php lsx_demo_simple_menu('primary'); ?>
    </div>
    <div class="menu-right">
        <?php lsx_demo_mobile_menu('mobile'); ?>
    </div>
</div>
```

### Custom Menu Walker

To create your own menu walker, extend the base class:

```php
class Custom_Menu_Walker extends LSX_Demo_Menu_Walker {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Your custom implementation
        parent::start_el($output, $item, $depth, $args, $id);
    }
}
```

## Integration Examples

### Header Integration
```html
<header class="site-header">
    <div class="header-content">
        <div class="site-branding">
            <!-- Logo and title -->
        </div>

        <!-- Desktop Navigation -->
        <div class="desktop-navigation">
            <!-- wp:template-part {"slug":"menu-primary"} /-->
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-navigation">
            <!-- wp:template-part {"slug":"menu-mobile"} /-->
        </div>
    </div>
</header>
```

### Footer Integration
```html
<footer class="site-footer">
    <div class="footer-content">
        <!-- wp:template-part {"slug":"menu-footer"} /-->
    </div>
</footer>
```

### Sidebar Integration
```php
<aside class="sidebar">
    <?php
    lsx_demo_display_menu('secondary', array(
        'menu_class' => 'sidebar-menu vertical-menu'
    ));
    ?>
</aside>
```

## Best Practices

1. **Always provide fallback content** when menus aren't assigned
2. **Test keyboard navigation** for accessibility compliance
3. **Use semantic HTML** structure for better SEO
4. **Implement proper ARIA labels** for screen readers
5. **Test on mobile devices** for responsive behavior
6. **Cache menu queries** for better performance on large sites

## Troubleshooting

### Menu Not Displaying
- Check if menu is assigned to the correct location in **Appearance > Menus**
- Verify the location parameter matches registered locations
- Check if `has_nav_menu()` returns true for the location

### Dropdowns Not Working
- Ensure JavaScript is loaded correctly
- Check for JavaScript errors in browser console
- Verify CSS classes are applied correctly

### Mobile Menu Toggle Not Working
- Check if JavaScript is enqueued
- Verify button has correct classes and attributes
- Test for conflicting JavaScript/CSS

### Styling Issues
- Check CSS specificity and load order
- Verify custom styles are not being overridden
- Use browser developer tools to debug

## Performance Optimization

1. **Use caching** for menu queries on high-traffic sites
2. **Minimize menu depth** for better performance
3. **Optimize images** in menu items if using custom fields
4. **Consider lazy loading** for large menu structures

This comprehensive menu system gives you the flexibility to create any navigation pattern while maintaining consistency, accessibility, and performance.