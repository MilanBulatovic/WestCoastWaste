<?php
/**
 * The template for displaying search results pages
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<?php if ( have_posts() ) : ?>
		<header class="page-header">

				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: query term */
						esc_html__( 'Search Results for: %s', 'understrap' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>

		</header><!-- .page-header -->

		<div class="row">
			<div class="col-lg-9">

				<main class="site-main" id="main">
					<div class="row">
						<?php
						while ( have_posts() ) : ?>
							
							<div class="col-lg-6 col-md-6 post-cards">

								<?php the_post();

								/*
								* Run the loop for the search to output the results.
								* If you want to overload this in a child theme then include a file
								* called content-search.php and that will be used instead.
								*/
								get_template_part( 'loop-templates/content', 'search' ); ?>
							</div>
						
							<?php
						endwhile;
						?>
						
						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>
							
						<?php endif; ?>

					</div>
				</main><!-- #main -->

			</div>

			<div class="col-lg-3 d-flex flex-column align-items-end">
				<div class="categorie-holder">
					<h3>Categories</h3>
					<ul class="blog-categories">
						<?php 
							$categories = get_categories();
							foreach ($categories as $category) {
							echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
						}
						?>
					</ul>
				</div>
			</div>

			<div class="paginacija">
				<?php understrap_pagination(); ?>
			</div>
		</div><!-- .row -->
		
	</div><!-- #content -->
	<!-- The pagination component -->
	

</div><!-- #search-wrapper -->

<?php
get_footer();
