<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package easyjazzradio
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'easyjazzradio' ); ?></a>

	<header class="w-full py-4 bg-blue justify-between flex px-8 items-center">

		<a href="/">
			<img class="h-6 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/easy-jazz-radio-logo.png" alt="">
		</a>

		<div class="flex">
			<nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>
			<a href="https://live365.com/embed/popout.html?station=a17629&s=xl&m=light" target="popup" onclick="window.open('https://live365.com/embed/popout.html?station=a17629&s=xl&m=light','popup','width=783,height=296'); return false;" class="button button-border hidden md:inline-block">Open Player</a>
		</div>
	</header>
