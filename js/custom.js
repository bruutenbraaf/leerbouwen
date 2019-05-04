
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();
  if (scroll >= 100) {
      $("header").addClass("has_scrolled");
  } else {
      $("header").removeClass("has_scrolled");
  }
});

$(window).scroll(function() {    
  var scroll = $(window).scrollTop();
  if (scroll >= 160) {
      $(".reading-progress").addClass("visible");
  } else {
      $(".reading-progress").removeClass("visible");
  }
});


$(window).scroll(function(event) {
  var scrollTop = $(window).scrollTop();
  docHeight = $(document).height(),
  winHeight = $(window).height(),
  scrollPercent = (scrollTop) / (docHeight - winHeight),
  scrollPercentageString = (scrollPercent * 100) + "%",
  readingIndicator = $(".reading-progress");
  readingIndicator.width(scrollPercentageString);
});

$('.countnumber').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

$(document).ready(function() {
    (function handleHover() {
        let win = $(window);
        let el = $();
        let children = $();
        let w = 0;
        let h = 0;
        let ratio = 0.10;
      
        let absoluteOffsetX = 0, absoluteOffsetY = 0, relativeOffsetX = 0, relativeOffsetY = 0;
      
        $('#services .services-main .services-items .item, .news-item, .featured-item, .featured-item-big').on('mouseenter', function(e) {
          el = $(this);
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