$(document).ready(function () {
  setTimeout(() => {
    var $slickElement = $('.arenas-livestream-list');

    $slickElement.slick({
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
            variableWidth: false,
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });

    $('.global-slick-slider').slick({
      cssEase: 'linear',
      dots: true,
      variableWidth: true,
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 2,
      draggable: true,
      infinite: false,
      autoplay: false,
      speed: 300,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            variableWidth: false,
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
  }, 0);

  // remove livestream arena slider
  if(($('.arenas-livestream-list').has('.livestream-item').length === 0)) {
    $('.arenas-livestream-wrap').remove();
  }

  if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $('.db-sidebar a').click(function () {
      localStorage.removeItem('toggled');
    })

    $('#match-results').addClass('is-mobile-card')
  }

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
    $('body').find('.temp-class-sld').removeClass('temp-class-sld');
  }, 0)


  $('.toggle-share-social-media').click(function (e) {
    $('.addtoany_content').toggleClass('show');
    e.stopPropagation()
  });
  $(document).on('click', function(e) {
    if ($(e.target).is("#customSelect") === false) {
      $('.addtoany_content').removeClass('show');
    }
  });
  
  if($('.previous-matches-tiles .slider-global-item').length >= 6) {
    $('.view-all-prevgame-container').show();
  }

});