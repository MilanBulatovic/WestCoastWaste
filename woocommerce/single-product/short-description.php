<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>



	<!-- Product List Bullets -->
	<div class="product-list">
		<?php the_field ('list'); ?></li>
	</div>


	<?php
	//Full Description
	$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
	?>

	<?php if ( $heading ) : ?>
		<h2><?php the_field ('full_description_title'); ?></h2>
	<?php endif; ?>

	<?php the_field ('full_description_text');
	$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );


	//Short Description
	if ( ! $short_description ) {
		return;
	}
	?>

	<div class="woocommerce-product-details__short-description">
		<h2><?php echo esc_html( $heading ); ?></h2>
		<?php echo $short_description; // WPCS: XSS ok. ?>
	</div>
