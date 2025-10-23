# WealthBag WordPress Theme

## Overview
WealthBag is a modern, responsive WordPress theme designed for cryptocurrency, blockchain, and fintech websites. The theme features a professional design with dynamic customization options, responsive layout, and optimized performance.

## Features

### Core Features
- **Fully Responsive Design**: Optimized for all devices (desktop, tablet, mobile)
- **WordPress Customizer Integration**: Easy content management through WordPress admin
- **Security Enhancements**: Built-in security measures and optimizations
- **Performance Optimized**: Fast loading times and efficient code
- **SEO Friendly**: Clean code structure for better search engine visibility
- **Custom Post Types**: Support for projects and team members

### Design Features
- **Modern UI/UX**: Clean, professional design suitable for financial services
- **Banner System**: Containerized banners with proper spacing
- **Typography**: Google Fonts integration (Orbitron, Inter)
- **Color Scheme**: Professional blue and green cryptocurrency-themed palette
- **Navigation**: Responsive navigation with mobile menu support

### Customization Options
- **Site Identity**: Logo, title, and tagline customization
- **Banner Sections**: Multiple customizable banner areas
- **Social Media**: Integrated social media links
- **Footer**: Customizable footer content and layout
- **Colors**: Theme color customization support

## Installation

### Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### Installation Steps

1. **Upload Theme Files**
   - Download the theme files
   - Navigate to `wp-content/themes/` in your WordPress installation
   - Create a new folder named `wealthbag`
   - Upload all theme files to this folder

2. **Activate Theme**
   - Log in to your WordPress admin dashboard
   - Navigate to `Appearance > Themes`
   - Find "WealthBag" and click "Activate"

3. **Setup Menus**
   - Go to `Appearance > Menus`
   - Create a new menu and assign it to "Primary Menu" location
   - Optionally create a footer menu

4. **Configure Customizer**
   - Navigate to `Appearance > Customize`
   - Configure site identity, banners, and social media settings
   - Customize colors and typography as needed

## File Structure

```
wealthbag/
├── style.css                 # Main stylesheet with WordPress theme header
├── functions.php             # Theme functionality and WordPress hooks
├── index.php                 # Main template file
├── header.php                # Theme header template
├── footer.php                # Theme footer template
├── single.php                # Single post template
├── page.php                  # Page template
├── archive.php               # Archive template
├── search.php                # Search results template
├── 404.php                   # 404 error page template
├── sidebar.php               # Sidebar template
├── comments.php              # Comments template
├── screenshot.png            # Theme screenshot (1200x900px recommended)
├── inc/
│   ├── template-tags.php     # Template helper functions
│   ├── template-functions.php # Additional template functions
│   ├── customizer.php        # WordPress Customizer configuration
│   ├── custom-post-types.php # Custom post types registration
│   └── security.php          # Security enhancements
├── template-parts/
│   ├── content.php           # Default post content template
│   ├── content-search.php    # Search results content template
│   └── content-none.php      # No content found template
└── assets/                   # Static assets (CSS, JS, images)
    ├── css/
    ├── js/
    ├── img/
    └── vendor/
```

## Customization

### WordPress Customizer
The theme includes comprehensive customizer options:

1. **Site Identity**
   - Custom logo upload
   - Site title and tagline
   - Site icon (favicon)

2. **Banner Settings**
   - Banner 1: Title, description, button text and link
   - Banner 2: Title, description, button text and link
   - Banner 3: Title, description, button text and link

3. **Social Media**
   - Facebook, Twitter, LinkedIn, Instagram, YouTube links

4. **Colors**
   - Primary and secondary color customization
   - Background color options

### Child Theme Support
To create a child theme:

1. Create a new folder: `wealthbag-child`
2. Create `style.css` with theme header:
```css
/*
Theme Name: WealthBag Child
Template: wealthbag
Version: 1.0.0
*/

@import url("../wealthbag/style.css");
```
3. Create `functions.php`:
```php
<?php
function wealthbag_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'wealthbag_child_enqueue_styles');
```

## Custom Post Types

### Projects
- Custom post type for portfolio/project showcase
- Supports: title, content, featured image, excerpt, custom fields
- Archive page available at `/projects/`
- Includes project categories taxonomy

### Team Members
- Custom post type for team member profiles
- Supports: title, content, featured image, excerpt, custom fields
- Archive page available at `/team/`

## Security Features

- WordPress version number removal
- XML-RPC disabled
- Security headers implementation
- Login attempt limiting
- File editing disabled in admin
- REST API restrictions for non-authenticated users

## Performance Optimizations

- Script and style version removal
- jQuery migrate removal
- Script deferring for non-critical JavaScript
- Optimized image sizes
- Efficient CSS loading

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Troubleshooting

### Common Issues

1. **Theme not displaying correctly**
   - Clear any caching plugins
   - Check file permissions (755 for folders, 644 for files)
   - Ensure all theme files are uploaded correctly

2. **Customizer settings not saving**
   - Check file permissions for wp-content directory
   - Disable other plugins temporarily to check for conflicts

3. **Images not displaying**
   - Verify image paths in customizer
   - Check file permissions for uploads directory
   - Regenerate thumbnails using a plugin

## Support

For support and documentation:
- Check WordPress Codex: https://codex.wordpress.org/
- WordPress Support Forums: https://wordpress.org/support/
- Theme-specific issues: Contact theme developer

## Changelog

### Version 1.0.0
- Initial release
- Responsive design implementation
- WordPress Customizer integration
- Security enhancements
- Performance optimizations
- Custom post types
- Complete template hierarchy

## License

This theme is licensed under the GPL v2 or later.

## Credits

- WordPress: https://wordpress.org/
- Google Fonts: https://fonts.google.com/
- Font Awesome: https://fontawesome.com/ (if used)
- Bootstrap: https://getbootstrap.com/ (if used)