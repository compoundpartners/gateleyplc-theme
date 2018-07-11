(function( $ ) {
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.my-color-field').wpColorPicker();
    });
     
})( jQuery );

/*================================================================================================================================================================================================================================================ 

Wordpress Upload

================================================================================================================================================================================================================================================*/
jQuery(document).ready(function(jQuery){
     var custom_uploader;
	jQuery('.nj_image_uploader').each(function() {
	    jQuery(this).find('.upload_image_button').on('click', function(e) {
		   e.preventDefault();
		   //If the uploader object has already been created, reopen the dialog
		   if (custom_uploader) {
			  custom_uploader.open();
			  return;
		   }
		   //Extend the wp.media object
		   custom_uploader = wp.media.frames.file_frame = wp.media({
			  title: 'Choose Image',
			  button: {
				 text: 'Choose Image'
			  },
			  multiple: false
		   });
		   //When a file is selected, grab the URL and set it as the text field's value
		   custom_uploader.on('select', function() {
			  attachment = custom_uploader.state().get('selection').first().toJSON();
				 var el = document.createElement('a');
				el.href = attachment.url;
				el.id = attachment.id;
				var parts = el.pathname.split("/");
				var newurl = el.pathname
				if (parts[1] !== 'wp-content') {
				newurl = newurl.replace("/"+parts[1], "");
				} else {
				var newurl = el.pathname;	
				}	  
				
			 jQuery('.upload_image').val(el.id);
			 jQuery('.nj_image_uploader img').removeClass('hidden');

			 //  jQuery('.upload_image').val(newurl);.attr('src',  attachment.url)
		   });
		   //Open the uploader dialog
		   custom_uploader.open();
	    }); 
	});

});

jQuery(document).ready(function() {
	   jQuery("input[name='_taxonomy']").removeAttr('disabled');

});


/* ADMIN AREA EDIT  */

(function( $ ) {
if($('#adminmenu #menu-posts').length > 1) {
	$('#adminmenu #menu-posts').first().hide();
}

})( jQuery );
