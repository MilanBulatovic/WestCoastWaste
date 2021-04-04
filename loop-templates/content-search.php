<?php
/**
 * Search results partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="title-entry"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php
		$price = get_post_meta( get_the_ID(), '_price', true );
		$product = wc_get_product( get_the_ID() );
		
			// check if the post has Thumbnail
			if ( has_post_thumbnail() ) : ?>

				<div class="entry-meta">
					<?php the_post_thumbnail('large'); ?>
				</div><!-- .entry-meta -->
				<?php if ( $product ) : // check if it is a product
					echo wc_price( $price );
				endif;
				?>
				<?php else : 
					echo '<img src="' . get_template_directory_uri() . '/img/6m3-Skip-Bin.png" alt="Placeholder image">'; //if there is no thumbnail, it shows placeholder image
					echo wc_price( $price );

			 endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php understrap_entry_footer(); ?>
		<div class="posted-on">
			<?php understrap_posted_on(); ?>
		</div>
	</footer><!-- .entry-footer -->


</article><!-- #post-## -->
