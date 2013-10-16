$(function() {
  var $window = $(window);
  /*if (!Modernizr.svg) {
    $('img[src*="svg"]').attr('src', function() {
      return $(this).attr('src').replace('.svg', '@2x.png');
    });
  }*/
  // back to top
  setTimeout(function () {
    $('.bs-sidebar').affix({
      offset: {
        top: function () { return $window.width() <= 980 ? 290 : 390; }
      , bottom: 470
      }
    });
  }, 100);
});
