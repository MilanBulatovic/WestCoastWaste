<?php
/**
 * The template for displaying all pages
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
$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );

$container = get_theme_mod( 'understrap_container_type' );

?>
<div class="feature-img-holder">
	<?php 
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
	?>
</div>
<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title internal">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="row">
			<div class="col-lg-7">

				<main class="site-main" id="main">
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
				</main><!-- #main -->

			</div>
			<div class="offset-lg-1 col-lg-4">

				<div class="promotion-holder">
					<div class="circle-holder">
						<div class="promotion-offer-circle">
							<div class="cont-holder">
								<p class="letters">save</p>
								<span class="numbers"><?php the_field('percentage')?></span>
							</div>
						</div>
					</div>
					<div class="promotion-block-text">
						<h2><?php the_field('headline')?></h2>
						<h5 class="bin-services">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis natus magnam doloremque voluptatibus, nesciunt pariatur velit quidem maiores ratione molestiae.</h5>
						<a href="<?php echo $shop_page_url?>" class="find-out-more-invert">Find out more</a>
					</div>
				</div><!-- end of promotion holder -->

			</div><!-- end of column -->
		</div><!-- end of row -->
	</div><!-- #container -->
</div><!-- #page-wrapper -->

<?php
get_footer();
