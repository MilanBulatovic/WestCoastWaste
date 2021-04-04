<?php
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


/*Product description included*/
function excerpt_in_cart($cart_item_html, $product_data) {
global $_product;

$excerpt = get_the_excerpt($product_data['product_id']);
$excerpt = substr($excerpt, 0, 80);

echo $cart_item_html . '<br><p class="shortDescription">' . $excerpt . '...' . '</p>';
}

add_filter('woocommerce_cart_item_name', 'excerpt_in_cart', 40, 2);


// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Order this skip bin', 'woocommerce' ); 
}


add_action( 'woocommerce_after_shop_loop_item_title', 'bbloomer_ins_woocommerce_product_excerpt', 35, 2 );
 
function bbloomer_ins_woocommerce_product_excerpt() {
     the_excerpt();
}

 /**
 Remove all possible fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    unset( $fields['billing']['billing_company'] );
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    //unset( $fields['billing']['billing_state'] );
    //unset( $fields['billing']['billing_first_name'] );
    unset( $fields['billing']['billing_last_name'] );
    //unset( $fields['billing']['billing_address_1'] );
    //unset( $fields['billing']['billing_address_2'] );
    //unset( $fields['billing']['billing_city'] );
    //unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    //unset( $fields['shipping']['shipping_company'] );
    //unset( $fields['shipping']['shipping_phone'] );
    //unset( $fields['shipping']['shipping_state'] );
    //unset( $fields['shipping']['shipping_first_name'] );
    //unset( $fields['shipping']['shipping_last_name'] );
    //unset( $fields['shipping']['shipping_address_1'] );
    //unset( $fields['shipping']['shipping_address_2'] );
    //unset( $fields['shipping']['shipping_city'] );
    //unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    //unset( $fields['order']['order_comments'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields) {

 unset($fields['billing']['billing_address_2']);
 //$fields['billing']['billing_company']['placeholder'] = 'Business Name';
 //$fields['billing']['billing_company']['label'] = 'Business Name';
 //$fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
 //$fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
 //$fields['shipping']['shipping_company']['placeholder'] = 'Company Name'; 
 //$fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
 //$fields['billing']['billing_email']['placeholder'] = 'Email Address ';
 //$fields['billing']['billing_phone']['placeholder'] = 'Phone ';
 $fields['billing']['billing_first_name']['placeholder'] = 'Your Name';
 $fields['billing']['billing_first_name']['label'] = 'Full Name'; 

 return $fields;
 }

 /**
 * @snippet       WooCommerce Show Product Image @ Thankyou Page
 * @author        Sandesh Jangam
 * @donate $9     https://www.paypal.me/SandeshJangam/9
 */
 
add_filter( 'woocommerce_order_item_name', 'ts_product_image_on_thankyou', 10, 3 );
  
function ts_product_image_on_thankyou( $name, $item, $visible ) {
 
    /* Return if not thankyou/order-received page */
    if ( ! is_order_received_page() ) {
        return $name;
    }
     
    /* Get product id */
    $product_id = $item->get_product_id();
      
    /* Get product object */
    $_product = wc_get_product( $product_id );
  
    /* Get product thumbnail */
    $thumbnail = $_product->get_image();
  
    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 
  
    /* Prepend image to name and return it */
    return $image . $name;
}

/**
 * @snippet       WooCommerce Show Product Image @ Checkout Page
 * @author        Sandesh Jangam
 * @donate $9     https://www.paypal.me/SandeshJangam/9
 */
 

 //Ading Product thumbnail on Search page
add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );
 
function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
     
    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }
     
    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
 
    /* Get product thumbnail */
    $thumbnail = $_product->get_image();
 
    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 
 
    /* Prepend image to name and return it */
    return $image . $name;
}

add_filter('carousel_slider_load_scripts', function () {
    return true;
}, 9999);

//adding Category Thumbnail Support
add_theme_support('category-thumbnails');
