var jQuery = jQuery.noConflict();

jQuery(document).ready(function(){

    // Smooth scroll links on specific anchors
    jQuery(function() {
        jQuery('a[href*="#modules"], a[href*="#something"]').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    jQuery('html, body').animate({
                        scrollTop: target.offset().top -10
                    }, 1000);
                    return false;
                }
            }
        });
    });

    // Equal height columns
    jQuery(document).ready(function(){

        jQuery('.equal-height-wrapper').each(function(){
            var highestBox = 0;

            jQuery(this).find('.equal-height > .vc_column-inner').each(function(){
                if(jQuery(this).height() > highestBox){
                    highestBox = jQuery(this).height();
                }
            });

            jQuery(this).find('.equal-height > .vc_column-inner').height(highestBox);
        });

    });

    // タブレットの時はPC版縮小表示
    let ua = navigator.userAgent;
    if((ua.indexOf('iPhone') > 0) || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)){
        jQuery('head').prepend('<meta name="viewport" content="width=device-width,initial-scale=1">');
    } else {
        jQuery('head').prepend('<meta name="viewport" content="width=1440">');
    }

});