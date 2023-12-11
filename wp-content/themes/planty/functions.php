<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
/* hook du menu */



/* function display_theme_locations()
{
    $theme_locations = get_nav_menu_locations();

    // Afficher les emplacements des menus
    foreach ($theme_locations as $location => $menu_id) {
        echo 'Emplacement : ' . $location . '<br>';
    }
}
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
add_filter('wp_nav_menu', 'prefix_add_menu_item', 10, 2); */



// Le hook pour ajouter le lien admin dans le menu
/* add_filter('wp_nav_menu_items', 'menu_admin', 10, 2);
function menu_admin($menu_items, $args)
{
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in()) {
            $menu_items .= '<li><a href="http://planty.local/admin/">' . __("Admin") . '</a></li>';
        }
    }
    return $menu_items;
}
 */

// Le hook pour ajouter le lien admin dans le menu
/* add_filter('wp_nav_menu_items', 'menu_admin', 10, 2);
function menu_admin($menu_items, $args)
{
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in()) {
            $menu_items .= '<li><a href="' . get_site_url() . '/wp-admin/">' . __("Admin") . '</a></li>';
        }
    }
    return $menu_items;
}
 */

// Le hook pour ajouter le lien admin dans le menu -version définitive -
add_filter('wp_nav_menu_items', 'menu_admin', 10, 2);
function menu_admin($menu_items, $args)
{
    //Créaation d'une nouvelle variable pour le menu
    if ($args->theme_location == 'primary' && is_user_logged_in()) {

        $new_menu_items = "";

        $items_array = explode('</li>', $menu_items);
        foreach ($items_array as $key => $value) {
            if ($key == 0) {
                $new_menu_items .= $value . '<li><a href="' . get_site_url() . '/wp-admin/">' . __("Admin") . '</a></li>';
            } else if ($key == 1) {
                $value = str_replace('<a', '<a style="top: 32px;"', $value);
                $new_menu_items .= $value;
            } else {
                $new_menu_items .= $value;
            }
        }
        return $new_menu_items;
    }

    return $menu_items;
}

/* modification du bouton commander en fonction du statut de l'admin */

function modifier_margin_top_commander()
{
    if (is_user_logged_in()) { // Vérifie si l'utilisateur est connecté
        echo '<style>#menu-item-914 > a:nth-child(1) { margin-top: 32px; }</style>';
    } else {
        echo '<style>#menu-item-914 > a:nth-child(1) { margin-top: 0px; }</style>';
    }
}
add_action('wp_head', 'modifier_margin_top_commander');
