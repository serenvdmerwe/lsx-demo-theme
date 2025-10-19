# Header Components Documentation

## Overview

This theme includes a comprehensive set of reusable header components designed to provide flexibility, accessibility, and consistent branding across your WordPress site. All components follow WCAG 2.2 AA accessibility standards and are fully responsive.

## Available Header Components

### 1. Header Component - Default (`header-component-default`)
**Best for:** Standard business websites, blogs, portfolios

**Features:**
- Site logo and title on the left
- Horizontal navigation on the right
- Built-in search functionality
- Clean, professional appearance
- Responsive design with mobile optimization

**Usage:** Perfect for most websites where you want a traditional header layout.

### 2. Header Component - Centered (`header-component-centered`)
**Best for:** Creative agencies, artists, brand-focused sites

**Features:**
- Centered logo and site title
- Navigation below the branding
- Prominent site title with larger typography
- Symmetrical, balanced design
- Enhanced visual hierarchy

**Usage:** Ideal when you want to emphasize your brand and create a more artistic impression.

### 3. Header Component - Minimal (`header-component-minimal`)
**Best for:** Modern, clean designs, content-focused sites

**Features:**
- Ultra-clean design with essential elements only
- Subtle typography and spacing
- No visual clutter or decorative elements
- Fast loading and minimal DOM structure
- Focus on content over decoration

**Usage:** Perfect for blogs, documentation sites, or when you want content to be the primary focus.

### 4. Header Component - Featured (`header-component-featured`)
**Best for:** E-commerce, promotional campaigns, conversion-focused sites

**Features:**
- Promotional banner area at the top
- Call-to-action button integrated
- Accent colors from your theme palette
- Marketing-friendly design
- Built-in urgency messaging capability

**Usage:** Excellent for sales campaigns, product launches, or when you need to drive specific actions.

### 5. Header Component - Mobile First (`header-component-mobile-first`)
**Best for:** Mobile-heavy audiences, progressive web apps

**Features:**
- Optimized specifically for mobile devices
- Touch-friendly interface elements
- Overlay navigation for mobile
- Full-width search on mobile
- Progressive enhancement approach

**Usage:** Choose this when your primary audience uses mobile devices or for app-like experiences.

## Implementation

### Using in Template Parts

Replace your existing header template parts with the new components:

```html
<!-- In parts/header.html -->
<!-- wp:pattern {"slug":"lsx-demo-theme/header-component-default"} /-->
```

### Customizing Components

Each component can be customized by:

1. **Editing the pattern files** directly in `/patterns/header-component-*.php`
2. **Using custom CSS** to override styles
3. **Creating variations** by duplicating and modifying existing components

### CSS Classes

Each component includes specific CSS classes for styling:

- `.site-logo` - Site logo styling
- `.site-title` - Site title styling  
- `.main-navigation` - Navigation container
- `.header-search` - Search functionality
- `.header-cta-button` - Call-to-action buttons

## Accessibility Features

All header components include:

- **Semantic HTML5** with proper `<header>` tags
- **ARIA labels** for screen readers
- **Keyboard navigation** support
- **Focus management** with visible focus indicators
- **High contrast mode** support
- **Reduced motion** respect for user preferences
- **Mobile accessibility** with touch-friendly targets

## Responsive Design

Components are built with:

- **Mobile-first approach** using progressive enhancement
- **Flexible layouts** that adapt to different screen sizes
- **Touch-friendly targets** (minimum 44x44px)
- **Scalable typography** using clamp() functions
- **Optimized spacing** for different devices

## Performance Considerations

- **Minimal CSS** with efficient selectors
- **Semantic HTML** for better SEO
- **Optimized images** support with responsive sizing
- **Fast rendering** with minimal DOM complexity
- **Efficient caching** compatibility

## Browser Support

- **Modern browsers** (Chrome, Firefox, Safari, Edge)
- **Progressive enhancement** for older browsers
- **Graceful degradation** when features aren't supported
- **Cross-platform consistency** across devices

## Development Guidelines

When creating new header components:

1. **Follow the naming convention** `header-component-[name]`
2. **Include proper PHP documentation** headers
3. **Use theme design tokens** from theme.json
4. **Implement accessibility** from the start
5. **Test on multiple devices** and screen sizes
6. **Include proper ARIA labels** and semantic markup
7. **Follow WordPress coding standards**

## Troubleshooting

### Common Issues

1. **Navigation not showing:** Check if navigation menu is assigned in WordPress admin
2. **Search not working:** Ensure search functionality is enabled in WordPress
3. **Logo not displaying:** Check if site logo is set in Customizer
4. **Responsive issues:** Clear cache and test on actual devices

### Debug Tips

- Use browser developer tools to inspect elements
- Check console for JavaScript errors  
- Validate HTML for semantic correctness
- Test with screen readers for accessibility
- Use Lighthouse for performance auditing

## Contributing

When contributing new header components:

1. Follow the established patterns and conventions
2. Include comprehensive documentation
3. Test thoroughly across devices and browsers
4. Ensure accessibility compliance
5. Submit with clear commit messages and pull request descriptions

## License

These header components are licensed under GPL-3.0, same as the parent theme.