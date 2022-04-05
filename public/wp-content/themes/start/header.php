<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package start
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<header id="masthead" class="site-header">

		<?php
		if( is_front_page() ) :
		?>
			<div class="banner">
				<?php $link = get_field('banner-top', 'option'); ?>
				<?php echo acf_link_parser( $link, 'banner-link' ); ?>
				<span class="banner-close">+</span>
			</div>
		<?php
		endif;
		?>

		<div class="custom-container">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div>
			<nav id="site-navigation" class="main-navigation">
				<a class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">=</a>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<main>
