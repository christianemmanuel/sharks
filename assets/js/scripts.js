$(document).ready(function () {
  var $slickElement = $('.arenas-livestream-list');

  $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    if(!slick.$dots){
      return;
    }
    var i = (currentSlide ? currentSlide : 0) + 1;
    var slideCount = $(`<span class="slide-count">${'Showing ' + i + ' of ' + (slick.$dots[0].children.length)}</span>`);
    $('.slide-count').remove();
    $('.arenas-livestream-list .slick-dots li:last-child').append(slideCount);
  });

  $('.pagingInfo').insertAfter( ".inner" );

  $slickElement.slick({
    cssEase: 'linear',
    dots: true,
    variableWidth: true,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    infinite: false,
    autoplay: false,
    speed: 300,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 576,
        settings: {
          variableWidth: false,
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

  $('.previous-matches-slider').slick({
    cssEase: 'linear',
    dots: true,
    variableWidth: true,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 2,
    draggable: true,
    infinite: true,
    autoplay: false,
    speed: 300,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          variableWidth: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      },
      {
        breakpoint: 576,
        settings: {
          variableWidth: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      }
    ]
  });


  // remove livestream arena slider
  if(($('.arenas-livestream-list').has('.livestream-item').length === 0)) {
    $('.arenas-livestream-wrap').remove();
  }

  if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $(".nav-links a").on("click", function(e){
      $('.toggle-mobile-menu').trigger('click');
      e.preventDefault();
    });

    $('.db-sidebar a').click(function () {
      localStorage.removeItem('toggled');
    })
  }

  $(".nav-links a").on("click", function(e){
    var href = $(this).attr("href");
    $( 'html, body' ).animate({
      scrollTop: $( href ).offset().top
    }, '300' );
    e.preventDefault();
  });

  var scrollTop = $(".scrollTop");

  $(window).scroll(function() {
    var topPos = $(this).scrollTop();

    if (topPos > 100) {
      $(scrollTop).css("opacity", "1");
    } else {
      $(scrollTop).css("opacity", "0");
    }
  });

  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  // Adjust Height
  function autoHeight() {
    $winHeight = window.innerHeight;
    
    var autoHeight = document.querySelectorAll('.auto_height');

    if($winHeight > 520){
      // alert($winHeight)
      for (i = 0; i < autoHeight.length; i++) {
        autoHeight[i].style.minHeight = $winHeight - 1 + "px";
      }
    }
    else{
      for (i = 0; i < autoHeight.length; i++) {
        autoHeight[i].style.minHeight = "520px"
      }
    }
  }
  autoHeight();

  // Window Resize
  $( window ).resize(function() {
    autoHeight;
  });

  $('.toggle-mobile-menu').click(function(e) {
    e.preventDefault();
    $('body').toggleClass('active_menu');
    $('.nav-links').slideToggle('fast');
  })
  $(document).on('click', '.open_modal_get_quote', function (e) {
    e.preventDefault();
    
    $('body').addClass('open_modal');
  })


  //retrieve current state
  $('body').toggleClass(window.localStorage.toggled);

  /* Toggle */
  $('.toggle-aside, .open-aside').click(function () {
    if (window.localStorage.toggled != "active-aside" ) {
      $('body').toggleClass("active-aside", true);
      window.localStorage.toggled = "active-aside";
    } else {
      $('body').toggleClass("active-aside", false);
      window.localStorage.toggled = "";
    }
  });

  $('.dropdown').click(function () {
    $(this).toggleClass('active');
    $(this).children('.submenu').slideToggle();
  })
  

  setTimeout(function () {
    var max = Math.max.apply(Math, $('.left-desc .players').map(function() { return $(this).height(); }))
    $(".left-desc .players").css("min-height", max);

    // REMOVE CLASS AFTER SLIDER REMDER
    $('body').find('.temp-prev-class-sld').removeClass('temp-prev-class-sld');
    $('body').find('.temp-live-class-sld').removeClass('temp-live-class-sld');
  }, 0)

});