<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WealthBag
 * @since 1.0.0
 */
?>

<!-- Footer -->
<footer class="crypto-footer">
    <div class="container">
        <?php if (is_active_sidebar('footer-widgets')) : ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        <?php endif; ?>
        
        <div class="footer-content">
            <div class="footer-brand">
                <?php if (has_custom_logo()) : ?>
                    <div class="footer-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <span class="logo-icon">💰</span>
                    <span class="logo-text">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </span>
                <?php endif; ?>
            </div>
            
            <div class="footer-text">
                <p>
                    <?php
                    $footer_text = get_theme_mod('wealthbag_footer_text', '');
                    if ($footer_text) {
                        echo wp_kses_post($footer_text);
                    } else {
                        printf(
                            esc_html__('&copy; %1$s %2$s. All rights reserved. Building the future of cryptocurrency.', 'wealthbag'),
                            date('Y'),
                            get_bloginfo('name')
                        );
                    }
                    ?>
                </p>
            </div>
            
            <?php if (has_nav_menu('footer')) : ?>
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'footer-nav-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (get_theme_mod('wealthbag_show_back_to_top', true)) : ?>
            <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'wealthbag'); ?>">
                <span class="arrow-up">↑</span>
            </button>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>