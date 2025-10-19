# WordPress Template Quick Start Guide

Your child theme now includes a complete set of WordPress templates with the reusable header component integrated. Here's how to use them:

## 📁 Templates Created

### Core Templates
- **`header.php`** - Custom header with reusable component (sticky header with custom CTAs)
- **`footer.php`** - Complete footer with widgets and social links
- **`index.php`** - Main blog listing page
- **`single.php`** - Individual blog post template
- **`page.php`** - Static page template
- **`front-page.php`** - Homepage template with hero, services, about, and contact sections

### Header Component Files
- **`parts/header-component.php`** - PHP template part
- **`parts/header-component.html`** - Block editor pattern
- **`functions.php`** - Header component function and theme setup

## 🚀 How the Header Component is Used

### In Templates
Each template automatically uses the header component through `get_header()` which loads `header.php`:

```php
// header.php uses the header component with custom settings
lsx_demo_child_header_component(array(
    'show_logo' => true,
    'show_nav' => true,
    'show_cta' => true,
    'cta_text' => 'Get Quote',
    'cta_link' => '/contact',
    'cta_secondary_text' => 'Our Services',
    'cta_secondary_link' => '/services',
    'sticky' => true
));
```

### Page-Specific Headers
You can create different headers for different page types by modifying `header.php`:

```php
<?php
if (is_front_page()) {
    // Homepage header
    lsx_demo_child_header_component(array(
        'cta_text' => 'Start Free Trial',
        'cta_link' => '/signup',
        'sticky' => true
    ));
} elseif (is_shop()) {
    // Shop header
    lsx_demo_child_header_component(array(
        'cta_text' => 'View Cart',
        'cta_link' => '/cart'
    ));
} else {
    // Default header
    lsx_demo_child_header_component();
}
?>
```

## 🎨 Customization

### 1. Modify Header Settings
Edit `header.php` to change the header component settings:
- Change CTA button text and links
- Enable/disable sticky behavior
- Show/hide logo, navigation, or CTAs

### 2. Update Styles
Customize the appearance in `style.css`:
- Header colors and fonts
- Layout and spacing
- Mobile responsiveness

### 3. Add Your Content
- **Homepage**: Edit `front-page.php` to update hero text, services, and content
- **Footer**: Modify `footer.php` to add your contact info and links
- **About/Contact pages**: Create these pages in WordPress admin

## 📋 WordPress Setup Checklist

### 1. Create a Navigation Menu
1. Go to **Appearance > Menus**
2. Create a new menu
3. Add your pages/links
4. Assign to "Primary Menu" location

### 2. Set Up Your Homepage
1. Create a new page called "Home"
2. Go to **Settings > Reading**
3. Set "Your homepage displays" to "A static page"
4. Select your "Home" page

### 3. Add Your Logo
1. Go to **Appearance > Customize**
2. Navigate to "Site Identity"
3. Upload your logo

### 4. Create Basic Pages
Create these pages in **Pages > Add New**:
- About
- Services
- Contact
- Privacy Policy
- Terms of Service

## 🎯 Template Hierarchy

WordPress will automatically use these templates:

| Page Type | Template Used | Purpose |
|-----------|---------------|---------|
| Homepage | `front-page.php` | Custom homepage with sections |
| Blog posts listing | `index.php` | Shows all blog posts |
| Individual post | `single.php` | Single blog post view |
| Static pages | `page.php` | About, Contact, etc. |
| All pages | `header.php` + `footer.php` | Header and footer |

## 🔧 Header Component Variations

### Minimal Header (No CTAs)
```php
lsx_demo_child_header_component(array(
    'show_cta' => false
));
```

### Logo Only
```php
lsx_demo_child_header_component(array(
    'show_nav' => false,
    'show_cta' => false
));
```

### Custom CTAs
```php
lsx_demo_child_header_component(array(
    'cta_text' => 'Book Now',
    'cta_link' => '/booking',
    'cta_secondary_text' => 'Call Us',
    'cta_secondary_link' => 'tel:+1234567890'
));
```

## 📱 Mobile Features

The header component includes:
- ✅ Responsive hamburger menu
- ✅ Touch-friendly buttons
- ✅ Mobile-optimized layout
- ✅ Sticky header option

## 🎨 Color Scheme

Default colors used (easily customizable in CSS):
- **Primary**: #007cba (blue)
- **Secondary**: #333 (dark gray)
- **Background**: #ffffff (white)
- **Text**: #333 (dark gray)
- **Border**: #e5e5e5 (light gray)

## 📝 Next Steps

1. **Upload to WordPress**: Upload the entire child theme folder to `/wp-content/themes/`
2. **Activate**: Go to Appearance > Themes and activate "lsx-demo-child"
3. **Set up menus**: Create and assign your navigation menu
4. **Add content**: Create pages and add your content
5. **Customize**: Modify colors, fonts, and layout in `style.css`
6. **Test**: Check all templates and the header component on different devices

## 🆘 Troubleshooting

### Header Not Showing
- Check that a menu is assigned to "Primary Menu" location
- Verify `header.php` is calling the header component function

### Styling Issues
- Clear any caching plugins
- Check CSS file is loading properly
- Use browser dev tools to inspect styles

### Mobile Menu Not Working
- Ensure JavaScript is loading
- Check for conflicts with other plugins
- Verify hamburger menu HTML structure is intact

Your WordPress theme is now ready with a fully functional, reusable header component! 🎉