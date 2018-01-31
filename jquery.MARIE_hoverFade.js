(function ($) {
  $.fn.MARIE_hoverFade=function (options) {
      var def= {
          "vfadeout":"slow",
          "vfadein":"fast"
      };
      var sa=$(this).html();
      var par=$.extend(def,options);
      return this.each(function () {
         $(this).mousemove(function () {
             $(this).fadeOut(par.vfadeout,function () {
                 $(this).fadeIn(par.vfadein,function () {
                     $(this).slideUp(par.vfadein,function () {
                         $(this).text(sa +',Enjoy your visit!');
                         $(this).slideDown(par.vfadeout,function () {
                             $(this).slideToggle(par.vfadein,function () {
                                 $(this).fadeIn(par.vfadein);
                             });
                         })
                     });
                 });
             });
         });
      });
  };
})(jQuery);