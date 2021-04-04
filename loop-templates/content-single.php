<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?> -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<!-- <div class="entry-meta"> -->
	<!-- <?php understrap_posted_on(); ?> -->
<!--</div><!-- .entry-meta -->
