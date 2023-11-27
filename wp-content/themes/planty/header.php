<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header>
		<div class="SectionHeader">
			<div>
				<?php the_custom_logo(); ?>
			</div>

			<nav class="NavigationMenu">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => 'false',
						'menu_class'     => 'cssHeader',
					)
				);
				?>

				<!-- <div class="SectionCommander">
					<a href="http://planty.local/commander/" class="LienCommander"> Commander </a>
				</div> -->

			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->