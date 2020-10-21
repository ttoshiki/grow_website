jQuery(document).ready(function(){
  jQuery('.myPage-faqQuestionWrapper').on('click', function() {
    if (!jQuery(this).hasClass("isOpen")) {
      jQuery(this).next().slideToggle()
      jQuery(this).addClass("isOpen");
    } else {
      jQuery(this).next().slideUp();
      jQuery(this).removeClass("isOpen");
    }
    jQuery(".myPage-faqIconVertical", this).toggle();
  })

  jQuery('a[href^="#"]').on('click', function(){
    var speed = 500;
    var href= jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});