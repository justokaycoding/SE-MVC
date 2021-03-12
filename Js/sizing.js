(function($) {

  let elements = ['a.productTitle'];

  $(document).ready(function() {
    if (window.matchMedia('(max-width: 767px)').matches) return;
      elements.forEach((item, i) => {
          sizing(item);
      });
  });

  $(window).resize(function(){
      if (window.matchMedia('(max-width: 767px)').matches) return;
      elements.forEach((item, i) => {
          sizing(item);
      });
  });

  function sizing($element){
    var height = 0;
    $($element).css('min-height', 'initial');
    $($element).each(function() {
      if ($(this).outerHeight() > height) {
        height = $(this).outerHeight();
      }
    });

    $($element).css('min-height', height + 'px');
  }

})(jQuery)
