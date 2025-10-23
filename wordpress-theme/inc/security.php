<?php
/**
 * Security enhancements for WealthBag theme
 *
 * @package WealthBag
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Remove WordPress version from head and feeds
 */
function wealthbag_remove_version() {
    return '';
}
add_filter('the_generator', 'wealthbag_remove_version');

/**
 * Hide WordPress version in RSS feeds
 */
add_filter('the_generator', '__return_empty_string');

/**
 * Remove version from scripts and styles
 */
function wealthbag_remove_script_version($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'wealthbag_remove_script_version', 15, 1);
add_filter('style_loader_src', 'wealthbag_remove_script_version', 15, 1);

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove really simple discovery link
 */
remove_action('wp_head', 'rsd_link');

/**
 * Remove wlwmanifest.xml
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Remove shortlink
 */
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Disable REST API for non-authenticated users
 */
function wealthbag_disable_rest_api($access) {
    if (!is_user_logged_in()) {
        return new WP_Error('rest_disabled', __('REST API disabled for non-authenticated users.', 'wealthbag'), array('status' => 401));
    }
    return $access;
}
add_filter('rest_authentication_errors', 'wealthbag_disable_rest_api');

/**
 * Add security headers
 */
function wealthbag_add_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'wealthbag_add_security_headers');

/**
 * Disable file editing in WordPress admin
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

/**
 * Limit login attempts (basic implementation)
 */
function wealthbag_check_login_attempts($user, $username, $password) {
    if (is_wp_error($user)) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $attempts = get_transient('wealthbag_login_attempts_' . $ip);
        $attempts = $attempts ? $attempts : 0;
        $attempts++;
        
        if ($attempts >= 5) {
            wp_die(__('Too many failed login attempts. Please try again later.', 'wealthbag'));
        }
        
        set_transient('wealthbag_login_attempts_' . $ip, $attempts, 15 * MINUTE_IN_SECONDS);
    } else {
        // Reset attempts on successful login
        $ip = $_SERVER['REMOTE_ADDR'];
        delete_transient('wealthbag_login_attempts_' . $ip);
    }
    
    return $user;
}
add_filter('authenticate', 'wealthbag_check_login_attempts', 30, 3);

/**
 * Hide login errors
 */
function wealthbag_hide_login_errors() {
    return __('Something is wrong!', 'wealthbag');
}
add_filter('login_errors', 'wealthbag_hide_login_errors');