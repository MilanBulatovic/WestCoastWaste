<?php
/**
 * The template for displaying search forms
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	
	<!-- <div class="input-group"> -->
		
		<input class="menu-search" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
		
		<button class="menu-btn" id="searchsubmit" name="submit" type="submit" onclick="submitButtonClick()"
		value="<?php esc_attr_e( 'Submit', 'understrap' ); ?>"><i class="fa fa-search"></i></button>
		
	<!-- </div> -->

</form>
