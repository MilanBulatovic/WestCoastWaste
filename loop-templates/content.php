<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article class="card" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?> -->

	<?php 
	if ( has_post_thumbnail() ) :
	?>
		<div class="bg-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'large') ); ?>');">
		</div>
	<?php
	endif;
	?>

	<div class="entry-content">
		<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
		
		 the_excerpt(); ?>

		<div class="link-date">
			<a class="more-link" href="<?php the_permalink();?>"><?php _e('Read More');?></a>
			<div class="date"><i class="fa fa-calendar"></i><?php echo get_the_date('d.m.Y'); ?></div>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
