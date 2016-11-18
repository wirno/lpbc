window.onload = function () {
	$(document).ready(function() {
 
		// HEADER
		// Dropdown language
		$('.dropdown-wrapper').click(function() {
			$(this).children('.dropdown-button').toggleClass('active');
		});

		// SLIDERS HOME
		var swiper2 = new Swiper('#castles-une .swiper-container', {
			slidesPerView: 3,
			centeredSlides: true,
			nextButton: '#castles-une .button-next',
			slidesOffsetBefore: -330,
			prevButton: '#castles-une .button-prev',
			spaceBetween: 43
		});

		var swiper3 = new Swiper('#castle-events-map .swiper-container', {
			slidesPerView: 3,
			centeredSlides: true,
			nextButton: '#castles-une .button-next',
			slidesOffsetBefore: -330,
			prevButton: '#castles-une .button-prev',
			spaceBetween: 43
		});

		// SINGLE CHATEAU
		// Hover Map
		$('.map-container').mouseover(function() {
			$(this).addClass('active');
		}).mouseout(function() {
			if($(this > '.active').hasClass('active')) {

			} else {
				$(this).removeClass('active');
			}
		});

		// SEARCH
		// Search filters
		$('#Container').mixItUp({
			controls: {
				activeClass: 'active',
				toggleFilterButtons: true,
				toggleLogic: 'and'
			},
			pagination: {
				generatePagers: true
			}
		});
		// Hover results
		$('.mix').hover(
			function() {
				event.preventDefault();
				$(this).find($('.main')).stop().addClass('active');
				$(this).find($('.hover')).stop().fadeIn(500);
			}, function() {
				event.preventDefault();
				$(this).find($('.main')).stop().removeClass('active');
				$(this).find($('.hover')).stop().fadeOut(150);
			});
	    // Dropdown filters
	    $('.filter-button').click(function() {
	    	$(this).next().stop().fadeToggle(400);
	    });

	    // Sticky filters
	    $(".filter-sticker").sticky({topSpacing:52, bottomSpacing:1210});
	    $('.filter-sticker').on('sticky-start', function() {
	    	var state = $('#Container').mixItUp('getState');
	    	$('#Container').on('mixEnd', function(e, state){
	    		$(".filter-sticker").sticky({topSpacing:52, bottomSpacing:1210});
	    	});
	    	if(state.$show.length === 0) {
	    		$(".filter-sticker").unstick();
	    	}
	    });

	    // Sticky filter blog
	    $('#blog-Container').mixItUp({
			controls: {
				activeClass: 'active',
				toggleFilterButtons: true,
				toggleLogic: 'and'
			},
			pagination: {
				generatePagers: true
			}
		});
	    $(".filter-sticker-blog").sticky({topSpacing:52, bottomSpacing:643});
	    $('.filter-sticker-blog').on('sticky-start', function() {
	    	var state = $('#blog-Container').mixItUp('getState');
	    	$('#blog-Container').on('mixEnd', function(e, state){
	    		$(".filter-sticker-blog").sticky({topSpacing:52, bottomSpacing:643});
	    	});
	    	if(state.$show.length === 0) {
	    		$(".filter-sticker-blog").unstick();
	    	}
	    });

	    // Map régions
	    $('.locations').hover(function() {
	    	var splitter = $(this).attr('class').split(' ')[1];
	    	var splitter = '.' + splitter + '-description';

	    	if($(splitter).hasClass('active')) {
	    		
	    	} else {
	    		$('.location-description.active').stop().fadeOut(400, function() {
	    			$(this).removeClass('active');

	    			$(splitter).stop().fadeIn().addClass('active');
	    		});
	    	}	    	
	    });

		// Timeline
		var items = document.querySelectorAll(".timeline li");

		function isElementInViewport(el) {
			var rect = el.getBoundingClientRect();
			return (
				rect.top >= 0 &&
				rect.left >= 0 &&
				rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
				rect.right <= (window.innerWidth || document.documentElement.clientWidth)
				);
		}

		function callbackFunc() {
			for (var i = 0; i < items.length; i++) {
				if (isElementInViewport(items[i])) {
					items[i].classList.add("in-view");
				}
			}
		}

		window.addEventListener("load", callbackFunc);
		window.addEventListener("resize", callbackFunc);
		window.addEventListener("scroll", callbackFunc);

		// SLIDER CASTLE
		var swiper = new Swiper('#castle-events .swiper-container', {
			slidesPerView: 4,
			centeredSlides: true,
			nextButton: '#castle-events .button-next',
			slidesOffsetBefore: -388,
			prevButton: '#castle-events .button-prev',
			spaceBetween: 43
		});

		var swiper = new Swiper('#castle-museums .swiper-container', {
			slidesPerView: 4,
			centeredSlides: true,
			nextButton: '#castle-museums .button-next',
			slidesOffsetBefore: -388,
			prevButton: '#castle-museums .button-prev',
			spaceBetween: 43
		});

		var swiper = new Swiper('#castle-similar .swiper-container', {
			slidesPerView: 4,
			centeredSlides: true,
			nextButton: '#castle-similar .button-next',
			slidesOffsetBefore: -388,
			prevButton: '#castle-similar .button-prev',
			spaceBetween: 43
		});

	    // EVENT CARD
	    $('.event-slide').hover(
	    	function() {
	    		event.preventDefault();
	    		$(this).find($('.main')).stop().addClass('active');
	    		$(this).find($('.hover')).stop().fadeIn(500);
	    	}, function() {
	    		event.preventDefault();
	    		$(this).find($('.main')).stop().removeClass('active');
	    		$(this).find($('.hover')).stop().fadeOut(150);
	    	});

	    // Connection modal
	    $('.input-connection').blur(function() {
	    	var $this = $(this);
	    	if ($this.val())
	    		$this.addClass('used');
	    	else
	    		$this.removeClass('used');
	    });

	    // Chrome autofill + FORM
	    $('.button-form').click(function() {
	    	$(this).parent().prev('form').find('.button-hidden').click();
	    });

	    if ($.browser) {
	    	$('input[name="password"]').attr('autocomplete', 'off');
	    }

	    var $ripples = $('.ripples');

	    $ripples.on('click.Ripples', function(e) {

	    	var $this = $(this);
	    	var $offset = $this.parent().offset();
	    	var $circle = $this.find('.ripplesCircle');

	    	var x = e.pageX - $offset.left;
	    	var y = e.pageY - $offset.top;

	    	$circle.css({
	    		top: y + 'px',
	    		left: x + 'px'
	    	});

	    	$this.addClass('is-active');

	    });

	    // Dashboard
	    $('.search-menu > .btn-infos').on('click', function() {
	    	$('.dashboard-btn').removeClass('active');
	    	$(this).addClass('active');

	    	$('.dashboard-content.active').fadeOut(400, function() {
	    		$(this).removeClass('active');
	    		$('.dashboard-infos').fadeIn(400).addClass('active');
	    	});
	    });
	    $('.search-menu > .btn-fav').on('click', function() {
	    	$('.dashboard-btn').removeClass('active');
	    	$(this).addClass('active');

	    	$('.dashboard-content.active').fadeOut(400, function() {
	    		$(this).removeClass('active');
	    		$('.dashboard-fav').fadeIn(400).addClass('active');
	    		$('#dashboard-Container1').mixItUp({
	    			controls: {
	    				activeClass: 'active',
	    				toggleFilterButtons: true,
	    				toggleLogic: 'and'
	    			},
	    			pagination: {
	    				generatePagers: true
	    			}
	    		});
	    	});
	    });
	    $('.search-menu > .btn-wishlist').on('click', function() {
	    	$('.dashboard-btn').removeClass('active');
	    	$(this).addClass('active');

	    	$('.dashboard-content.active').fadeOut(400, function() {
	    		$(this).removeClass('active');
	    		$('.dashboard-wishlist').fadeIn(400).addClass('active');
	    		$('#dashboard-Container2').mixItUp({
	    			controls: {
	    				activeClass: 'active',
	    				toggleFilterButtons: true,
	    				toggleLogic: 'and'
	    			},
	    			pagination: {
	    				generatePagers: true
	    			}
	    		});
	    	});
	    });
	    $('.fa-pencil-square-o').click(function() {
	    	var $input = $(this).next();
	    	$input[0].readOnly = false;
	    	$input.focus();
	    });
	});
}