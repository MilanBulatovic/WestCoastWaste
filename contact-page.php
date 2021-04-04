<?php
/**
 * Template Name: Contact Us Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="row">
			<div class="col-lg-6">
                <div class="left-side-wrapper">
                    <h3><?php the_field('entry') ?></h3>
                    <div class="contact-info">
                        <div class="email"><a href="mailto: milanbulatovic@outlook.com"><i class="fa fa-envelope"></i>milanbulatovic@outlook.com</a></div>
                        <div class="number"><a href="tel:123-456-7890"><i class="fa fa-phone"></i>+123-456-7890</a></div>
                        <div class="location"><a href="tel:123-456-7890"><i class="fa fa-map-marker"></i>Adress, Suburb, State, Zip Sode</a></div>
                    </div>
                    <div class="form">
                        <h4>Please send us a message and we will get back to you asap</h4>
                        <?php echo do_shortcode( '[contact-form-7 id="190" title="Contact form 1"]' ); ?>
                    </div>
                </div>
			</div>

			<div class="col-lg-6">
                <div class="iframe-wrapper">
                    <div class="map1">
                        <?php the_field('enter_1') ?>
                    </div>
                    <div class="map1">
                        <?php the_field('enter_2') ?>
                    </div>
                    <div class="map1">
                        <?php the_field('enter_3') ?>
                    </div>
                </div>
			</div><!-- end of column -->
		</div><!-- end of row -->
	</div><!-- #container -->
</div><!-- #page-wrapper -->

<?php
get_footer('contact');
