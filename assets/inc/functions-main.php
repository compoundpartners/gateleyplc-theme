<?php /**
 * Load Post Types
 */
		require get_template_directory() . '/assets/inc/post_types/post-types.php';

/**
 * Load Custom Fields
 */
		require get_template_directory() . '/assets/inc/fields/custom-field.php';
/**
 * Load taxonomies
 */
require get_template_directory() . '/assets/inc/taxonomies/taxonomies.php';		


/**
 * Load Taxonomy Pagination
 */
require get_template_directory() . '/assets/inc/pagination/taxonomy-pagination.php';		
/**
 * Load taxonomies
 */
//require get_template_directory() . '/assets/inc/admin/user-upload-files.php';		
/**
 * Load Taxonomy Pagination
 */
require get_template_directory() . '/assets/inc/general-functions/get-network-posts.php';	


/*
WOOCOMMERCE
*/



// rename the coupon field on the cart page
function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {

	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

	if ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}

	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );

// rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout() {

	return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );

// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {

	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

	if ( 'Coupon code' === $text ) {
		$translated_text = 'Promo Code';
	
	} elseif ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}

	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

	/*  ==========================================================================
		ACF OPTIONS PAGES
		========================================================================== */
		
		if (function_exists('acf_add_options_page')) {
			acf_add_options_page(array(
				'page_title' 	=> 'Advertising',
				'menu_title'	=> 'Advertising Settings',
				'menu_slug' 	=> 'advertising-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}