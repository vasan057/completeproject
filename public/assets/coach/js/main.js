;(function () {
	
	'use strict';

var count =0;

$('.dexel-audio-card').find('.dexel-audio-backpanel .dexel-audio-list').each(function(){

	$(this).find('.jp-jplayer').attr('id', 'jquery_jplayer_' + count);
	$(this).find('.jp-audio').attr('id', 'jp_container_' + count);

	count++;
});



// Navigation/ Menu

 var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  }); 

// Flip Card Dynamic Height
	var AdjustCardHeight = function() {
		var FlipcardHeight = $('.dexel-audio-grp').outerHeight(true);
		$('.dexel-flipcard').css('height', FlipcardHeight );
};
// Animations

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};

// Go to the TOP of the Page
	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	var counterWayPoint = function() {
		if ($('#dexel-counter').length > 0 ) {
			$('#dexel-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

// Flip Card
	var flipCard = function(){

			$('.dexel-flipper').on('click', function(){
				if($(this).parents('.dexel-flipcard').hasClass('flipped')){
					$(this).parents('.dexel-flipcard').removeClass('flipped');
					
				}
				else{
					var parent_div = $(this).parents('.dexel-flipcard');
					parent_div.addClass('flipped');
					if(window.is_play == 'no')
					{
						parent_div.find('.play_audio:first').click();
					}
				}
				
			});
	};

	
	$(function(){
		contentWayPoint();
		goToTop();
		flipCard();
		counterWayPoint();
		AdjustCardHeight();
	});

		$("#adm-left-nav").hover(function(){
          $("#adm-left-nav").toggleClass("adm-nav-full");
        });


}());

$(document).ajaxStart(function() {
	$('#site_error').hide();
	$('#site_loding').show();
});
$(document).ajaxError(function(event, xhr, settings, thrownError) {
	$('#site_error').show();
});
$(document).ajaxComplete(function(event, xhr, settings) {
	$('#site_loding').hide();
});
$(document).on('click', '#close_site_error', function(event) {
	event.preventDefault();
	$('#site_error').hide();
});
window.onbeforeunload = function(e) {
    $('#site_loding').show();
};