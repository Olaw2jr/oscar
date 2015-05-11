// jshint ignore: start
/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  //Start of my custom scripts

    $(document).ready(function() {
    
    /*============================================
    Page Preloader
    ==============================================*/
    
    $(window).load(function(){
      $('#page-loader').fadeOut(500);
    }); 
    
    /*============================================
    Parallax Backgrounds
    ==============================================*/
    $('.parallax-bg').each(function(){
      var bg = $(this).data('parallax-background');
      $(this).css({'background-image':'url('+bg+')'});
      
    });
    
    if((!Modernizr.touch) && ( $(window).width() > 1024) ){
      $(window).stellar({
        horizontalScrolling: false,
        responsive:true
      });
    }
    
    /*============================================
    Inner Page Header Animation
    ==============================================*/
    $(window).scroll( function() {
      var st = $(this).scrollTop();
      $('.no-touch #inner-page-header .header-content').css({ 'opacity' : (1 - st/350) , 'transform':'translateY('+st/3+'px)'});
    });
    
    /*============================================
    ScrollTo Links
    ==============================================*/
    $('a.scrollto').click(function(e){
      $('html,body').scrollTo(this.hash, this.hash, {gap: {y: this.hash=='#contact'? -65 : 0} ,animation:  {easing: 'easeInOutCubic', duration: 1000}});
      e.preventDefault();

      if ($('.navbar-collapse').hasClass('in')){
        $('.navbar-collapse').removeClass('in').addClass('collapse');
      }
    });
    
    $('#main-nav').waypoint('sticky');
   
    /*============================================
    Tooltips
    ==============================================*/
    $("[data-toggle='tooltip']").tooltip();
    
    /*============================================
    Placeholder Detection
    ==============================================*/
    if (!Modernizr.input.placeholder) {
      $('html').addClass('no-placeholder');
    }

    /*============================================
    Scrolling Animations
    ==============================================*/
    $('.scrollimation').waypoint(function(){
      $(this).addClass('in');
    },{offset:'80%'});
    
    /*============================================
    Refresh scrollSpy function
    ==============================================*/
    function scrollSpyRefresh(){
      setTimeout(function(){
        $('body').scrollspy('refresh');
      },1000);
      
    }

    /*============================================
    Refresh waypoints function
    ==============================================*/
    function waypointsRefresh(){
      setTimeout(function(){
        $.waypoints('refresh');
      },1000);
    }
    
    /*============================================
    Refresh Parallax Backgrounds
    ==============================================*/
    function stellarRefresh(){
      setTimeout(function(){
        $(window).stellar('refresh');
      },1000);
    }
    
    /*============================================
    Fit 2nd level dropdown
    ==============================================*/
    function fitDropdown(){
      if($('.dropdown .dropdown').length){
        var od = $('.dropdown .dropdown').offset().left,
          w = $(window).width(),
          wd1 = $('.dropdown-menu .dropdown-menu').parents('.dropdown-menu').width(),
          wd2 = $('.dropdown-menu .dropdown-menu').width();
          
        if(wd2 > w-od-wd1){
          $('.dropdown .dropdown').addClass('left-side');
        }else{
          $('.dropdown .dropdown').removeClass('left-side');
        }
      }
    }
    
    fitDropdown();
    
    $('.dropdown > a').click(function(e){
      if($('html').is('.touch') || ($(window).width()<768)){
        e.preventDefault();
        
        var $dm = $(this).next('.dropdown-menu');
        
        if($dm.is('.dropdown-open')){
          $dm.slideUp();
        }else{
          $dm.slideDown();
        }
        
        $dm.toggleClass('dropdown-open');
      }
    })
    
  }); 

  //End of custom scripts

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
