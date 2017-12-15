/**
 * init_header
 * menu
 * owlcarousel brand
 */

 ;(function($) {

    'use strict'

    var init_header = function() {
        var largeScreen = matchMedia('only screen and (min-width: 992px)').matches;
        if( largeScreen ) {
            if( $().sticky ) {
                $('header.header-sticky').sticky();
            }
        }
    };

    //Menu
    var ResponsiveMenu =  {
        menuType: 'desktop',
        initial: function(winWidth) {
            ResponsiveMenu.menuWidthDetect(winWidth);
            ResponsiveMenu.menuBtnClick();
            ResponsiveMenu.parentMenuClick();
        },
        menuWidthDetect: function(winWidth) {
            var currMenuType = 'desktop';
            if (matchMedia('only screen and (max-width: 991px)').matches) {
                currMenuType = 'mobile';
            }
            if ( currMenuType !== ResponsiveMenu.menuType ) {
                ResponsiveMenu.menuType = currMenuType;
                if ( currMenuType === 'mobile' ) {
                    var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                    $('#header').find('.header-wrap').after($mobileMenu);
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');
                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');
                    $desktopMenu.find('.sub-menu').removeAttr('style');
                    $('#header').find('.btn-menu').after($desktopMenu);
                    $('.btn-submenu').remove();
                }
            } // clone and insert menu
        },
        menuBtnClick: function() {
            $('.btn-menu').on('click', function() {
                $('#mainnav-mobi').slideToggle(300);
                $(this).toggleClass('active');
            });
        }, // click on moblie button
        parentMenuClick: function() {
            $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
                if ( $(this).has('ul') ) {
                    e.stopImmediatePropagation()
                    $(this).next('ul').slideToggle(300);
                    $(this).toggleClass('active');
                }
            });
        } // click on sub-menu button
    };

    //owlcarousel Brand Logo
    var owl = function(){
        //slider Testimonial
        var owl1 = $("#testimonial01");
        owl1.addClass('owl-carousel');
        owl1.owlCarousel({
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            items : 1,
            dots: true,
            loop: true
        });

        var owl2 = $("#owl-brand");
        owl2.owlCarousel({
            slideSpeed : 3000,
            autoplay: true,
            items : 6,
            loop: true,
            responsive : {
                0 : {
                    items : 2
                },
                480 : {
                    items : 3,
                },
                768 : {
                    items : 4,
                },
                991 : {
                    items : 6,
                }
            },
            navigation : false,
            dots: false
        });




        var owl2 = $("#owl-galeria");
        owl2.owlCarousel({
            slideSpeed : 3000,
            autoplay: true,
            items : 6,
            loop: true,
            responsive : {
                0 : {
                    items : 2
                },
                480 : {
                    items : 3,
                },
                768 : {
                    items : 4,
                },
                991 : {
                    items : 6,
                }
            },
            pagination : true,
            navigation : true,
            navigationText : ["prev","next"],
            rewindNav : true,
            scrollPerPage : true
        });

        //SLIDER "OUR WORKS" - Home2
        var owl3 = $("#owl-work02");
        owl3.owlCarousel({
            items : 1,
            //nav : false,
            responsiveClass:true,
            dots: false,
            nav: true,
            //pagination: true,
            lazyLoad: true,
            navText: ["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"],
            responsive : {
                0 : {
                    nav: false
                },
                768 : {
                    nav: true
                }
            }
        });
        
        //SLIDER "OUR WORKS" - Tab
        var owl31 = $("#owl-work02-design2");
        owl31.owlCarousel({
            items : 1,
            //nav : false,
            responsiveClass:true,
            dots: false,
            nav: true,
            //pagination: true,
            lazyLoad: true,
            navText: ["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"],
            responsive : {
                0 : {
                    nav: false
                },
                768 : {
                    nav: true
                }
            }
        });
        
        //SLIDER "OUR WORKS" - Tab
        var owl32 = $("#owl-work02-building2");
        owl32.owlCarousel({
            items : 1,
            //nav : false,
            responsiveClass:true,
            dots: false,
            nav: true,
            //pagination: true,
            lazyLoad: true,
            navText: ["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"],
            responsive : {
                0 : {
                    nav: false
                },
                768 : {
                    nav: true
                }
            }
        });
        
        //SLIDER "OUR WORKS" - Tab
        var owl33 = $("#owl-work02-architecture2");
        owl33.owlCarousel({
            items : 1,
            //nav : false,
            responsiveClass:true,
            dots: false,
            nav: true,
            //pagination: true,
            lazyLoad: true,
            navText: ["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"],
            responsive : {
                0 : {
                    nav: false
                },
                768 : {
                    nav: true
                }
            }
        });
        
        //SLIDER "OUR WORKS" - Tab
        var owl34 = $("#owl-work02-plumbing2");
        owl34.owlCarousel({
            items : 1,
            //nav : false,
            responsiveClass:true,
            dots: false,
            nav: true,
            //pagination: true,
            lazyLoad: true,
            navText: ["<i class='fa fa-angle-left'>","<i class='fa fa-angle-right'>"],
            responsive : {
                0 : {
                    nav: false
                },
                768 : {
                    nav: true
                }
            }
        });
        
        //slider CLIENT SAYS
        var owl4 = $("#testimonial02");
        owl4.addClass('owl-carousel');
        owl4.owlCarousel({
            slideSpeed : 3000,
            autoplay: true,
            nav : false,
            margin: 30,
            responsive : {
                0 : {
                    items : 1
                },
                768 : {
                    items : 2,
                }
            }
        });



        $('.bxslider').bxSlider({
          mode: 'fade',
          auto: true,
          captions: false
      });

        

        //Slider Shop Detail
        var
            $sync1 = $("#sync1"), //big photo
            $sync2 = $("#sync2"), //thumbs
            duration = 300;

        //big photo
        $sync1
        .owlCarousel({
            items: 1,
            dots: false
        })
        .on('changed.owl.carousel', function (e) {
            var syncedPosition = syncPosition(e.item.index);

            if ( syncedPosition != "stayStill" ) {
                $sync2.trigger('to.owl.carousel', [syncedPosition, duration, true]);
            }
        });

        //thumbs
        $sync2
            .on('initialized.owl.carousel', function() { //must go before owl carousel initialization
                addClassCurrent( 0 );
            })
            .owlCarousel({ //owl carousel init
                items: 4,
                dots: false,
                margin: 10
            })
            .on('click', '.owl-item', function () {
                $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            });


        //adds 'current' class to the thumbnail
        function addClassCurrent( index ) {
            $sync2
            .find(".owl-item")
            .removeClass("current")
            .eq( index ).addClass("current");
        }

        //syncs positions. argument 'index' represents absolute position of the element
        function syncPosition( index ) {

            //PART 1 (adds 'current' class to thumbnail)
            addClassCurrent( index );


            //PART 2 (counts position)

            var itemsNo = $sync2.find(".owl-item").length; //total items
            var visibleItemsNo = $sync2.find(".owl-item.active").length; //visible items

            //if all items are visible
            if (itemsNo === visibleItemsNo) {
                return "stayStill";
            }

            //relative index (if 4 elements are visible and the 2nd of them has class 'current', returns index = 1)
            var visibleCurrentIndex = $sync2.find(".owl-item.active").index( $sync2.find(".owl-item.current") );

            //if it's first visible element and if there is hidden element before it
            if (visibleCurrentIndex == 0 && index != 0) {
                return index - 1;
            }

            //if it's last visible element and if there is hidden element after it
            if (visibleCurrentIndex == (visibleItemsNo - 1) && index != (itemsNo - 1)) {
                return index - visibleItemsNo + 2;
            }

            return "stayStill";
        };
    };

    var consIsotope = function(elm) {
      if ( $().isotope ) {
         var $container = $(elm);
         $container.imagesLoaded(function(){
            $container.isotope({
               itemSelector: '.masonry-item',
               transitionDuration: '1s'
				}); // end isotope
        });
     };
 };

	//Back to Top
	$('.toTop').on('click', function (e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 700);
	});



	//
	$(".zoom").fancybox();

    // Dom Ready
    $(function() {
        init_header();
        owl();
        ResponsiveMenu.initial($(window).width());
        $(window).resize(function() {
            ResponsiveMenu.menuWidthDetect($(this).width());
        });
        //consIsotope('.work-masonry-all');
        //consIsotope('.work-masonry-interior');
        //consIsotope('.work-masonry-architecture');
        //consIsotope('.work-masonry-building');
        //consIsotope('.work-masonry-plumbing');


    });

    $(window).scroll(function() 
    {
        if($(window).scrollTop() == $(document).height() - $(window).height())
        {
            $('.loading').show();

            offset++;

            if(offset*12 > total)
            {
                $('.loading').hide();
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: base_url,
                    data: {offset: offset},
                    cache: false,
                    beforeSend: function() { $('.loading').show(); },
                    success: function(data) { $('.append').append(data); $('.loading').hide(); }
                });
            }
        }
    });

})(jQuery);