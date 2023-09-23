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

function wpse_add_admin_button_to_menu($items, $args)
{
    // Vérification que l'utilisateur est connecté
    if (is_user_logged_in() && $args->theme_location == 'header') {
        // Ajout du bouton "Admin"
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a class="hfe-menu-item" href="' . get_admin_url() . '">Admin</a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'wpse_add_admin_button_to_menu', 10, 2);

function prefix_add_menu_item($items, $args)
{
    $items_array = explode('</li>', $items);
    array_splice($items_array, 1, 0, '<li class="menu-item"><a href="' . get_admin_url() . '">Admin</a></li>'); // Ajouter un élément personnalisé après le 1er élément

    $items = implode('</li>', $items_array);

    return $items;
}
add_filter('wp_nav_menu', 'prefix_add_menu_item', 10, 2);
