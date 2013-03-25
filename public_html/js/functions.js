$(function() {
    $(document).on('focusin', '.field, textarea', function() {
        if (this.title == this.value) {
            this.value = '';
        }
    }).on('focusout', '.field, textarea', function() {
        if (this.value == '') {
            this.value = this.title;
        }
    });

    var Page = (function() {

        var $navArrows = $('#nav-arrows').hide(),
                $shadow = $('#shadow').hide(),
                slicebox = $('#sb-slider').slicebox({
            onReady: function() {

                $navArrows.show();
                $shadow.show();

            },
            orientation: 'r',
            cuboidsRandom: true,
            disperseFactor: 30
        }),
                init = function() {

            initEvents();

        },
                initEvents = function() {

            // add navigation events
            $navArrows.children(':first').on('click', function() {

                slicebox.next();
                return false;

            });

            $navArrows.children(':last').on('click', function() {

                slicebox.previous();
                return false;

            });

        };

        return {init: init};

    })();

    Page.init();

});
//$(window).load(function() {
//	$('.flexslider').flexslider({
//		animation: "slide",
//		slideshowSpeed: 5000,
//		directionNav: false,
//		controlNav: false,
//		animationDuration: 900
//	});
//});
//
//    $('.carousel').carousel({
//    interval: 2000
//    })