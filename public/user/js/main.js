$(document).ready(function() {
  $(".button-collapse").sideNav({
    onOpen: function(el) {
      $("a.button-collapse .nav-ham").addClass('open');
    },
    onClose: function(el) {
      $("a.button-collapse .nav-ham").removeClass('open');
    }
  });
  $('.collapsible').collapsible({
  });
  $(".dropdown-button, .dropdown-button2, .dropdown-button3, .dropdown-button4, .dropdown-button5, .dropdown-button6").dropdown({
    hover: true,
    belowOrigin: true
  });

  $("#go-to-top").on('click', function(e) {
    e.preventDefault();
    $("html, body").animate({scrollTop: 0}, 'slow');
  });

  $(window).scroll(function() {
    if ($(window).scrollTop() > 700) {
      $("#go-to-top").removeClass("hide");
    }

    else {
      $("#go-to-top").addClass("hide");
    }
  });

  $("#search-toggle").on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(".search-div").toggleClass("shown");
  });

  $(".search-div").click(function(e) {
    e.stopPropagation();
  });

  $(document).click(function() {
    $(".search-div").removeClass("shown");
  });

  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText:["<img src='./images/bslider-left.png' alt='Left' class='responsive-img' />","<img src='./images/bslider-right.png' alt='Left' class='responsive-img' />"],
    items: 1,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 800,
    autoplay: true,
    autoplayTimeout: 8000,
    autoplayHoverPause: false
  });

  $("#go-to-top").on('mouseover', function(e) {
    $(".not-h").addClass("hide");
    $(".yes-h").removeClass("hide");
  });

  $("#go-to-top").on('mouseout', function(e) {
    $(".not-h").removeClass("hide");
    $(".yes-h").addClass("hide");
  });

  wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 100,
    mobile: false,
    live: true
  });
  wow.init();

  if ($(".header-text").length) {
    var a = 0;
    $(window).scroll(function() {

      var oTop = $('.counter').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function() {
          var $this = $(this),
            countTo = $this.attr('data-count');
          $({
            countNum: $this.text()
          }).animate({
              countNum: countTo
            },

            {

              duration: 3500,
              easing: 'swing',
              step: function() {
                $this.text(Math.floor(this.countNum));
              },
              complete: function() {
                $this.text(this.countNum);
                //alert('finished');
              }

            });
        });
        a = 1;
      }

    });
  }

  var StickyElement = function(node) {
    var doc = $(document),
      fixed = false,
      anchor = node.find(".sticky-anchor"),
      content = node.find(".sticky-content");

    var onScroll = function(e) {
      var docTop = doc.scrollTop(),
        anchorTop = anchor.offset().top;

      if (docTop > anchorTop) {
        if (!fixed) {
          anchor.height(content.outerHeight());
          content.addClass("fixed animated fadeIn");
          fixed = true;
        }
      } else {
        if (fixed) {
          anchor.height(0);
          content.removeClass("fixed animated fadeIn");
          fixed = false;
        }
      }
    };

    $(window).on("scroll", onScroll);
  };

  var demo = new StickyElement($("#sticky"));

  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 100,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false
  });

  $("a.bp-btn").on('click', function(e) {
    e.preventDefault();
    $(".pf-modal").addClass('open');
    $('body').addClass('no-scroll');
    e.stopPropagation();
  });

  $("a#pfmodal-close").on('click', function(e) {
    e.preventDefault();
    $(".pf-modal").removeClass('open');
    $("body").removeClass("no-scroll");
  });

  $(".pf-modal .partners-form").on('click', function(e) {
    e.stopPropagation();
  });

  $(document).on('click', function(e) {
    $(".pf-modal").removeClass('open');
    $("body").removeClass("no-scroll");
  });

  $(".ad-chb").change(function () {
    $(".ad-chb").not(this).prop('checked', false);
  });

});