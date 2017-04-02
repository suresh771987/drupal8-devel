(function ($) {
setInterval(function () {
$.post( "http://sureshd88yuuuhapvm.devcloud.acquia-sites.com/devel/block/refresh", function( data ) {
  $( "#block-mycustomblock" ).html( data );
});
}, 10000);

})(jQuery);
