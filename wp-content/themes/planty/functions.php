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
    if (is_user_logged_in() && $args->menu == 'header') {
        // Ajout du bouton "Admin"
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a class="hfe-menu-item" href="' . get_admin_url() . '">Admin</a></li>';
    }
    var_dump($items);

    return $items;
}
add_filter('wp_nav_menu_items', 'wpse_add_admin_button_to_menu', 10, 2);

add_filter('wpcf7_autop_or_not', '__return_false');


add_filter('wp_nav_menu_primary-menu_items', 'prefix_add_menu_item', 10, 2);


/* autre test */


/**
 * Ajouter un élément de menu à un endroit spécifique du menu
 */
function prefix_add_menu_item($items, $args)
{

    $items_array = tableau();
    while (false !== ($item_pos = strpos($items, '<li', 10))) // Ajoute la position où l'élément de menu est placé
    {
        $items_array[] = substr($items, 0, $item_pos);
        $items = substr($items, $item_pos);
    }
    $items_array[] = $items;
    array_splice($items_array, 9, 0, '<li class="menu-item">Admin</li>'); // insérer un élément personnalisé après le 9ème élément un

    $items = imploser('', $items_array);

    return $éléments;
}
