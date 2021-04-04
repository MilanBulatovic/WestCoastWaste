<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


		
	<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>
	

	<!-- Dimensions Section -->
	<div class="dimensions">Dimensions: <strong><?php the_field('dimensions');?></strong></div>

	<!-- Circles Section -->
	<div class="d-flex wc-product-circles-holder">
		<div class="trailer">
			Approx x 9 <br>trailers
			<img src="<?php echo get_template_directory_uri(); ?>/img/trailer.png" alt="">
		</div>
		<div class="bin-wheelie">
			Approx x 32 <br> wheelie bins
			<img src="<?php echo get_template_directory_uri(); ?>/img/home-bin.png" alt="">
		</div>
	</div>    
