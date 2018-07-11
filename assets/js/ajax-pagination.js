jQuery(document).ready(function($){
  $('.nextcharacter a').click(function(e){
    e.preventDefault();
    $.post(ajaxurl,{action:'gateley_pagination_loop'}, function(data){
      $('#content-inner').fadeOut(250).empty().append( data ).fadeIn(250);
    });
  });
});