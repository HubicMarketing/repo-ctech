jQuery(document).ready(function() {

  // PRODOTTO - RICHIESTA INFO CONTACT FORM
  var product_name = jQuery('input[name="product-name"]');
    //if (element !== undefined)
  product_name.val(jQuery('.single-product h1.entry-title').text()).prop('readonly', true);

  var url = window.location.protocol + "//" + window.location.host
  var current_url = window.location.pathname;

  var lastScrollTop = 0;
  jQuery(window).scroll(function(event){
     var st = jQuery(this).scrollTop();
     if (st > lastScrollTop){
         // downscroll code
       jQuery('#site-header').addClass('bg_white');
       jQuery('.contattaci').addClass('visible');
     } else {
        // upscroll code
        jQuery('#site-header').removeClass('bg_white');
        jQuery('.contattaci').removeClass('visible');
     }
     lastScrollTop = st;
  });

  jQuery("a[href='#form']").click(function(){
    var origin = jQuery(this).attr('href');
    var calcOffset = jQuery(''+origin+'').offset().top -80;
    event.preventDefault();
    // console.log(calcOffset)
     jQuery("html, body").animate({ scrollTop: calcOffset }, 600);
  });

});
