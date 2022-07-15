(function($) {
    "use strict";
    var ttwindowWidth = window.innerWidth || $window.width();
    var carleaderSlick = function($scope, $) {
        var tt = $scope.find('.js-carousel').each(function() {
            $('.js-carousel').not('.slick-initialized').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 600,
                slidesToShow: 4,
                slidesToScroll: 4,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 1270,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            arrows: false,
                        }
                    }, {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 791,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    }
    var carleaderTestimonial = function($scope, $) {
        var tt = $scope.find('.js-reviews-carousel').each(function() {
            $('.js-reviews-carousel').not('.slick-initialized').slick({
                mobileFirst: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 500,
                pauseOnHover: false,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    }
    var carleaderOurStaff = function($scope, $) {
        var tt = $scope.find('.js-carousel-col-4').each(function() {
            $('.js-carousel-col-4').not('.slick-initialized').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 4,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 6000,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1229,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    }
                ]
            });
        });

        var tt = $scope.find('.js-carousel-custom01').each(function() {
            $('.js-carousel-custom01').not('.slick-initialized').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 2,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 6000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            dots: true,
                        }
                    }
                ]
            });
        });

    }
    var carleaderNews = function($scope, $) {
        var tt = $scope.find('.js-carousel-news').each(function() {
            $('.js-carousel-news').not('.slick-initialized').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    }
    var carleaderInfoBox = function($scope, $) {
        var tt = $scope.find('.js-carousel-col-3').each(function() {
            $('.js-carousel-col-3').not('.slick-initialized').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                // slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: false,
                autoplaySpeed: 6000,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1229,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    }

    var carleaderBrowsByType = function($scope, $) {
        var tt = $scope.find('.js-carousel-brand').each(function() {
            $('.js-carousel-brand').not('.slick-initialized').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 8,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 6000,
                responsive: [{
                        breakpoint: 1370,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 1270,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    }, {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 420,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                        }
                    }
                ]
            });
        });
    }





    var masionary = function gridPortfolioMasonr() {
        // init Isotope
        var $ttPageContent = $('#tt-pageContent');

        var $grid = $ttPageContent.find('.tt-portfolio-masonry').find('.tt-portfolio-content').isotope({
            itemSelector: '.element-item',
            layoutMode: 'masonry',
        });

        // layout Isotope after each image loads
        $grid.imagesLoaded().progress(function() {
            $grid.isotope('layout').addClass('tt-show');
        });
        // filter functions
        var ttFilterNav = $ttPageContent.find('.tt-portfolio-masonry').find('.tt-filter-nav');
        if (ttFilterNav.length) {
            var filterFns = {
                ium: function() {
                    var name = $(this).find('.name').text();
                    return name.match(/ium$/);
                }
            };
            var filterValue = $ttPageContent.find('.tt-portfolio-masonry').find('.tt-filter-nav .button').attr('data-filter');
                filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({
                    filter: filterValue
                });
            $(this).addClass('active').siblings().removeClass('active');
            // bind filter button click
            ttFilterNav.on('click', '.button', function() {
                var filterValue = $(this).attr('data-filter');
                filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({
                    filter: filterValue
                });
                $(this).addClass('active').siblings().removeClass('active');
            });
        };
    };

    var testimasonary = function gridPortfolioMasonr() {

        var $ptPageContent = $('#tt-pageContent'),
            ptPortfolioMasonry = $ptPageContent.find('.pt-wrapper-masonry'),
            $window = $(window);
        // init Isotope
        var $grid = ptPortfolioMasonry.find('.pt-portfolio-content').isotope({
            itemSelector: '.element-item',
            layoutMode: 'masonry',
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress(function() {
            $grid.isotope('layout').addClass('pt-show');
        });
        // filter functions
        var ptFilterNav = ptPortfolioMasonry.find('.pt-filter-nav');
        if (ptFilterNav.length) {
            var filterFns = {
                ium: function() {
                    var name = $(this).find('.name').text();
                    return name.match(/ium$/);
                }
            };
            // bind filter button click
            ptFilterNav.on('click', '.button', function() {
                var filterValue = $(this).attr('data-filter');
                filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({
                    filter: filterValue
                });
                $(this).addClass('active').siblings().removeClass('active');
            });
        };
        //add item
        var isotopShowmoreJs = $('.isotop_showmore_js .btn'),
            ptAddItem = $('.pt-add-item');
        if (isotopShowmoreJs.length && ptAddItem.length) {
            isotopShowmoreJs.on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'ajax_portfolio.php',
                    success: function(data) {
                        var $item = $(data);
                        ptAddItem.append($item);
                        $grid.isotope('appended', $item);
                        initPortfolioPopup();
                        adjustOffset();
                    }
                });

                function adjustOffset() {
                    var offsetLastItem = ptAddItem.children().last().children().offset().top - 180;
                    $($body, $html).animate({
                        scrollTop: offsetLastItem
                    }, 500);
                };
                return false;
            });
        };


    };

    var mainslider = function mainSlider() {
        var $el = $('.mainSlider');
        $el.find('.slide').first().imagesLoaded({
            background: true
        }, function() {
            setTimeout(function() {
                $el.parent().find('.loading-content').addClass('disable');
            }, 1200);
        });
        $el.on('init', function(e, slick) {
            var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        $el.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
            var $animatingElements = $currentSlide.find('[data-animation]');
            doAnimations($animatingElements);
        });
        if(!$el.hasClass('slick-initialized')){
            $el.slick({
                arrows: false,
                dots: false,
                autoplay: true,
                autoplaySpeed: 5500,
                fade: true,
                speed: 1000,
                pauseOnHover: false,
                pauseOnDotsHover: true,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false
                    }
                }, {
                    breakpoint: 1025,
                    settings: {
                        dots: false,
                        arrows: false
                    }
                }]
            });
        }

    };

    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('animation-delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
            if ($this.hasClass('animate')) {
                $this.removeClass('animation');
            }
        });
    };

    var jsCarouselCol4 = $('.js-carousel-col-4');
    var count_post = $('#interested_slider_result').val();
    if (count_post >= 4) {
        count_post = 4;
    } else if (count_post > 1 && count_post < 4) {
        count_post = 3;
    } else {
        count_post = 2;

    }
    var prod_slider = function prod_slider() {
        jsCarouselCol4.slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: count_post,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 6000,
            responsive: [{
                    breakpoint: 1370,
                    settings: {
                        arrows: false,
                    }
                },
                {
                    breakpoint: 1229,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }
            ]
        });
    };


    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_type_vehicle.default', carleaderSlick);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader-news.default', carleaderNews);
        elementorFrontend.hooks.addAction('frontend/element_ready/CarleaderServices.default', carleaderNews);
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', carleaderTestimonial);
        elementorFrontend.hooks.addAction('frontend/element_ready/our_staff.default', carleaderOurStaff);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_infobox.default', carleaderInfoBox);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_brows_type.default', carleaderBrowsByType);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_weekly.default', masionary);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_weekly_two.default', masionary);
        elementorFrontend.hooks.addAction('frontend/element_ready/CarleaderReviews.default', testimasonary);
        elementorFrontend.hooks.addAction('frontend/element_ready/slick_slider.default', mainslider);
        elementorFrontend.hooks.addAction('frontend/element_ready/carleader_product_list.default', prod_slider);
    });

    $(".btn_calculate").on('click', function(event) {

        var vehicle_price = parseFloat($(".vehicle_price").val());
        var down_payment = parseFloat($(".down_payment").val());

        var interest_rate = parseFloat($(".interest_rate").val());
        interest_rate = interest_rate / 1200;

        var period = parseFloat($(".period").val());


        var monthly = 0;
        var interest = 0;
        var total = 0;

        monthly = (vehicle_price - down_payment) * interest_rate * Math.pow(1 + interest_rate, period);
        monthly = monthly / ((Math.pow(1 + interest_rate, period)) - 1);
        monthly = monthly.toFixed(2);

        total = down_payment + (monthly * period);
        total = total.toFixed(2);


        interest = total - vehicle_price;
        interest = interest.toFixed(2);

        if (ajax_object.currency_pos == 'before') {
            $(".monthly").text(ajax_object.currency + Math.round(monthly));
            $(".interest").text(ajax_object.currency + interest);
            $(".total").text(ajax_object.currency + total);
        } else if (ajax_object.currency_pos == 'after') {
            $(".monthly").text(ajax_object.currency + Math.round(monthly));
            $(".interest").text(interest + ajax_object.currency);
            $(".total").text(total + ajax_object.currency);
        } else if (ajax_object.currency_pos == 'after_space') {
            $(".monthly").text(ajax_object.currency + Math.round(monthly));
            $(".interest").text(interest + " " + ajax_object.currency);
            $(".total").text(total + " " + ajax_object.currency);
        } else if (ajax_object.currency_pos == 'before_space') {
            $(".monthly").text(ajax_object.currency + Math.round(monthly));
            $(".interest").text(ajax_object.currency + " " + interest);
            $(".total").text(ajax_object.currency + " " + total);
        }

        $('.wrapper-data-output').addClass('calculator-result-show');
    });

})(jQuery);