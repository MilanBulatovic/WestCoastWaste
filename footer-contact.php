<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
	?>

		<footer id="footer-review-form">
			
			<!-- Following Waste -->
			<section class="following-waste">
				<div class="container">
					<div class="row content-holder">
						<div class="col-lg-6">
							<div class="wafw">We accept the following waste</div>
						</div>
						<div class="col-lg-6 d-flex align-items-center justify-content-end">
							<?php 
								$category_id = get_cat_ID( 'Blog' );
								$category_link = get_category_link( $category_id );
							?>
							<a href="<?php echo $category_link ?>">Read the full list of acceptable waste</a>
							
						</div>     
					</div>
					
					<div class="row d-flex flex-wrap justify-content-center">
						
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
								echo '<ul class = "categories-list">';
									foreach ( $terms as $term ) {
										echo '<li class="category-li"><a href="/index.php/' . $taxonomy . '/' . $term->slug . '" class="cat-link">' .
										get_term_thumbnail( $term->term_taxonomy_id, $size = 'category-thumb', $attr = '' ) . $term->name . '</a></li>';
								}
								echo '</ul>';
							}
						?>
							
						<a class="md-visible" href="#">Read the full list of acceptable waste</a>
					</div>
				</div>
			</section>	

			<div class="container">
				<!-- Reviews -->
				<section class="reviews">
					<div class="row d-flex flex-column align-items-center">
						<div class="testimonial-holder d-flex align-items-center">

							<?php
								$args = array(
								'post_type'   => 'testimonials',
								'post_status' => 'publish',
								'posts_per_page' => 1,
								'order' => 'DESC',
								'orderby'=> 'rand',
								);
								$query = new WP_Query( $args );
									//if( $query->have_posts() ) :
							?>
								<!-- Displaying testimonials -->
						
							<?php
								while( $query->have_posts() ) : ?>
								<!-- <div class="col-lg-4"> -->
									<div class="content-holder">
										<?php $query->the_post(); ?>

										<div class="stars-holder">
											<?php 
												$star = get_field('stars');
												$count = 0;
												$element = '<i class="fa fa-star"></i>';
												while ($count < $star) : $count++;
													echo $element;
												endwhile;
											?>	
										</div>

										<div class="lead-text d-flex text-center justify-content-center flex-column">
											<?php echo '<p class="lead">' . get_the_content() . '</p>' . '<small>' . '-' . get_the_title() . '</small>'; ?>
										</div>
									</div>
								<!-- </div> -->
								<?php endwhile;
								wp_reset_postdata(); ?>
								
						</div>	
					</div>
				</section>

				<!-- Form  -->
				<section class="form-section text-center">
					<div class="row d-flex justify-content-center">
						<div class="col-sm-12 padding-left">

							<?php
									$title 	 = get_theme_mod('footer_title_field');
									$content = get_theme_mod('footer_content_field');
									$phone 	 = get_theme_mod('footer_phone_field');
									$email 	 = get_theme_mod('footer_email_field');


									if( $title ) :
										echo '<h1>' . $title . '</h1>';
									endif;

									if( $content ) :
										echo '<h5>' . $content . '</h5>';
									endif; 

									if( $phone ) :
										echo '<a href="tel:' .$phone. '"' . '>' . '<h4 class="footer-call">' . 'Call us today' . '</h4>' . '</a>';
									endif;
	
									if( $email ) :
										echo '<a href="mailto:' .$email. '"' . '>' . '<h4 class="footer-email">' . $email . '</h4>' . '</a>';
	
									endif; 
								?>
								
						</div>
					</div>
				</section>

			</div> <!-- end of container -->
			
			<!-- Bottom Footer -->
			<section class="bottom-footer">
				<div class="container d-flex flex-wrap justify-content-start">
					<?php if(get_theme_mod('footer_copyright_field')) : ?>
						<p class="copyright"><?php echo get_theme_mod('footer_copyright_field')?></p>
					<?php endif; ?>
						
					<p class="terms">Terms&Conditions</p>

					<?php if(get_theme_mod('footer_text_field')) : ?>
						<p class="practice"><?php echo get_theme_mod('footer_text_field')?></p>
					<?php endif; ?>
				</div>
			</section>

			
		</footer>

	</div> <!--end of site #page div in the header -->
</body>
</html>