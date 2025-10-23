<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WealthBag
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="wealthbag-theme" dir="ltr" data-skin="dark" data-bs-theme="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="index, follow">
    
    <?php if (is_front_page() && is_home()) : ?>
        <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <?php elseif (is_singular()) : ?>
        <meta name="description" content="<?php echo esc_attr(wp_strip_all_tags(get_the_excerpt())); ?>">
    <?php endif; ?>
    
    <meta name="keywords" content="<?php echo esc_attr(get_theme_mod('wealthbag_meta_keywords', 'WealthBag, cryptocurrency, blockchain, crypto, digital currency, investment')); ?>">
    
    <!-- Favicon -->
    <?php if (has_site_icon()) : ?>
        <!-- WordPress handles favicon automatically -->
    <?php else : ?>
        <link rel="icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/favicon/favicon.ico">
    <?php endif; ?>
    
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Animated Background -->
<div class="bg-animation">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<!-- Navigation -->
<nav class="crypto-nav">
    <div class="nav-container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="logo-icon">💰</span>
                <span class="logo-text">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </span>
            <?php endif; ?>
        </div>
        
        <div class="nav-links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'depth'          => 2,
                'fallback_cb'    => 'wealthbag_fallback_menu',
            ));
            ?>
        </div>
        
        <div class="nav-actions">
            <?php if (get_theme_mod('wealthbag_show_connect_button', true)) : ?>
                <button class="btn-connect" id="connect-wallet">
                    <?php echo esc_html(get_theme_mod('wealthbag_connect_button_text', __('Connect Wallet', 'wealthbag'))); ?>
                </button>
            <?php endif; ?>
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e('Menu', 'wealthbag'); ?></span>
            <span class="hamburger"></span>
        </button>
    </div>
</nav>

<?php
/**
 * Fallback menu for primary navigation
 */
function wealthbag_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '" class="nav-link">' . esc_html__('Home', 'wealthbag') . '</a></li>';
    
    // Show pages in menu if no menu is assigned
    $pages = get_pages(array('sort_column' => 'menu_order'));
    foreach ($pages as $page) {
        if ($page->post_parent == 0) {
            echo '<li><a href="' . esc_url(get_permalink($page->ID)) . '" class="nav-link">' . esc_html($page->post_title) . '</a></li>';
        }
    }
    
    echo '</ul>';
}
?>