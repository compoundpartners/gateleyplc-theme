jQuery(document).ready(function($){
  $('.nextcharacter a').each(function(){
	  $(this).click(function(e){
		  var whichchar = $(this).data('char');
    e.preventDefault();
    $.post(ajaxurl,{action:'gateley_pagination_loop'}, function(whichchar, data){
      $('#content-inner').fadeOut(250).empty().append( data ).fadeIn(250);
    });
  });
    });
});