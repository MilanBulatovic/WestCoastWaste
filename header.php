<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<?php
			$topHeaderImage = get_theme_mod('top_header_image'); //Top Header Image

			if( !empty($topHeaderImage) ) : ?>
				<div class="top-header" id="proba" style="background-image: url('<?php echo esc_url( $topHeaderImage )?>');">
				<?php 
					else : echo '<div class="top-header">You should upload an image';
					endif; 
				?>

			<div class="container id="navbarNavDropdown" class="collapse navbar-collapse">
				<div class="row align-items-center">				
					<div class="col-lg-6 col-md-6 margin-down">

						<?php 
							if (function_exists('the_custom_logo')) {
								the_custom_logo();
							}					
						?>

					</div>
					<div class="col-lg-6 col-md-6 vp_centering">
						<div class="numberEmail">
							<a href="tel:+38267014244"><i class="fa fa-phone">+38267000000</i></a>
							<a href="mailto:milanbulatovic@outlook.com" class="emailNone"><i class="fa fa-envelope">milanbulatovic@outlook.com</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav id="main-nav" class="navbar navbar-expand-md" aria-labelledby="main-nav-label">

			<div class="container md-pd">
			
				<div class="test">
					<?php get_search_form(); ?>
				</div>
			
				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'dropdown-m',
						'container_id'    => 'dropdown-menu',
						'menu_class'      => 'drop-list',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
				<div class="navbar-toggler-button">
					<i class="fa fa-bars"></i>
				</div>

			</div>
		</nav><!-- .site-navigation -->		
	</div><!-- #wrapper-navbar end -->
