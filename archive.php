<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		
		<header class="entry-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->
		
		<div class="row">
			<div class="col-lg-8">

				<main class="site-main" id="main">
					
					<?php
					if ( have_posts() ) { 
					?>

						<div class="row post-card-holder">
							
							<?php // Start the loop.
							while ( have_posts() ) {
							?>

							<div class="col-lg-6 col-md-6 post-cards">
								<?php 
									the_post();
									get_template_part( 'loop-templates/content', get_post_format() ); 
								?>
							</div>
							
							<?php
								}
							}
							else {
								get_template_part( 'loop-templates/content', 'none' );
								}
							?>
						</div>
		
				</main><!-- #main -->

				<div class="blog-pagination"><?php understrap_pagination(); ?></div>
			
			</div><!-- .column -->

			<div class="col-lg-4 centering d-flex justify-content-end">
				<div class="categorie-holder d-flex flex-column align-content-end">
					<h3>Categories</h3>

					<?php 
						$taxonomy = 'category';
						$args = array(
							'orderby'           => 'name', 
							'order'             => 'ASC',
							'slug'              => '',
							'hide_empty'        => true,
							'with_thumbnail' => true,
							
					
						);
						$terms = get_terms($taxonomy, $args);
					

						//Displaying Thumbnails
					
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							echo '<ul class = "blog-categories">';
								foreach ( $terms as $term ) {
									echo '<li class="category-li"><a href="/index.php/' . $taxonomy . '/' . $term->slug . '" class="cat-link">' . $term->name . '</a></li>';
							}
							echo '</ul>';
						}
					?>

					
							<!-- //$categories = get_categories();
							//foreach ($categories as $category) {
							//echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
							//} -->
						
				</div>
			</div><!-- .column -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php
get_footer();