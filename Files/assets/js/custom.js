/*

Template:  Webster - Responsive Multi-purpose HTML5 Template
Author: potenzaglobalsolutions.com
Design and Developed by: potenzaglobalsolutions.com

NOTE:  

*/


/*================================================
[  Table of contents  ]
================================================

 


======================================
[ End table content ]
======================================*/
//POTENZA var

 
 (function($){
  "use strict";
  var POTENZA = {};

  /*************************
  Predefined Variables
*************************/ 
var $window = $(window),
    $document = $(document),
    $body = $('body'),
    $counter = $('.counter');

    //Check if function exists
    $.fn.exists = function () {
        return this.length > 0;
    };

/*************************
      tooltip
*************************/
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover()
  
  
/*************************
        Preloader
*************************/  
  POTENZA.preloader = function () {
       $("#load").fadeOut();
       $('#pre-loader').delay(0).fadeOut('slow');
   };
  
  /*************************
       owl carousel 
*************************/
    POTENZA.carousel = function () {
      var owlslider = jQuery("div.owl-carousel");
 
           owlslider.each(function () {
              var $this = $(this),
                  $items = ($this.data('items')) ? $this.data('items') : 1,
                  $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                  $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                  $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
                  $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
                  $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                  $space = ($this.attr('data-space')) ? $this.data('space') : 30;    
             
                  $(this).owlCarousel({
                      loop: $loop,
                      items: $items,
                      responsive: {
                        0:{items: $this.data('xx-items') ? $this.data('xx-items') : 1},
                        480:{items: $this.data('xs-items') ? $this.data('xs-items') : 1},
                        768:{items: $this.data('sm-items') ? $this.data('sm-items') : 2},
                        980:{items: $this.data('md-items') ? $this.data('md-items') : 3},
                        1200:{items: $items}
                      },
                      dots: $navdots,
                      autoHeight:$autohgt,
                      margin:$space,
                      nav: $navarrow,
                      navText:["<i class='fa fa-angle-left fa-2x'></i>","<i class='fa fa-angle-right fa-2x'></i>"],
                      autoplay: $autoplay,
                      autoplayHoverPause: true   
                  }); 
           }); 
       
    }
  
 
 /*************************
       counter
*************************/  
 POTENZA.counters = function () {
  var counter = jQuery(".counter");
 
 
        $counter.each(function () {
         var $elem = $(this);                 
           $elem.appear(function () {
             $elem.find('.timer').countTo();
          });                  
        });
   
   
  };
 
/*************************
         Isotope
*************************/
POTENZA.Isotope = function () {
   
      var $isotope = $(".isotope"),
          $itemElement = '.grid-item',
          $filters = $('.isotope-filters');      
        if ($isotope.exists()) {
            $isotope.isotope({
            resizable: true,
            itemSelector: $itemElement,
              masonry: {
                gutterWidth: 10
              }
            });     
       $filters.on( 'click', 'button', function() {
         var $val = $(this).attr('data-filter');
             $isotope.isotope({ filter: $val });       
             $filters.find('.active').removeClass('active');
             $(this).addClass('active');
      });     
    }
     
}
  
/*************************
     Back to top
*************************/
 POTENZA.goToTop = function () {
  var $goToTop = $('#back-to-top');
      $goToTop.hide();
        $window.scroll(function(){
          if ($window.scrollTop()>100) $goToTop.fadeIn();
          else $goToTop.fadeOut();
      });
    $goToTop.on("click", function () {
        $('body,html').animate({scrollTop:0},1000);
        return false;
    });
     $(".move").on('click', function(event) {
          if (this.hash !== "") {
             event.preventDefault();
              var hash = this.hash; 
              var offsetheight = 0;          
              if($('nav').hasClass('affix-top')){
                  offsetheight = 100;
              }
               $('html, body').animate({
                scrollTop: $(hash).offset().top - offsetheight
               }, 2000, function(){
               window.location.hash = hash;
             });          
            } // End if
          
      });
  }
        
/****************************************************
          javascript
****************************************************/
var _arr  = {};
  function loadScript(scriptName, callback) {
    if (!_arr[scriptName]) {
      _arr[scriptName] = true;
      var body    = document.getElementsByTagName('body')[0];
      var script    = document.createElement('script');
      script.type   = 'text/javascript';
      script.src    = scriptName;

      // then bind the event to the callback function
      // there are several events for cross browser compatibility
      // script.onreadystatechange = callback;
      script.onload = callback;

      // fire the loading
      body.appendChild(script);

    } else if (callback) {
      callback();
    }
  };
  


$("header").hide();
$(window).scroll(function () {
     var offset = $('#webster-main').offset().top;
      if ($(this).scrollTop() > offset) {
        $('header').fadeIn();
      } else {
        $('header').fadeOut();
      }
    });

          var lastId,
                topMenu = $("#navbarResponsive"),
                topMenuHeight = 80,
                // All list items
                menuItems = topMenu.find("a"),
                // Anchors corresponding to menu items
                scrollItems = menuItems.map(function(){
                  var item = $($(this).attr("href"));
                  if (item.length) { return item; }
                });

  $window.scroll(function(){
         // Get container scroll position
         var fromTop = $(this).scrollTop()+topMenuHeight;
         
         // Get id of current scroll item
         var cur = scrollItems.map(function(){
           if ($(this).offset().top < fromTop)
             return this;
         });
         // Get the id of the current element
         cur = cur[cur.length-1];
         var id = cur && cur.length ? cur[0].id : "";
         
         if (lastId !== id) {
             lastId = id;
             // Set/remove active class
             menuItems
               .parent().removeClass("active")
               .end().filter("[href='#"+id+"']").parent().addClass("active");
         }                   
      });

         $("header a,.move").on('click', function(event) {
            if (this.hash !== "") {
               event.preventDefault();
                var hash = this.hash; 
                var offsetheight = 0;          
               
                 $('html, body').animate({
                  scrollTop: $(hash).offset().top - offsetheight
                 }, 800, function(){
                 window.location.hash = hash;
               });          
              } // End if
             if($('.navbar-toggle').css('display') != 'none'){
               $(".navbar-toggle").trigger( "click" );
             }
        });

/****************************************************
     POTENZA Window load and functions
****************************************************/

  //Window load functions

  $(window).on('load', function(){
  // $window.on("load",function(){
          POTENZA.preloader(),
          POTENZA.Isotope();   
    });

 //Document ready functions
    $document.ready(function () {
        POTENZA.goToTop(),
        POTENZA.counters(),
        POTENZA.carousel();
    });
})(jQuery);

 
  $(function() {
    $("img.lazy").lazyload({
    event : "sporty"
    });
    });
    $(window).bind("load", function() {
    var timeout = setTimeout(function() {
    $("img.lazy").trigger("sporty")
    }, 5000);
    });
    // polyfill
    window.requestAnimationFrame = (function(){
    return  window.requestAnimationFrame       ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame    ||
    function( callback ){
    window.setTimeout(callback, 1000 / 60);
    };
    })();
    var speed = 5000;
    (function currencySlide(){
    var currencyPairWidth = $('.slideItem:first-child').outerWidth();
    $(".slideContainer").animate({marginLeft:-currencyPairWidth},speed, 'linear', function(){
    $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
    });
    requestAnimationFrame(currencySlide);
    })();
        var referrer = document.referrer;
        if(referrer.indexOf("preview.themeforest") > -1) {
        top.location.href = "http://themes.potenzaglobalsolutions.com/?theme=webster";
        }