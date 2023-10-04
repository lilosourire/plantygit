<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<footer id="colophon" class="site-footer">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'container'      => false,
			'menu_class'     => 'cssFooter',
		)
	);
	?>
</footer><!-- #colophon -->
<?php
function display_theme_locations()
{
	$theme_locations = get_nav_menu_locations();

	// Afficher les emplacements des menus
	foreach ($theme_locations as $location => $menu_id) {
		echo 'Emplacement : ' . $location . '<br>';
	}
} ?>
</div><!-- #page -->
</body>

</html>