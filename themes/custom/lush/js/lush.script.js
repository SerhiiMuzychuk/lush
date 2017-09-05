
(function ($) {
// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.ss5 = {
  attach: function(context, settings) {
    $("#block-products > ul > li:nth-child(1)").click(function() {
      $('#block-products > ul > li:nth-child(1) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(2)").click(function() {
      $('#block-products > ul > li:nth-child(2) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(3)").click(function() {
      $('#block-products > ul > li:nth-child(3) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(4)").click(function() {
      $('#block-products > ul > li:nth-child(4) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(5)").click(function() {
      $('#block-products > ul > li:nth-child(5) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(6)").click(function() {
      $('#block-products > ul > li:nth-child(6) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(7)").click(function() {
      $('#block-products > ul > li:nth-child(7) > ul > li').toggleClass('active');
      return false;
    });
    $("#block-products > ul > li:nth-child(8)").click(function() {
      $('#block-products > ul > li:nth-child(8) > ul > li').toggleClass('active');
      return false;
    });

    //  $("#block-products > ul > li").click(function() {
    //  return false;
    // });

    // $('.header-sub-menus #block-products > ul > li').click(function() {
    //       $('.header-sub-menus #block-products > ul > li ul li').addClass("active");          
    // });

    $('.products').click(function() {
      $('.header-sub-menu-products').toggleClass("active");
      $('.header-sub-menu-search').removeClass('active');          
    });

    $('.header-search > a').click(function() {
      $('.header-sub-menu-search').toggleClass("active");          
    });

    $('.search-close').click(function() {
      $('.header-sub-menu-search').removeClass("active");          
    });

   

    $('.header-products > a').click(function() {
      $('.header-sub-menu-products').toggleClass("open");
      $('.header-sub-menu-search').removeClass("active");
      $('.leaf.menu-mlid-122256').toggleClass("active");
      $('.sub-menu-mobile .kitchen').toggleClass("active");
      $('.sub-menu-mobile .login').toggleClass("active");
      $('.sub-menu-mobile .login').toggleClass("active");
      $('.sub-menu-mobile > .products > p').removeClass("active");
          
    });

    $('.sub-menu-mobile > .products').click(function() {
      $('.sub-menu-mobile > #block-products').toggleClass("active");
      $('.sub-menu-mobile > .products > p').addClass("active");
      $('.sub-menu-mobile > .products').addClass("open");
      $('.header-sub-menu-products').toggleClass("active");
      $('.sub-menu-mobile .menu-mlid-122256').removeClass("active");
      $('.sub-menu-mobile .kitchen').removeClass("active");
      $('.sub-menu-mobile .login').removeClass("active");
    });

    $('.header-social > .slideout-button').click(function() {
      $('.social-slideout').toggleClass("open");
      $('.header-contents-wrapper').toggleClass("open");
    });

    $('.objects-social-slideout-header').click(function() {
      $('.social-slideout').removeClass("open");
      $('.header-contents-wrapper').removeClass("open");
    });

    $('.header-cart > .slideout-button').click(function() {
      $('.cart-slideout').toggleClass("open");
      $('.header-contents-wrapper').toggleClass("open-cart");
    });

    // $('.objects-social-slideout-header').click(function() {
    //   $('.social-slideout').removeClass("open");
    //   $('.header-contents-wrapper').removeClass("open-cart");
    // });
    
    
}}

})(jQuery); 



(function ($) {
// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.ss4 = {
  attach: function(context, settings) {
   

    $('.sub-menu-mobile .products .open').click(function() {
      $('.sub-menu-mobile > li:nth-child(2)').addClass("active");
      $('.sub-menu-mobile .login').addClass("active");
      $('.sub-menu-mobile .products').removeClass("open");
    }); 
    
}}

})(jQuery); 