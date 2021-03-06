

function noOpener(){
  //get elements
  var e = document.querySelectorAll('a[target="_blank"]:not([rel~="noopener"])');
  if(e.length){
      //loop through
      for (i = 0; i < e.length; ++i){
          //check for existing rel
          var rel = e[i].getAttribute('rel');
          if(rel){
              //we don't want doubel noreferrer
              rel = rel.replace('noreferrer','');
              e[i].setAttribute('rel',rel+' noopener noreferrer nofollow');
          }else{
              e[i].setAttribute('rel','noopener noreferrer');   
          }
          
      }
  }
}

jQuery(document).ready(function() {
  noOpener()
});

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 100) {
      jQuery("header").addClass("has_scrolled");
  } else {
      jQuery("header").removeClass("has_scrolled");
  }
});

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 160) {
      jQuery(".reading-progress").addClass("visible");
  } else {
      jQuery(".reading-progress").removeClass("visible");
  }
});


jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 600) {
      jQuery(".btp").addClass("is--visible");
  } else {
      jQuery(".btp").removeClass("is--visible");
  }
});

jQuery('.btp').on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).on( 'nfFormReady', function( e, layoutView ) {
  jQuery('select').niceSelect();
});

// Opleiding tabs

jQuery('.content-title').click(function(){
  jQuery(this).toggleClass('open');
  jQuery(this).next('.edu-content').slideToggle(300);
});


jQuery('ul li h4.faq-title').click(function(){
  jQuery(this).toggleClass('open');
  jQuery(this).next('.faq-info').slideToggle(300);
});


jQuery( "body" ).on('click', '.hamburger', function() {
  jQuery('.mobile-navigation').slideToggle(300);
  jQuery('main').toggleClass('blurred');
  jQuery('.mt-btns').toggleClass('displayed');
  jQuery('.hamburger div:nth-child(1)').toggleClass('first');
  jQuery('.hamburger div:nth-child(2)').toggleClass('middle');
  jQuery('.hamburger div:nth-child(3)').toggleClass('last');
});


jQuery(window).scroll(function(event) {
  var scrollTop = jQuery(window).scrollTop();
  docHeight = jQuery(document).height(),
  winHeight = jQuery(window).height(),
  scrollPercent = (scrollTop) / (docHeight - winHeight),
  scrollPercentageString = (scrollPercent * 100) + "%",
  readingIndicator = jQuery(".reading-progress");
  readingIndicator.width(scrollPercentageString);
});

jQuery('.countnumber').each(function () {
    jQuery(this).prop('Counter',0).animate({
        Counter: jQuery(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            jQuery(this).text(Math.ceil(now));
        }
    });
});

jQuery(document).ready(function() {
    (function handleHover() {
        let win = jQuery(window);
        let el = jQuery();
        let children = jQuery();
        let w = 0;
        let h = 0;
        let ratio = 0.10;
      
        let absoluteOffsetX = 0, absoluteOffsetY = 0, relativeOffsetX = 0, relativeOffsetY = 0;
      
        jQuery('#services .services-main .services-items .item, .featured-item, .featured-item-big, .news-item').on('mouseenter', function(e) {
          el = jQuery(this);
          children = el.children();
          w = el.outerWidth();
          h = el.outerHeight();
      
        }).on('mousemove', function(e) {
          absoluteOffsetX = e.offsetX - w/2;
          absoluteOffsetY = e.offsetY - h/2;
          relativeOffsetX = absoluteOffsetX * 100 / w * 2 * ratio;
          relativeOffsetY = absoluteOffsetY * 100 / h * 2 * ratio;
      
          el.css({
            'transform': `rotateY(${relativeOffsetX}deg) scale(1.04) rotateX(${relativeOffsetY * -1}deg)`,
            'transition': `.1s`,
          });
      
        }).on('mouseleave', function() {
          el.css({
            'transform': `none`,
            'transition': `1s`,
          });
        });
      
      })();
  });


  document.addEventListener('DOMContentLoaded', function(){
  var trigger = new ScrollTrigger({
    toggle: {
      visible: 'sectionv',
      hidden: 'sectionh'
    },
    offset: {
      x: 0,
      y: 80
    },
    addHeight: false,
    once: true
  }, document.body, window);
});