<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
/* hook du menu */


/* function is_user_logged_in()
{
    $user = wp_get_current_user();

    return $user->exists();
}
 */


/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 */
/*  1=filtre menu et lien*/
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
/* 2=fonction + appel des éléments de l'array (ajoutter des éléments dans mon menu?) */
function add_admin_link($items, $args)
{
    var_dump(is_user_logged_in());

    /* si mon user est connecté (cf fontion) -is_user_logged_in() : booléen-*/
    if (/* $args->theme_location == 'header' && */is_user_logged_in()) {
        /* j'ajoute mon "li" au menu */
        $items = $items . '<li><a title="H" href="' . admin_url() . '">admin</a></li>';
    }
    /* else? =echo menu ordinaire? */
    return $items;
}
