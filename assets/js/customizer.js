/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function( $ ) {
	"use strict";

	wp.customize( 'gateley_plc_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'color', to );
		} );
	});
	
	wp.customize( 'tcx_display_header', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '#header' ).hide() : $( '#header' ).show();
    } );
	} );
	
		wp.customize( 'footer_cols_count', function( value ) {
    value.bind( function( to ) {
        console.log(to);
    } );
	} );
	
	

})( jQuery );
