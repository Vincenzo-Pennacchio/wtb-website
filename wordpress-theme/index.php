<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WealthBag
 * @since 1.0.0
 */

get_header();
?>

<?php if (is_front_page()) : ?>
    <!-- First Banner Section -->
    <section class="first-banner-section">
        <div class="first-banner-container">
            <div class="first-banner-background">
                <?php 
                $first_banner_image = get_theme_mod('wealthbag_first_banner_image', get_template_directory_uri() . '/assets/img/backgrounds/WTB-background-img.jpeg');
                ?>
                <img src="<?php echo esc_url($first_banner_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> First Banner" class="first-banner-image">
            </div>
            <div class="first-banner-content">
                <div class="first-banner-text">
                    <h2 class="first-banner-title">
                        <span class="first-banner-highlight">
                            <?php echo esc_html(get_theme_mod('wealthbag_banner_title', get_bloginfo('name'))); ?>
                        </span> 
                        <?php echo esc_html(get_theme_mod('wealthbag_banner_title_suffix', 'Revolution')); ?>
                    </h2>
                    <p class="first-banner-subtitle">
                        <?php echo esc_html(get_theme_mod('wealthbag_banner_subtitle', 'The next generation of cryptocurrency is here')); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Banner Section -->
    <section class="banner-section">
        <div class="banner-container">
            <div class="banner-background">
                <?php 
                $main_banner_image = get_theme_mod('wealthbag_main_banner_image', get_template_directory_uri() . '/assets/img/backgrounds/WTB-background-img-2.jpeg');
                ?>
                <img src="<?php echo esc_url($main_banner_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Banner" class="banner-image">
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php echo wp_kses_post(get_theme_mod('wealthbag_hero_title', 'Welcome to the Future of <span class="gradient-text">WealthBag</span>')); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo esc_html(get_theme_mod('wealthbag_hero_subtitle', 'Revolutionizing digital wealth with cutting-edge blockchain technology. Join the new era of financial freedom and prosperity.')); ?>
                </p>
                <div class="hero-actions">
                    <?php if (get_theme_mod('wealthbag_show_primary_button', true)) : ?>
                        <button class="btn-primary">
                            <?php echo esc_html(get_theme_mod('wealthbag_primary_button_text', 'Buy WealthBag')); ?>
                        </button>
                    <?php endif; ?>
                    <?php if (get_theme_mod('wealthbag_show_secondary_button', true)) : ?>
                        <button class="btn-secondary">
                            <?php echo esc_html(get_theme_mod('wealthbag_secondary_button_text', 'Learn More')); ?>
                        </button>
                    <?php endif; ?>
                </div>
                <div class="hero-stats">
                    <?php
                    $stats = array(
                        array(
                            'value' => get_theme_mod('wealthbag_stat_1_value', '$2.45'),
                            'label' => get_theme_mod('wealthbag_stat_1_label', 'Current Price')
                        ),
                        array(
                            'value' => get_theme_mod('wealthbag_stat_2_value', '+24.5%'),
                            'label' => get_theme_mod('wealthbag_stat_2_label', '24h Change')
                        ),
                        array(
                            'value' => get_theme_mod('wealthbag_stat_3_value', '$125M'),
                            'label' => get_theme_mod('wealthbag_stat_3_label', 'Market Cap')
                        )
                    );
                    
                    foreach ($stats as $stat) :
                        if ($stat['value'] && $stat['label']) :
                    ?>
                        <div class="stat">
                            <div class="stat-value"><?php echo esc_html($stat['value']); ?></div>
                            <div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
                        </div>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
            <div class="hero-visual">
                <div class="crypto-coin">
                    <div class="coin-inner">
                        <?php 
                        $coin_logo = get_theme_mod('wealthbag_coin_logo', get_template_directory_uri() . '/assets/img/backgrounds/WTB-Logo.jpeg');
                        ?>
                        <img src="<?php echo esc_url($coin_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="coin-logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <h2 class="section-title">
                <?php echo esc_html(get_theme_mod('wealthbag_about_title', 'About ' . get_bloginfo('name'))); ?>
            </h2>
            <div class="features-grid">
                <?php
                $features = array(
                    array(
                        'icon' => '🔒',
                        'title' => get_theme_mod('wealthbag_feature_1_title', 'Secure'),
                        'description' => get_theme_mod('wealthbag_feature_1_desc', 'Advanced cryptographic security ensures your assets are always protected')
                    ),
                    array(
                        'icon' => '⚡',
                        'title' => get_theme_mod('wealthbag_feature_2_title', 'Fast'),
                        'description' => get_theme_mod('wealthbag_feature_2_desc', 'Lightning-fast transactions with minimal fees on our optimized blockchain')
                    ),
                    array(
                        'icon' => '🌍',
                        'title' => get_theme_mod('wealthbag_feature_3_title', 'Global'),
                        'description' => get_theme_mod('wealthbag_feature_3_desc', 'Accessible worldwide with decentralized infrastructure')
                    ),
                    array(
                        'icon' => '📈',
                        'title' => get_theme_mod('wealthbag_feature_4_title', 'Profitable'),
                        'description' => get_theme_mod('wealthbag_feature_4_desc', 'Innovative tokenomics designed for sustainable growth and rewards')
                    )
                );
                
                foreach ($features as $feature) :
                    if ($feature['title']) :
                ?>
                    <div class="feature-card">
                        <div class="feature-icon"><?php echo esc_html($feature['icon']); ?></div>
                        <h3><?php echo esc_html($feature['title']); ?></h3>
                        <p><?php echo esc_html($feature['description']); ?></p>
                    </div>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Tokenomics Section -->
    <section id="tokenomics" class="tokenomics-section">
        <div class="container">
            <h2 class="section-title">
                <?php echo esc_html(get_theme_mod('wealthbag_tokenomics_title', 'Tokenomics')); ?>
            </h2>
            <div class="tokenomics-grid">
                <div class="tokenomics-chart">
                    <div class="chart-placeholder">
                        <div class="chart-slice slice-1" style="--percentage: 40"></div>
                        <div class="chart-slice slice-2" style="--percentage: 30"></div>
                        <div class="chart-slice slice-3" style="--percentage: 20"></div>
                        <div class="chart-slice slice-4" style="--percentage: 10"></div>
                    </div>
                </div>
                <div class="tokenomics-info">
                    <?php
                    $tokenomics = array(
                        array(
                            'color' => 'color-1',
                            'label' => get_theme_mod('wealthbag_token_1_label', 'Liquidity Pool (40%)')
                        ),
                        array(
                            'color' => 'color-2',
                            'label' => get_theme_mod('wealthbag_token_2_label', 'Community Rewards (30%)')
                        ),
                        array(
                            'color' => 'color-3',
                            'label' => get_theme_mod('wealthbag_token_3_label', 'Development (20%)')
                        ),
                        array(
                            'color' => 'color-4',
                            'label' => get_theme_mod('wealthbag_token_4_label', 'Marketing (10%)')
                        )
                    );
                    
                    foreach ($tokenomics as $token) :
                        if ($token['label']) :
                    ?>
                        <div class="token-detail">
                            <div class="token-color <?php echo esc_attr($token['color']); ?>"></div>
                            <span><?php echo esc_html($token['label']); ?></span>
                        </div>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">
                <?php echo esc_html(get_theme_mod('wealthbag_contact_title', 'Join Our Community')); ?>
            </h2>
            <div class="social-links">
                <?php
                $social_links = array(
                    'telegram' => array(
                        'url' => get_theme_mod('wealthbag_telegram_url', '#'),
                        'icon' => '<path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>',
                        'label' => 'Telegram'
                    ),
                    'twitter' => array(
                        'url' => get_theme_mod('wealthbag_twitter_url', 'https://x.com/RealWealthBag'),
                        'icon' => '<path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>',
                        'label' => 'Twitter'
                    ),
                    'discord' => array(
                        'url' => get_theme_mod('wealthbag_discord_url', 'https://discord.com/channels/@me'),
                        'icon' => '<path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.30zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>',
                        'label' => 'Discord'
                    ),
                    'youtube' => array(
                        'url' => get_theme_mod('wealthbag_youtube_url', '#'),
                        'icon' => '<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>',
                        'label' => 'YouTube'
                    )
                );
                
                foreach ($social_links as $social => $data) :
                    if ($data['url'] && $data['url'] !== '#') :
                ?>
                    <a href="<?php echo esc_url($data['url']); ?>" target="_blank" rel="noopener noreferrer" class="social-link">
                        <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                            <?php echo $data['icon']; ?>
                        </svg>
                        <span><?php echo esc_html($data['label']); ?></span>
                    </a>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
        </div>
    </section>

<?php else : ?>
    <!-- Regular page/post content -->
    <main id="primary" class="site-main">
        <div class="container">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                
                the_posts_navigation();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </main>
<?php endif; ?>

<?php
get_footer();
?>