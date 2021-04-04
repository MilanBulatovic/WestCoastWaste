<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

	<div class="feature-image" 
		<?php if ( has_post_thumbnail() ) : ?>
			style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<?php endif; ?>

		<div class="container">
			<div class="entry-title">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div><!-- .entry-title -->
		</div>
	</div><!-- .feature-image -->

	<div class="date-category">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<i class="fa fa-calendar"></i><?php echo get_the_date( 'd.m.Y')?>
				</div>
				<div class="col-lg-10">
					<i class="fa fa-bars"></i>Posted in: <?php the_category(', '); ?>
				</div>
			</div>
		</div>
	</div><!-- .date-category -->

	<div class="wrapper" id="single-wrapper">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">	
			<div class="row">
				<div class="col-lg-8">
					<main class="site-main" id="main">

						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'single' );
						}
						?>
						<?php understrap_post_nav(); ?>
					</main><!-- #main -->
				</div>

				<div class="col-lg-4 center-md d-flex flex-column">
					<div class="blog-cat-holder">
						<h3>Categories</h3>
						<ul class="blog-categories">
						<?php 
							$categories = get_categories();
							$image = get_field('image', $term);

							foreach ($categories as $category) {
								
							echo '<li class="side-links"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
						}
						?>
						</ul>
					</div>
				</div>
				
			</div><!-- .row -->
		</div><!-- #content -->
	</div><!-- #single-wrapper -->

<?php
get_footer();
