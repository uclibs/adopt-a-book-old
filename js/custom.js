//STYLE SWITICHING SCRIPT
	$(document).ready(function () {
		$(".color-scheme a").click(function () {
			$('link.alt').attr('href', $(this).attr('rel'));
			return false;
		});
		imgPathStart = "images/pattern/";
		imgPathEnd = new Array("pattern0.png","pattern1.png","pattern2.png","pattern3.png","pattern4.png","pattern5.png","pattern6.png","pattern7.png","pattern8.png","pattern9.png");
	
		$(".background-selector li img").click(function() {
			backgroundNumber = $(this).attr("data-nr");
			$("body").css({background:"url('"+imgPathStart+imgPathEnd[backgroundNumber]+"')"});
		});
	});
	
	$(document).ready(function () {		
		$('.switch-button').click(function () {	
			if ($(this).is('.open')) {
				$(this).addClass('closed');
				$(this).removeClass('open');
				$('.styleswitcher').animate({
					'left': '-222px'
				});
			} else {
				$(this).addClass('open');
				$(this).removeClass('closed');
				$('.styleswitcher').animate({
					'left': '0px'
				});
			}	
		});
	});

//Menu
jQuery(document).ready(function($){
	
	$('.social-icons ul li a, .tooltips').tooltip();
	$('.carousel').carousel({
		interval: 2000,
		pause: "hover",
	});
	$('#myCollapsible').collapse({
    	toggle: false
    })
	
	$('.sf-menu').superfish({ 
		delay:       500,                            // one second delay on mouseout 
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
		speed:       'fast',                          // faster animation speed
		autoArrows:  false,                           // disable generation of arrow mark-up 
		dropShadows: false,                           // disable drop shadows 
	});

	$('#nav').tinyNav({
		active: 'selected',
		label: ''
	});
	/*Portfolio Carousel*/
	if($(".portfolio-carousel").length){
		$('ul.portfolio-carousel').jcarousel({ scroll: 1 });
	}
	
	/*Clients Carousel*/
	if($(".clients-carousel").length){
		$('ul.clients-carousel').jcarousel({ scroll: 1 });
	}
	
	// FitVids for fluid width videos
	if( $.fn.fitVids ) {
		$('.media.video').fitVids();
	}

	// Tweets Widget
	if( $.fn.tweet ) {
		$('.tweet-stream').tweet({
			username: "mannatstudio",
			modpath: 'twitter/',
			count: 1,
			template: "{text}{time}",
			loading_text: "loading tweets..."
		});
	}

	// Flickr Feed Widget
	if( $.fn.jflickrfeed ) {
		$('.flickr-stream ul').jflickrfeed({
			qstrings: {
				id: '52617155@N08'
			}, 
			limit: 9, 
			itemTemplate: '<li><a href="{{link}}" title="{{title}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
		});
	}
	// Revolution Slider
		if( $.fn.revolution ) {

			$( '.fullwidthbanner' ).revolution({
				delay: 6000, 
				startheight: 550, 
				fullWidth: 'on', 
				shadow: 0, 
				navigationArrows: 'verticalcentered', 
				navigationStyle: 'none'
			});

		}
	
	var $container = $('#content');
		$container.isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});
		$('#portolfio-filter a').click(function () {
			$('#portolfio-filter a').removeClass('active');
			$(this).addClass('active');
			return false;
		});
		$('#portolfio-filter a').click(function () {
			var selector = $(this).attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
	
				}
			});
			return false;
		});
	
	
	$(".social-icons ul li a").css({"opacity": "0.7"});
		$(".social-icons ul li a").hover(function() {
			$(this).stop().animate({opacity: 1, top: "-5px",}, 100 );
		},
		function() {
			$(this).stop().animate({opacity: 0.7, top: "0",}, 100 );
	});
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme:'light_square', 
		autoplay_slideshow: false, 
		overlay_gallery: false, 
		show_title: false,
	});
	
	// hide #back-top first
	$("#back-top").hide();		
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});	
		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});	
	
	//=================================== TABS AND TOGGLE ===================================//
	//jQuery tab
	jQuery(".tab-content").hide(); //Hide all content
	jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
	jQuery(".tab-content:first").show(); //Show first tab content
	//On Click Event
	jQuery("ul.tabs li").click(function() {
		jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(".tab-content").hide(); //Hide all tab content
		var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		jQuery(activeTab).fadeIn(200); //Fade in the active content
		return false;
	});
	
	//jQuery toggle
	jQuery(".toggle_container").hide();
	jQuery("h2.trigger").click(function(){
		jQuery(this).toggleClass("active").next().slideToggle("slow");
	});
	
	
	// Accordion
	jQuery("ul.ts-accordion li").each(function(){
		if(jQuery(this).index() > 0){
			jQuery(this).children(".accordion-content").css('display','none');
		}else{
			jQuery(this).find(".accordion-title").addClass('active');
		}
		
				
		jQuery(this).children(".accordion-title").bind("click", function(){
			jQuery(this).addClass(function(){
				if(jQuery(this).hasClass("active")) return "";
				return "active";
			});
			jQuery(this).siblings(".accordion-content").slideDown();
			jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
			jQuery(this).parent().siblings("li").find(".active").removeClass("active");
		});
	});
	
	// Search Field Text
	$(function(){
		$('input[placeholder]').each(function(){
			var $placeInput = $(this);			
			if( 'placeholder' in document.createElement('input') ) {
				var placeholder = true;
			}
			else {
				var placeholder = false;
				$placeInput.val( $placeInput.attr('placeholder') );
			}			
			if( !placeholder ) {
				$placeInput.focusin(function(){
					if( $placeInput.val() === $placeInput.attr('placeholder') ) {				
						$placeInput.val('');				
					}
				})
				.focusout(function(){
					if( $placeInput.val() === '' ) {
						$placeInput.val( $placeInput.attr('placeholder') );
					}
				});
			}		
		});
	});
});

$(document).ready(function(){
	jQuery("#contact_form").validate({
		meta: "validate",
		submitHandler: function (form) {
			
			var s_name=$("#name").val();
			var s_lastname=$("#lastname").val();
			var s_email=$("#email").val();
			var s_phone=$("#phone").val();
			var s_comment=$("#comment").val();
			$.post("contact1.php",{name:s_name,lastname:s_lastname,email:s_email,phone:s_phone,comment:s_comment},
			function(result){
			  $('#sucessmessage').append(result);
			});
			$('#contact_form').hide();
			return false;
		},
		/* */
		rules: {
			name: "required",
			
			lastname: "required",
			// simple rule, converted to {required:true}
			email: { // compound rule
				required: true,
				email: true
			},
			phone: {
				required: true,
			},
			comment: {
				required: true
			}
		},
		messages: {
			name: "Please enter your name.",
			lastname: "Please enter your last name.",
			email: {
				required: "Please enter email.",
				email: "Please enter valid email"
			},
			phone: "Please enter a phone.",
			comment: "Please enter a comment."
		},
	}); /*========================================*/
});


