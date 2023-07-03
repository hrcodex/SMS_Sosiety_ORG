(function($) {
"use strict";
	
	
	
/* scroll sections */
var visible = false;
var automatic_scroll_down = true; 
$('.nav-top>ul a,.fixed-up-arrow a').on('click',function(e){
	var idPlace = $(this).attr('href');
	if(!(idPlace.substring(0, 1)=='#')||!$(idPlace).length){	
		
		return true;
	}
	
	e.preventDefault();
	if(idPlace=="#home"){
		idPlace = "body";
	}
	visible = false;
	if($(idPlace).length && !visible){
		visible = true
		disable_scroll();
		var distants = 0;
		if ($('#header').hasClass('header-fixed')){
			var distants = -70;
		}
		var position = $(idPlace).offset().top + distants;
		$('html, body').animate({scrollTop: position
		}, 0, 'easeOutExpo').promise().done(function(){
		enable_scroll();
		});
	}
	return false;
});

var keys = [37, 38, 39, 40];
function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
	  e.preventDefault();
  e.returnValue = false;  
}

function keydown(e) {
	for (var i = keys.length; i--;) {
		if (e.keyCode === keys[i]) {
			preventDefault(e);
			return;
		}
	}
}

function wheel(e) {
  preventDefault(e);
}

function disable_scroll() {
  if (window.addEventListener) {
	  window.addEventListener('DOMMouseScroll', wheel, false);
  }
  window.onmousewheel = document.onmousewheel = wheel;
  document.onkeydown = keydown;
}

function enable_scroll() {
	if (window.removeEventListener) {
		window.removeEventListener('DOMMouseScroll', wheel, false);
	}
	window.onmousewheel = document.onmousewheel = document.onkeydown = null;  
}
	
	
	
	
	
	
	
	
	
	
	
//Accordion
function Accordion() {
	$(".accordion-box").on('click', '.accord-btn', function() {
	
		if($(this).hasClass('active')!=true){
		$('.accordion .accord-btn').removeClass('active');			
		}
		
		if ($(this).next('.accord-content').is(':visible')){
			$(this).removeClass('active');
			$(this).next('.accord-content').slideUp(700);
		}else{
			$(this).addClass('active');
			$('.accordion .accord-content').slideUp(700);
			$(this).next('.accord-content').slideDown(700);	
		}
	});
}
	
	
	
/* carousel */
function carousel_items(){

	var $window = $(window), flexslider;
	
	function getGridSize1() {
		var colu;
		if($(window).width() <= 585){
			 colu = 1
		}else if($(window).width() <= 880){
			colu = 2;
		}else{
			colu = 2;
		}
		return colu;
	}
	
	
	function getGridSize2() {
		if($('.horizontal-carousel').hasClass('carousel-bottom')){
			var colu;
			if($(window).width() <= 480){
			 colu = 1
			}else if($(window).width() <= 880){
			colu = 2;
			}else{
			colu = 3;
			}
			return colu;
		}else{
			var colu;

			if($(window).width() <= 480){
			 colu = 1
			}else if($(window).width() <= 880){
			colu = 3;
			}else{
			colu = 4;
			}
			return colu;
		}
		
	}
	
	$window.load(function() {
	    
		if($('.flexslider-carousel').length){
			the_events_c();
		}		
		if($('.horizontal-carousel').length){
			the_horizontal_c();			
		}
	});
	
	
	var j_width;
	var mainslider_j;
	function the_events_c(){
		var elca = $('.flexslider-carousel');
		j_width = elca.width()/getGridSize1();
		var size = '';
		if(j_width<585){
			size = 'x1';
		}else if(j_width<830){
			size = 'x2';
		}else{
			size = 'x3';
		}
		
		$('.flexslider-carousel').addClass('hc-size-'+size);
		
		$('.flexslider-carousel').flexslider({
			animation: "slide",
			animationLoop: false,
			slideshow: false,
			itemWidth: j_width,
			itemMargin: 0,
			controlNav:true,
			directionNav: true, 
			prevText: "<i class='fa fa-arrow-left'></i>",
			nextText: "<i class='fa fa-arrow-right'></i>",   
			//minItems: getGridSize1(), // use function to pull in initial value
			//maxItems: getGridSize1(), // use function to pull in initial value
			//itemWidth: 585,
			start : function(slider){
				mainslider_j = slider;
				controls_position();
	
			},after: function(){

				$('.flexslider-carousel .slides>li').width(j_width);
				$('.flexslider-carousel .slides>li').css('min-width',j_width);
				
			}
		});
	}
	
	function controls_position(){
		var i_width = $('.flexslider-carousel .flex-control-nav li').width();
		var i_number = $('.flexslider-carousel .flex-control-nav li').length;
		var ii_width = i_width*i_number;
		$('.flexslider-carousel .flex-nav-prev a').css('margin-right',(ii_width+6));
		$('.flexslider-carousel .flex-nav-next a').css('margin-left',(ii_width+6));		
	}
	/* Horizontal carousel slider at bottom page */
	var mainslider;
	var i_width;
	function the_horizontal_c(){
		var elca = $('.horizontal-carousel');
		i_width = elca.width()/getGridSize2();
		var size = '';
		if(i_width<274){
			size = 'x1';
		}else if(i_width<330){
			size = 'x2';
		}else{
			size = 'x3';
		}
		
		$('.horizontal-carousel').addClass('hc-size-'+size);
		$('.horizontal-carousel').flexslider({
			animation: "slide",
			animationLoop: false,
			slideshow: false,
			itemWidth: i_width,
			itemMargin: 0,
			controlNav:true,
			directionNav: true,
			prevText: "<i class='fa fa-arrow-left'></i> Prev",
			nextText: "Next <i class='fa fa-arrow-right'></i>",   
			start: function(slider) {
			 mainslider = slider;
			}
		});
	}
	
	$(window).on("resize", function() {
		if(typeof mainslider !== 'undefined'){
			mainslider.computedW = i_width;
			
			mainslider.setProps();
		}
		
		if(typeof mainslider_j !== 'undefined'){
			mainslider_j.computedW = i_width;
			
			mainslider_j.setProps();
			controls_position();
			$('.flexslider-carousel .slides>li').css('min-width',j_width);
		}
	});

	
	
	/* normal flexlider */
	if($('.tweets-slider').length){
		$('.tweets-slider').flexslider({
		animation: "slide"
		})
	}
	
	if($('.slider-main').length){
	$('.slider-main').flexslider({
		//slideshowSpeed: 30000,
		start : function(){
			$('.slider-main .flex-prev').html('<i class="fa fa-arrow-up"></i>');
			$('.slider-main .flex-next').html('<i class="fa fa-arrow-down"></i>');
			$('.slider-main ol.flex-control-nav.flex-control-paging').appendTo('.controls-main');
			$('.slider-main .flex-direction-nav li').appendTo('.arrows-main');		
		},
		after : function(slide){
			$('.text-slider li').removeClass('active');
			$('.text-slider li').eq(slide.currentSlide).addClass('active');
		}
	});
	}
	
	if($('.gallery-widget').length){
		$('.gallery-widget').flexslider({
		animation: "slide",
		pauseOnHover: true,
		  prevText: "<i class='fa fa-arrow-left'></i>",//String: Set the text for the "previous" directionNav item
					  nextText: "<i class='fa fa-arrow-right'></i>",   
		})
	}
	
	if($('.simple-image-slider').length){
		$('.simple-image-slider').flexslider({
		animation: "slide",
		slideshowSpeed :'50000',
		pauseOnHover: true,
		  prevText: "<i class='fa fa-chevron-left'></i><span>Prev</span>",//String: Set the text for the "previous" directionNav item
					  nextText: "<span>Next</span><i class='fa fa-chevron-right'></i>",   
		})
	}	
}




/* Load theme functions */
function functions_theme(){

	/* Flexslider uses */
	if($('.flexslider-testimonial').length){
	$('.flexslider-testimonial').flexslider({
		animation: "slide",
		pauseOnHover: true,
		//slideshow:false
	});
	 }
	$('#gallery-section .gallery-filter').appendTo('#gallery-section .container-title')
	$('.gallery-page .gallery-filter').appendTo('.block-title')
	 
	
	
	$('.text-field input,.textarea-field textarea').on('focus',function(){
		$(this).parent().parent().find('.fa').css('color','#A7D24A')
	});
	$('.text-field input,.textarea-field textarea').on('blur',function(){
		$(this).parent().parent().find('.fa').css('color','#E3E3E3')
	});
	
	$('.comment-area .form-control').on('focus',function(){
		$(this).next().css('color','#A7D24A')
	});
	$('.comment-area .form-control').on('blur',function(){
		$(this).next().css('color','#E3E3E3')
	});
	
	
	
	$('.comment-area .form-control').on('blur',function(){
		var inputcomment= $(this).val();
		if(inputcomment!=''){
			if($(this).attr('type')=='email'){
				if(isValidEmailAddress(inputcomment)){
					$(this).parent().find('.required-icon').css('opacity','0')
				}else{
					$(this).parent().find('.required-icon').css('opacity','1')
				}
			}else{
				$(this).parent().find('.required-icon').css('opacity','0')
			}
		
		}else{
			$(this).parent().find('.required-icon').css('opacity','1')
		}
	});
	
	
	
	/* Progress bar animated */
	if($('.progress-bar').length){
		$('.progress-bar').appear();
		$(document.body).one('appear', '.progress-bar', function(e, $affected) {
			var value_progress = $(this).data('value');
			//$(this).animate({'width':0},2000);
			$(this).css({'width':value_progress+'%'});
		});
	}
	
	
	if($('.project-info-f .yellow-bar').length){
		$('.project-info-f .yellow-bar').appear();
		$(document.body).on('appear', '.project-info-f .yellow-bar', function(e, $affected) {
			var value_progress = $(this).data('value');
			//$(this).animate({'width':0},2000);
			$(this).css({'width':value_progress+'%'});
		});
		
		$('.slides.double-box-w li+li~li .project-box').each(function(){
			var thebar = $(this).find('.project-info-f .yellow-bar');
			var value_progress = thebar.data('value');
			thebar.css({'width':value_progress+'%'});
		});
	}
	
	
	
	/* --------------------------------------------
	 Pretty Photo
	-------------------------------------------- */	
	if($(".magnific-popup").length){
		$(".magnific-popup").magnificPopup({
			// delegate: '.magnific-popup', // child items selector, by clicking on it popup will open
			type: 'image',
			gallery: {
			  enabled: true
			},
		});
	}
	
	
	//---------------   entrance animations ----------------------//
	if($('.animate').length){
		$('.animate').appear();
		$(document.body).on('appear', '.animate', function(e, $affected) {
			var fadeDelayAttr;
			var fadeDelay;
			if ($(this).data("delay")) {
				fadeDelayAttr = $(this).data("delay")
				fadeDelay = fadeDelayAttr;				
			} else {
				fadeDelay = 200;
			}
			$(this).delay(fadeDelay).queue(function(){
				if($(this).children('.video-container').length){
					var $convi = $(this);
					
					setTimeout( function(){ 
						
						$convi.removeClass('animate animated');
					}  , 2000 );
				}
				
				$(this).addClass('animated').clearQueue();
			});

			
		});		
	}
	
	/* arrow up */
	if($('.fixed-up-arrow').length){
		$('.fixed-up-arrow').appear();
		$(document.body).on('appear', '.fixed-up-arrow', function(e, $affected) {			
			$(this).queue(function(){
				$(this).addClass('visible').clearQueue();
			});
		});
		$(document.body).on('disappear', '.fixed-up-arrow', function(e, $affected) {			
			$(this).queue(function(){
				$(this).removeClass('visible').clearQueue();
			});
		});
	}
	
	/* widgets */
	
	$('.sidebar ul .children').parent().children('a').on('click',function(e){
		$(this).parent().children('.children').toggle(400);
		e.stopImmediatePropagation();
		return false;
	});
	
	
	
	/* hide/show breadcrumbs */
	
	$('.hide-bread').on('click',function(){
		$('.breadcrumbs ul').toggle('slow');
		if($(this).html()=='<i class="fa fa-chevron-up"></i> Hide'){
			$(this).html('<i class="fa fa-chevron-down"></i> Show');
		}else{
			$(this).html('<i class="fa fa-chevron-up"></i> Hide');
		}
	});
	
	
	
	
	/* Height of post content in menu in nav3 */
	
	$('#nav-top-3 >ul>li').on('mouseover', function() {
		var t=0;	
		$(this).find('.content-menu').each(function(){
			var $this = $(this);
			if ( $this.outerHeight() > t ) {
				
				t=$this.outerHeight();
			}
		});
		$(this).children('ul').css('height',t);
	})
	
	
	
	
	/* navigation style 3 functions */
	$('#nav-top-3 >ul>li>ul>li>ul>li').on('mouseover', function() {
		var li = $(this);
		li.parent('ul').children('li').removeClass('active');
		li.addClass('active');
		$(this).find('.recent-post .arrow-right').each(function(){
			if(!$(this).hasClass('hcalculated')){
				var line_height = $(this).parent().outerHeight();
				$(this).css('line-height',(line_height-16)+'px');
				$(this).addClass('hcalculated');
			}
		});
	})
	
	
	/* Pricing widget functions */
	$('.price_slider').each(function(){
		var min_price= $(this).data('min');
		var max_price= $(this).data('max');
		var price_a = $(this).data('price_a');
		var price_b = $(this).data('price_b');	
	
		$(this).slider({
			range: true,
			min: min_price,
			max: max_price,
			values: [ price_a, price_b ],
			slide: function( event, ui ) {
				$(this).parent().find( ".price_label .from" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
	
		$(this).parent().find( ".price_label .from" ).html( "$" + 
		    $( this ).slider( "values", 0 ) + " - $" + $( this).slider( "values", 1 ) );
	});
	
	
	/* Rating */
	$('.rating-option a').on('click',function(e){
	  $('.rating-option').removeClass('active');
	  $('.rating-input').val('Your Rating: ');
	  $(this).parent().addClass('active');
	  
	  return false;
	});
	
	
	/* woocommerce product tabs */
	$('.woocommerce-tabs .tabs .active').each(function(){
		var panel = $(this).find('a').attr('href');
		$(panel).show();
	})
	
	
	$('.woocommerce-tabs .tabs a').on('click',function(){
		$('.woocommerce-tabs .tabs li').removeClass('active');
		$(this).parent().addClass('active');
		var panel = $(this).attr('href');
		$('.woocommerce-tabs .panel').hide();
		$(panel).show();
		return false;
	})
		
	$('.payment_methods .input-radio').change(function(){
		$('.payment_box').hide('normal');
		$('.'+$(this).attr('id')).show('normal');
	});
	
	$('a.showlogin').on('click',function(){
		$('form.login').toggle('normal');
		return false;
	});
	$('a.showcoupon').on('click',function(){
		$('form.checkout_coupon').toggle('normal');
		return false;
	})
	$('#ship-to-different-address-checkbox').on('click',function () {
		if($(this).is(':checked')){
			$('.shipping_address').show('normal');
		}else{
			$('.shipping_address').hide('normal');
		}
	});
	
	$('#createaccount').on('click',function () {
		if($(this).is(':checked')){
			$('div.create-account').show('normal');
		}else{
			$('div.create-account').hide('normal');
		}
	});
	$('a.shipping-calculator-button').on('click',function(){
		$('.shipping-calculator-form').toggle('normal');
		return false;
	});
	
	$('.nav-top>ul li>a').on('click',function(){
		if(viewport()<769){
		
			if($(this).next('ul').length){
			
				$(this).next('ul').toggleClass('active');
				return false;
			}		
		}
	});
	
	
	$('.show-more-contact a').on('click',function(){		
		$('.map-section .iframe-w, .contact-info-box').toggle('normal');
		$('.map-section .iframe-w, .contact-info-box').toggleClass('map-inactive');
		return false;
	});
	
	
}

/* get width of window viewport */
function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return (e[ a+'Width' ]);
}


/* arrow rights */
function height_arrow_right(){
    $('.blog-item-right').each(function(){
		var wrap = $(this).outerHeight() - $(this).find('.blog-item-date').outerHeight(true)-9;
		
		$(this).find('.arrow-right').css('line-height',wrap+'px');
		
	});
	$('.blog-simple .blog-item-photo').each(function(){
		var wrap = $(this).parent().outerHeight() - $(this).find('.link-read-more-w').outerHeight(true);
		
		$(this).find('span.fa').css('line-height',wrap+'px');		
	});
	
	$('.blogs-wrapper .blog-item-photo').each(function(){
		var wrap = $(this).outerHeight() - $(this).find('.link-read-more-w').outerHeight(true);
		
		$(this).find('span.fa').css('line-height',wrap+'px');
	});	
}

/* count to, animated */
function countTo(){
	if($('.fact-number').length){
		$('.fact-number').appear();
		$(document.body).one('appear', '.fact-number', function(e, $affected) {		
			$('.fact-number').countTo({
				refreshInterval: 100,speed: 700,
			});
		});
	}
}

/* Responsive design functions */
function functions_responsive(){
	var header_w = $('#header>.container').width();
	var logo_w = $('#logo').outerWidth();
	var nav_w = $('.nav-top').outerWidth();
	
	if((logo_w + nav_w) > header_w){
		$('#header').addClass('centered');
	}else{
		$('#header').removeClass('centered');
	}
	
	
	if(viewport()<480){
		var con_w = $('.header>.container').width();		
		var btn_w = $('button.navbar-toggle').outerWidth();
		if((img_w + btn_w) > con_w){
			$('#logo img').css({'max-width':(con_w-btn_w-10)});
		}else{
			$('#logo img').css({'max-width':'none'});
		}
	
	
		
	}
	
	$('.recent-post .arrow-right').each(function(){
		var line_height = $(this).parent().outerHeight();
		$(this).css('line-height',(line_height-16)+'px');
	})
	
	height_arrow_right();
	setTimeout(function(){
		height_arrow_right();
	},300);
	
	
	

	/* Height blocks in volunteers row */
	
		$('.row-volunteers>div').each(function() {
			if(viewport()<1200 && viewport()>992){
				var t=0;
				
				if ( $(this).outerHeight() > t ) {
					t=$(this).outerHeight();
				}
				
				$('.row-volunteers>div').css('height',t);
			}else{
				$('.row-volunteers>div').css('height','');
			}
		});
		
		
		$('.text-slider li')
		
		
	
}


/* Load functions on document ready */
$(document).ready(function() {
		Accordion();
		carousel_items();
		countTo();
		functions_theme();
		
});


/* Load functions on document loaded */
var img_w = $('#logo img').width();
$(window).load(function(){
	functions_responsive();
	
	$(window).on('resize', function(){
		functions_responsive();
	});
	
	
	
	
	/* isotope gallery function */
    var $container = $('.gallery-container');
	
	if($container.length){
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
	}
	
	
	
	
	/* gallery filter */
    $('.gallery-filter a').on('click',function(){
        $('.gallery-filter .current').removeClass('current');
        $(this).addClass('current');
		
        var selector = $(this).attr('data-filter');
		if($container.length){
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
		 }
         return false;
    }); 
	
	
	/* blog mansory */
	if($('.blogs-container').length){
	var $blogs_container = $('.blogs-container');
	$blogs_container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
	}
	
	
	/* contact forms animations */
	$('#contactform').submit(function(){
		var nopass = false;
		$('.comment-area .required .form-control').each(function(){
			var inputcomment= $(this).val();
			if(inputcomment!=''){
				if($(this).attr('type')=='email'){
					if(isValidEmailAddress(inputcomment)){
						$(this).parent().find('.required-icon').css('opacity','0')
					}else{
						$(this).parent().find('.required-icon').css('opacity','1');
						nopass = true;
					}
				}else{
					$(this).parent().find('.required-icon').css('opacity','0')
				}
			
			}else{
				$(this).parent().find('.required-icon').css('opacity','1');
				nopass = true;
			}
		});
		
		if(nopass){
			return false;
		}
	});
	
	
	/* 404 page */

	var max_height = $(window).height();
	var box_404 = $('.box-404').height();
	var padding_top_404 = (max_height - box_404)/2 -8;
	
	$('.box-404').css('padding-top',padding_top_404);
	$('.page-404').css('min-height',max_height);
	
	$(window).on('resize', function(){
		var max_height = $(window).height();
		$('.page-404').css('min-height',max_height);
	});
	
	
	/* jQuery countdown init */

	
	function parseDate(input) {

		var parts = input.split('T');
		if(!parts[1]){
			var pparts = parts[0].split('http://104.236.102.187/');
			return new Date(pparts[0],pparts[1]-1,pparts[2]);
		}
		
		var dparts = parts[0].split('http://104.236.102.187/');
		var string = dparts[0]+' '+ dparts[1]+' '+dparts[2]+' '+parts[1];
		var tparts = parts[1].split(':')
		return new Date(dparts[0],dparts[1]-1,dparts[2],tparts[0],tparts[1],tparts[2]);
	}
	
	
	/* comming soon countdown template */
	if($('#countdown').length){
		$('#countdown').countdown({
		format: 'wdHMS',
			layout:	'<div class="col-md-5ths"><span class="bigger">{wnn}</span><h4>{wl}</h4></div>' +
					'<div class="col-md-5ths"><span class="bigger">{dnn}</span><h4>{dl}</h4></div>' +
					'<div class="col-md-5ths"><span class="bigger">{hnn}</span><h4>{hl}</h4></div>' +
					'<div class="col-md-5ths"><span class="bigger">{mnn}</span><h4>{ml}</h4></div>' +
					'<div class="col-md-5ths"><span class="bigger">{snn}</span><h4>{sl}</h4></div>',
			until: parseDate($('#countdown').data('until')),
			padZeroes:true
		}); 
		
	}
	
	/* construction page countdown template */		
	if($('#countdown-cons').length){	
		$('#countdown-cons').countdown({
			
			layout:	'<div class="col-md-3"><span class="bigger">{dnn}</span></div>' +
					'<div class="col-md-3"><span class="bigger">{hnn}</span></div>' +
					'<div class="col-md-3"><span class="bigger">{mnn}</span></div>' +
					'<div class="col-md-3"><span class="bigger">{snn}</span></div>',
			until: parseDate($('#countdown-cons').data('until')),
			padZeroes:true
		});
	}
	
	$('.feature-circle-info,.volunteer-info').css('word-break','break-word');
	
});

/* email validation */
function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
		return pattern.test(emailAddress);
};




})(window.jQuery);