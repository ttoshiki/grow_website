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
});