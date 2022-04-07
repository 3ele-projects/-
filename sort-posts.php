<?php

/**
 * Plugin Name:     Sort Posts
 * Plugin URI:      Sort Posts
 * Description:     Delete posts_orderby filter and order Posts by date in Main Query 
 * Author:          Sebastian Weiss
 * Author URI:      https://lightweb-media.de
 * Text Domain:     sort-posts
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sort-posts
 */




function wpse64950_filter_pre_get_posts($query)
{

    if (!is_admin() && $query->is_main_query()) {
        if (is_home()) {
            global $wp_query;
            remove_all_filters('posts_orderby');
            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
    return;
}
add_filter('pre_get_posts', 'wpse64950_filter_pre_get_posts');
