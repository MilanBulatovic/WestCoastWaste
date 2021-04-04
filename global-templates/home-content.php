<?php
/**
 * Template Name: Home Content
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="wrapper" id="home-content">   

<!-- Promotion -->
    <section id="promotion">
        <div class="container opacity-holder">     
            <div class="opacity-bg"></div>         
            <div class="promotion-holder disp-fl">
                <div class="promotion-offer-circle">
                    <p class="letters">save</p>
                    <span class="numbers">20%</span>
                </div>
                <div class="promotion-block-text">
                    <h2>15 Day Special on 9m3 Skip Bins</h2>
                    <h5 class="bin-sevices">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis natus magnam doloremque voluptatibus, nesciunt pariatur velit quidem maiores ratione molestiae.</h5>
                    <a href="<?php echo get_permalink( woocommerce_get_page_id('shop') ); ?>" class="find-out-more">Find out more</a>
                </div>
            </div>
        </div>
    </section>

   <!-- Skip Bins -->
    <section id="skip-bins">
        <div class="container">
            <div class="headline"><i class="fa fa-arrow-circle-down"></i>Select the right skip bin for your project</div>
            
            <?php
            $params = array(
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'orderby'        => 'title', 
                'order'          => 'DESC',
            );
            
            $index = 0;
            $wc_query = new WP_Query($params);
            ?>

            <?php if ($wc_query->have_posts()) : ?>
            <?php while ($wc_query->have_posts()) :

                $wc_query->the_post(); global $product; 
                $index++;
            ?>


            <div class="skip-bins-holder">
                <div class="row">                  
                    <div class="col-lg-8 col-md-6 d-flex md-row">
                        <div class="half-size">
                            <?php 
                                if ( has_post_thumbnail() ) : 
                                    the_post_thumbnail();
                                else : 
                                    echo "<img src='" . get_template_directory_uri() . "./img/6m3-Skip-Bin.png' alt='Placeholder image'>"; 
                                endif; 
                            ?>
	                    </div>

                        <div class="list-holder d-flex flex-column">
                            <h3><a class= "skip-bin-title" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <?php the_field('list'); ?>
                        </div>

                    </div><!-- end of Column -->

                    <div class="col-lg-4 col-md-6 d-flex align-items-center justify-content-around center-end md-row sm-row">
                        <div class="trailer">
                            Approx x 4 <br>trailers
                            <img src="<?php echo get_template_directory_uri(); ?>/img/trailer.png" alt="">
                        </div>
                        <div class="bin-wheelie">
                            Approx x 16 <br> wheelie bins
                            <img src="<?php echo get_template_directory_uri(); ?>/img/home-bin.png" alt="">
                        </div>
                    </div><!-- end of Column --> 
                </div><!-- end of Row -->   

                <div class="sticky-btn"><a href="<?php the_permalink();?>">Get a quote for this skip bin</a></div>
            </div><!-- end of Skip Bins Holder -->

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </section>

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
