<?php
/**
 * Hero setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<section id="hero">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7 col-md-12">
				<div class="skip-bin-instant-quote-holder">
					<div class="skip-bin-instant-quote">
						<i class="fa fa-arrow-circle-right"><span>Skip bin instant quote</span></i>
					</div>
					<div class="description">
						<h6>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse aspernatur iste sit cumque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse aspernatur iste sit cumque.
						</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-5 text-right vp_hidden">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bin.png" alt="bin">
			</div>
		</div>
		<div class="row align-items-center mg-top">
			<div class="col-sm-12">
				<div class="image-holder">		
					<?php echo do_shortcode('[wonderplugin_slider id=1]'); ?>	
				</div>	
			</div>
		</div>	
    </div><!-- #container --> 
	
</section>

