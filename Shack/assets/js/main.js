
/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function(){
    jQuery(window).on('load', function() {
        jQuery('.loader').fadeOut();
        jQuery('.page-loader').delay(350).fadeOut('slow');
    });

    jQuery(document).ready(function() {

        /* ---------------------------------------------- /*
         * WOW Animation When You Scroll
         /* ---------------------------------------------- */

        wow = new WOW({
            mobile: false
        });
        wow.init();


        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scroll-up').fadeIn();
            } else {
                jQuery('.scroll-up').fadeOut();
            }
        });

        jQuery('a[href="#totop"]').click(function() {
            jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });


        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = jQuery('.home-section'),
            navbar      = jQuery('.navbar-custom'),
            navHeight   = navbar.height(),
            worksgrid   = jQuery('#works-grid'),
            width       = Math.max(jQuery(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        buildHomeSection(homeSection);
        navbarAnimation(navbar, homeSection, navHeight);
        navbarSubmenu(width);
        hoverDropdown(width, mobileTest);

        jQuery(window).resize(function() {
            var width = Math.max(jQuery(window).width(), window.innerWidth);
            buildHomeSection(homeSection);
            hoverDropdown(width, mobileTest);
        });

        jQuery(window).scroll(function() {
            effectsHomeSection(homeSection, this);
            navbarAnimation(navbar, homeSection, navHeight);
        });

        /* ---------------------------------------------- /*
         * Set sections backgrounds
         /* ---------------------------------------------- */

        var module = jQuery('.home-section, .module, .module-small, .side-image');
        module.each(function(i) {
            if (jQuery(this).attr('data-background')) {
                jQuery(this).css('background-image', 'url(' + jQuery(this).attr('data-background') + ')');
            }
        });

        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height(jQuery(window).height());
                } else {
                    homeSection.height(jQuery(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Home section effects
         /* ---------------------------------------------- */

        function effectsHomeSection(homeSection, scrollTopp) {
            if (homeSection.length > 0) {
                var homeSHeight = homeSection.height();
                var topScroll = jQuery(document).scrollTop();
                if ((homeSection.hasClass('home-parallax')) && (jQuery(scrollTopp).scrollTop() <= homeSHeight)) {
                    homeSection.css('top', (topScroll * 0.55));
                }
                if (homeSection.hasClass('home-fade') && (jQuery(scrollTopp).scrollTop() <= homeSHeight)) {
                    var caption = jQuery('.caption-content');
                    caption.css('opacity', (1 - topScroll/homeSection.height() * 1));
                }
            }
        }

        /* ---------------------------------------------- /*
         * Intro slider setup
         /* ---------------------------------------------- */

        if( jQuery('.hero-slider').length > 0 ) {
            jQuery('.hero-slider').flexslider( {
                animation: "fade",
                animationSpeed: 1000,
                animationLoop: true,
                prevText: '',
                nextText: '',
                before: function(slider) {
                    jQuery('.titan-caption').fadeOut().animate({top:'-80px'},{queue:false, easing: 'swing', duration: 700});
                    slider.slides.eq(slider.currentSlide).delay(500);
                    slider.slides.eq(slider.animatingTo).delay(500);
                },
                after: function(slider) {
                    jQuery('.titan-caption').fadeIn().animate({top:'0'},{queue:false, easing: 'swing', duration: 700});
                },
                useCSS: true
            });
        }


        /* ---------------------------------------------- /*
         * Rotate
         /* ---------------------------------------------- */

        jQuery(".rotate").textrotator({
            animation: "dissolve",
            separator: "|",
            speed: 3000
        });


        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function navbarAnimation(navbar, homeSection, navHeight) {
            var topScroll = jQuery(window).scrollTop();
            if (navbar.length > 0 && homeSection.length > 0) {
                if(topScroll >= navHeight) {
                    navbar.removeClass('navbar-transparent');
                } else {
                    navbar.addClass('navbar-transparent');
                }
            }
        }

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function navbarSubmenu(width) {
            // if (width > 767) {
            //     jQuery('.navbar-custom .navbar-nav > li.dropdown').hover(function() {
            //         // var MenuLeftOffset  = jQuery('.dropdown-menu', jQuery(this)).offset().left;
            //         // var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
            //         // if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
            //         //     jQuery(this).children('.dropdown-menu').addClass('leftauto');
            //         // } else {
            //         //     jQuery(this).children('.dropdown-menu').removeClass('leftauto');
            //         // }
            //         // if (jQuery('.dropdown', jQuery(this)).length > 0) {
            //         //     var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
            //         //     if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
            //         //         jQuery(this).children('.dropdown-menu').addClass('left-side');
            //         //     } else {
            //         //         jQuery(this).children('.dropdown-menu').removeClass('left-side');
            //         //     }
            //         // }
            //     });
            // }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desctop
         /* ---------------------------------------------- */

        function hoverDropdown(width, mobileTest) {
            if ((width > 767) && (mobileTest !== true)) {
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function() {
                        var $this = jQuery(this);
                        setTimeoutConst = setTimeout(function() {
                            $this.addClass('open');
                            $this.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        jQuery(this).removeClass('open');
                        jQuery(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                jQuery('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    jQuery(this).parent().siblings().removeClass('open');
                    jQuery(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    jQuery(this).parent().toggleClass('open');
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar collapse on click
         /* ---------------------------------------------- */

        jQuery(document).on('click','.navbar-collapse.in',function(e) {
            if( jQuery(e.target).is('a') && jQuery(e.target).attr('class') != 'dropdown-toggle' ) {
                jQuery(this).collapse('hide');
            }
        });


        /* ---------------------------------------------- /*
         * Video popup, Gallery
         /* ---------------------------------------------- */

        jQuery('.video-pop-up').magnificPopup({
            type: 'iframe'
        });

        jQuery(".gallery-item").magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                titleSrc: 'title',
                tError: 'The image could not be loaded.'
            }
        });


        /* ---------------------------------------------- /*
         * Portfolio
         /* ---------------------------------------------- */

        var worksgrid   = jQuery('#works-grid'),
            worksgrid_mode;

        if (worksgrid.hasClass('works-grid-masonry')) {
            worksgrid_mode = 'masonry';
        } else {
            worksgrid_mode = 'fitRows';
        }

        worksgrid.imagesLoaded(function() {
            worksgrid.isotope({
                layoutMode: worksgrid_mode,
                itemSelector: '.work-item'
            });
        });

        jQuery('#filters a').click(function() {
            jQuery('#filters .current').removeClass('current');
            jQuery(this).addClass('current');
            var selector = jQuery(this).attr('data-filter');

            worksgrid.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            return false;
        });


        /* ---------------------------------------------- /*
         * Testimonials
         /* ---------------------------------------------- */

        if (jQuery('.testimonials-slider').length > 0 ) {
            jQuery('.testimonials-slider').flexslider( {
                animation: "slide",
                smoothHeight: true
            });
        }


        /* ---------------------------------------------- /*
         * Post Slider
         /* ---------------------------------------------- */

        if (jQuery('.post-images-slider').length > 0 ) {
            jQuery('.post-images-slider').flexslider( {
                animation: "slide",
                smoothHeight: true,
            });
        }


        /* ---------------------------------------------- /*
         * Progress bar animations
         /* ---------------------------------------------- */

        jQuery('.progress-bar').each(function(i) {
            jQuery(this).appear(function() {
                var percent = jQuery(this).attr('aria-valuenow');
                jQuery(this).animate({'width' : percent + '%'});
                jQuery(this).find('span').animate({'opacity' : 1}, 900);
                jQuery(this).find('span').countTo({from: 0, to: percent, speed: 900, refreshInterval: 30});
            });
        });


        /* ---------------------------------------------- /*
         * Funfact Count-up
         /* ---------------------------------------------- */

        jQuery('.count-item').each(function(i) {
            jQuery(this).appear(function() {
                var number = jQuery(this).find('.count-to').data('countto');
                jQuery(this).find('.count-to').countTo({from: 0, to: number, speed: 1200, refreshInterval: 30});
            });
        });




        /* ---------------------------------------------- /*
         * Youtube video background
         /* ---------------------------------------------- */

        jQuery(function(){
            jQuery(".video-player").mb_YTPlayer();
        });

        jQuery('#video-play').click(function(event) {
            event.preventDefault();
            if (jQuery(this).hasClass('fa-play')) {
                jQuery('.video-player').playYTP();
            } else {
                jQuery('.video-player').pauseYTP();
            }
            jQuery(this).toggleClass('fa-play fa-pause');
            return false;
        });

        jQuery('#video-volume').click(function(event) {
            event.preventDefault();
            if (jQuery(this).hasClass('fa-volume-off')) {
                jQuery('.video-player').YTPUnmute();
            } else {
                jQuery('.video-player').YTPMute();
            }
            jQuery(this).toggleClass('fa-volume-off fa-volume-up');
            return false;
        });


        /* ---------------------------------------------- /*
         * Owl Carousel
         /* ---------------------------------------------- */

        jQuery('.owl-carousel').each(function(i) {

            // Check items number
            if (jQuery(this).data('items') > 0) {
                items = jQuery(this).data('items');
            } else {
                items = 4;
            }

            // Check pagination true/false
            if ((jQuery(this).data('pagination') > 0) && (jQuery(this).data('pagination') === true)) {
                pagination = true;
            } else {
                pagination = false;
            }

            // Check navigation true/false
            if ((jQuery(this).data('navigation') > 0) && (jQuery(this).data('navigation') === true)) {
                navigation = true;
            } else {
                navigation = false;
            }

            // Build carousel
            jQuery(this).owlCarousel( {
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                nav: navigation,
                dots: pagination,
                loop: true,
                dotsSpeed: 400,
                items: items,
                navSpeed: 300,
                autoplay: 2000
            });

        });


        /* ---------------------------------------------- /*
         * Blog masonry
         /* ---------------------------------------------- */

        jQuery('.post-masonry').imagesLoaded(function() {
            jQuery('.post-masonry').masonry();
        });


        /* ---------------------------------------------- /*
         * Scroll Animation
         /* ---------------------------------------------- */

        jQuery('.section-scroll').bind('click', function(e) {
            var anchor = jQuery(this);
            jQuery('html, body').stop().animate({
                scrollTop: jQuery(anchor.attr('href')).offset().top - 50
            }, 1000);
            e.preventDefault();
        });

        /*===============================================================
         Working Contact Form
         ================================================================*/

        jQuery("#contactForm").submit(function (e) {

            e.preventDefault();
            var $ = jQuery;

            var postData = jQuery(this).serializeArray(),
                formURL = jQuery(this).attr("action"),
                $cfResponse = jQuery('#contactFormResponse'),
                $cfsubmit = jQuery("#cfsubmit"),
                cfsubmitText = $cfsubmit.text();

            $cfsubmit.text("Sending...");


            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $cfResponse.html(data);
                        $cfsubmit.text(cfsubmitText);
                        jQuery('#contactForm input[name=name]').val('');
                        jQuery('#contactForm input[name=email]').val('');
                        jQuery('#contactForm textarea[name=message]').val('');
                    },
                    error: function (data) {
                        alert("Error occurd! Please try again");
                    }
                });

            return false;

        });


        /*===============================================================
         Working Request A Call Form
         ================================================================*/

        jQuery("#requestACall").submit(function (e) {

            e.preventDefault();
            var $ = jQuery;

            var postData = jQuery(this).serializeArray(),
                formURL = jQuery(this).attr("action"),
                $cfResponse = jQuery('#requestFormResponse'),
                $cfsubmit = jQuery("#racSubmit"),
                cfsubmitText = $cfsubmit.text();

            $cfsubmit.text("Sending...");


            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $cfResponse.html(data);
                        $cfsubmit.text(cfsubmitText);
                        jQuery('#requestACall input[name=name]').val('');
                        jQuery('#requestACall input[name=subject]').val('');
                        jQuery('#requestACall textarea[name=phone]').val('');
                    },
                    error: function (data) {
                        alert("Error occurd! Please try again");
                    }
                });

            return false;

        });


        /*===============================================================
         Working Reservation Form
         ================================================================*/

        jQuery("#reservationForm").submit(function (e) {

            e.preventDefault();
            var $ = jQuery;

            var postData = jQuery(this).serializeArray(),
                formURL = jQuery(this).attr("action"),
                $cfResponse = jQuery('#reservationFormResponse'),
                $cfsubmit = jQuery("#rfsubmit"),
                cfsubmitText = $cfsubmit.text();

            $cfsubmit.text("Sending...");


            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $cfResponse.html(data);
                        $cfsubmit.text(cfsubmitText);
                        jQuery('#reservationForm input[name=date]').val('');
                        jQuery('#reservationForm input[name=time]').val('');
                        jQuery('#reservationForm textarea[name=people]').val('');
                        jQuery('#reservationForm textarea[name=email]').val('');
                    },
                    error: function (data) {
                        alert("Error occurd! Please try again");
                    }
                });

            return false;

        });


        /* ---------------------------------------------- /*
         * Subscribe form ajax
         /* ---------------------------------------------- */

        jQuery('#subscription-form').submit(function(e) {

            e.preventDefault();
            var $form           = jQuery('#subscription-form');
            var submit          = jQuery('#subscription-form-submit');
            var ajaxResponse    = jQuery('#subscription-response');
            var email           = jQuery('input#semail').val();

            $.ajax({
                type: 'POST',
                url: 'assets/php/subscribe.php',
                dataType: 'json',
                data: {
                    email: email
                },
                cache: false,
                beforeSend: function(result) {
                    submit.empty();
                    submit.append('<i class="fa fa-cog fa-spin"></i> Wait...');
                },
                success: function(result) {
                    if(result.sendstatus == 1) {
                        ajaxResponse.html(result.message);
                        $form.fadeOut(500);
                    } else {
                        ajaxResponse.html(result.message);
                    }
                }
            });

        });


        /* ---------------------------------------------- /*
         * Google Map
         /* ---------------------------------------------- */

        if(jQuery("#map").length == 0 || typeof google == 'undefined') return;

        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        var mkr = new google.maps.LatLng(40.6700, -74.2000);
        var cntr = (mobileTest) ? mkr : new google.maps.LatLng(40.6700, -73.9400);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: cntr, // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [
                    {
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "saturation": "-11"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "saturation": "22"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "saturation": "-58"
                            },
                            {
                                "color": "#cfcece"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#f8f8f8"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#999999"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.country",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f9f9f9"
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "saturation": "-19"
                            },
                            {
                                "lightness": "-2"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#d8e1e5"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#dedede"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#cbcbcb"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9c9c9c"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var image = new google.maps.MarkerImage('assets/images/map-icon.png',
                new google.maps.Size(59, 65),
                new google.maps.Point(0, 0),
                new google.maps.Point(24, 42)
            );

            var marker = new google.maps.Marker({
                position: mkr,
                icon: image,
                title: 'Titan',
                infoWindow: {
                    content: '<p><strong>Rival</strong><br/>121 Somewhere Ave, Suite 123<br/>P: (123) 456-7890<br/>Australia</p>'
                },
                map: map,
            });
        }

    });
})(jQuery);