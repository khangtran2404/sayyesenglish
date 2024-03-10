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
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Oswald:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>
	<header id="masthead" class="header-volcano">
        <div id="ajax-url" data-id="<?= admin_url('admin-ajax.php') ?>" class="hidden"></div>
		<div class="container">
			<div class="group-content-header">
				<div class="site-logo">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						?>
							<a href="<?= get_home_url(); ?>" class="logo-text" rel="home" aria-current="page">
								<?php echo esc_html(get_bloginfo( 'name' )); ?>
							</a>
						<?php
					}
					?>
				</div>
				<div class="site-navigation">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="navigation" class="navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu_class'      => 'nav-menu-volcano',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					<?php endif; ?>
					<!-- language switcher -->
					<div class="language-switcher-arae">
						<?php 
							if ( is_active_sidebar( 'widget-switcher-area' )) :
								dynamic_sidebar( 'widget-switcher-area' );
							endif; 
						?>
					</div>
				</div>
				
				<!-- Button Hamburger -->
				<div class="btn-hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</header>
	<div class="navigation-mobile-volcano">
		<div class="container">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="navigation" class="navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_class'      => 'nav-menu-volcano',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
			<!-- language switcher -->
			<div class="language-switcher-arae">
				<?php 
					if ( is_active_sidebar( 'widget-switcher-area' )) :
						dynamic_sidebar( 'widget-switcher-area' );
					endif; 
				?>
			</div>
		</div>
	</div>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">