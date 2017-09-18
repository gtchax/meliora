(function ($) {
	'use strict';

	/* ///// Template Helper Function ///// */

	$.fn.hasAttr = function(attribute) {
		var obj = this;

		if (obj.attr(attribute) !== undefined) {
			return true;
		} else {
			return false;
		}
	};

	function checkVisibility (object) {
		var el = object[0].getBoundingClientRect(),
			wHeight = $(window).height(),
			scrl =  wHeight - (el.bottom - el.height),
			condition = wHeight + el.height;

		if (scrl > 0  && scrl < condition) {
			return true;
		} else {
			return false;
		}
	};

	var teslaThemes = {
		init: function () {
			/* --------- Default Functions --- */
			this.stickyHeader();
			this.checkInputsForValue();
			this.nrOnlyInputs();
			this.slickInit();
			this.parallaxInit();
			this.tabsInit();
			//this.googleMaps();
			this.contactForms();
			this.toggles();
			this.postFilters();

			/* --------- Custom Functions --- */
			this.facebookWidgetsInit();
			this.fitVidsInit();
		},

		/* ///// Template Custom Functions ///// */

		/* ----- Theme Default Functions ----- */

		stickyHeader: function (){
			if( $('.main-header').hasClass( 'sticky' ) ){
				$( window ).on( 'scroll', function() {
					var st = $( this ).scrollTop();

					if( st > $( 'header' ).outerHeight( true )){
						$( 'header' ).addClass( 'fixed' );
					} else {
						$( 'header' ).removeClass( 'fixed' );
					}
				});
			}
		},

		postFilters: function(){
			$('input[name="posts-filter"]').on('change', function(){
				var sortby = $(this).attr('class');
				var direction = $( '[name="direction-checkbox"]' ).is(':checked');
				var targetContainer = $('.sort-target');
				
				targetContainer.addClass( 'fade-out' );

				if(sortby == "filter_latest" && direction == false ){
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) > new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if(sortby == "filter_latest" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) < new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_likes" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-likes") < $(b).attr("data-likes");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_likes" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-likes") > $(b).attr("data-likes");
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_popular" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-popularity") < $(b).attr("data-popularity");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_popular" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-popularity") > $(b).attr("data-popularity");
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_alphabet" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-alphabet") < $(b).attr("data-alphabet");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_alphabet" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-alphabet") > $(b).attr("data-alphabet");
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				setTimeout( function() {
					targetContainer.removeClass( 'fade-out' );
				}, 500 );
			});
			$('input[name="direction-checkbox"]').on('change', function(){
				var sortby = $(this).attr('class');
				var direction = $( '[name="direction-checkbox"]' ).is(':checked');
				var targetContainer = $('.sort-target');

				targetContainer.addClass( 'fade-out' );

				if(sortby == "filter_latest" && direction == false ){
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) > new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if(sortby == "filter_latest" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) < new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_likes" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-likes") < $(b).attr("data-likes");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_likes" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-likes") > $(b).attr("data-likes");
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_popular" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-popularity") < $(b).attr("data-popularity");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_popular" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-popularity") > $(b).attr("data-popularity");
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				if(sortby == "filter_alphabet" && direction == false){
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-alphabet") < $(b).attr("data-alphabet");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == "filter_alphabet" && direction == true) {
					targetContainer.children().sort(function(a,b){
						return $(a).attr("data-alphabet") > $(b).attr("data-alphabet");
					}).each(function(){
						targetContainer.prepend(this);
					});
				} 

				if(sortby == null && direction == false){
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) > new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				} else if (sortby == null && direction == true) {
					targetContainer.children().sort(function(a,b){
						return new Date($(a).attr("data-date")) < new Date($(b).attr("data-date"));
					}).each(function(){
						targetContainer.prepend(this);
					});
				}

				setTimeout( function() {
					targetContainer.removeClass( 'fade-out' );
				}, 500 );
			});
		},

		checkInputsForValue: function () {
			function validateHhMm( inputField ) {
				var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test( inputField.value );

				if( isValid ) {
					inputField.classList.add( 'hour-valid' );
					inputField.classList.remove( 'hour-error' );
				} else {
					inputField.classList.add( 'hour-error' );
					inputField.classList.remove( 'hour-valid' );
				}

				return isValid;
			}

			// Check Value
			$( document ).on( 'focusout', '.check-value', function () {
				var text_val = $(this).val();
				if (text_val === "" || text_val.replace(/^\s+|\s+$/g, '') === "") {
					$(this).removeClass('has-value');
				} else {
					$(this).addClass('has-value');
				}
			});

			// Hours Input
			$( document ).on( 'focusout', '.working-hours .form-input', function( e ) {
				if( this.value.length !== 0 ) {
					validateHhMm( $( this )[0] )
				}
			});
		},

		nrOnlyInputs: function () {
			$('.nr-only').keypress(function (e) {
				if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
					return false;
				}
			});
		},

		slickInit: function () {
			// Get All Carousels from the page
			var carousel = $('.tt-carousel');

			// Get All Sliders from the page
			var slider = $('.tt-slider');

			// Init Carousels
			carousel.each(function () {
				var obj = $(this),
					items = obj.find('.carousel-items');

				items.slick({
					focusOnSelect: obj.hasAttr('data-focus-on-select') ? obj.data('focus-on-select') : false,
					speed: obj.hasAttr('data-speed') ? obj.data('speed') : 450,
					slidesToShow: obj.hasAttr('data-items-desktop') ? obj.data('items-desktop') : 4,
					arrows: obj.hasAttr('data-arrows') ? obj.data('arrows') : true,
					dots: obj.hasAttr('data-dots') ? obj.data('dots') : true,
					infinite: obj.hasAttr('data-infinite') ? obj.data('infinite') : false,
					slidesToScroll: obj.hasAttr('data-items-to-slide') ? obj.data('items-to-slide') : 1,
					initialSlide: obj.hasAttr('data-start') ? obj.data('start') : 0,
					asNavFor: obj.hasAttr('data-as-nav-for') ? obj.data('as-nav-for') : '',
					centerMode: obj.hasAttr('data-center-mode') ? obj.data('center-mode') : false,
					vertical: obj.hasAttr('data-vertical') ? obj.data('vertical') : false,
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: obj.hasAttr('data-items-small-desktop') ? obj.data('items-small-desktop') : 3,
								slidesToScroll: obj.hasAttr('data-items-small-desktop') ? obj.data('items-small-desktop') : 3
							}
						},
						{
							breakpoint: 800,
							settings: {
								slidesToShow: obj.hasAttr('data-items-tablet') ? obj.data('items-tablet') : 2,
								slidesToScroll: obj.hasAttr('data-items-tablet') ? obj.data('items-tablet') : 2
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: obj.hasAttr('data-items-phone') ? obj.data('items-phone') : 2,
								slidesToScroll: obj.hasAttr('data-items-phone') ? obj.data('items-phone') : 2
							}
						}
					]
				});
			});

			// Init Sliders
			slider.each(function () {
				var obj = $(this),
					items = obj.find('.slides-list');

				items.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					focusOnSelect: obj.hasAttr('data-focus-on-select') ? obj.data('focus-on-select') : false,
					autoplay: obj.hasAttr('data-autoplay') ? obj.data('autoplay') : false,
					autoplaySpeed: obj.hasAttr('data-autoplay-speed') ? obj.data('autoplay-speed') : 2000,
					pauseOnHover: obj.hasAttr('data-pause-on-hover') ? obj.data('pause-on-hover') : true,
					fade: obj.hasAttr('data-fade') ? obj.data('fade') : false,
					dots: obj.hasAttr('data-dots') ? obj.data('dots') : true,
					speed: obj.hasAttr('data-speed') ? obj.data('speed') : 500,
					arrows: obj.hasAttr('data-arrows') ? obj.data('arrows') : true,
					infinite: obj.hasAttr('data-infinite') ? obj.data('infinite') : false,
					initialSlide: obj.hasAttr('data-start') ? obj.data('start') : 0,
					asNavFor: obj.hasAttr('data-as-nav-for') ? obj.data('as-nav-for') : ''					
				});
			});
		},

		parallaxInit: function () {
			var container = $('[data-parallax-bg]');

			if (container.length) {
				container.each(function(index) {
					var boxImg = container.eq(index),
						boxImgData = boxImg.data('parallax-bg'),
						parallaxBox = boxImg.find('.box-img > span');

					parallaxBox.css({
						'background-image': 'url("' + boxImgData + '")'
					});

					function parallaxEffect () {
						var elCont = container[index],
							el = elCont.getBoundingClientRect(),
							wHeight = $(window).height(),
							scrl =  wHeight-(el.bottom - el.height),
							scrollBox = boxImg.find('.box-img'),
							condition = wHeight+el.height,
							progressCoef = scrl/condition;

						if( scrl > 0  && scrl < condition) {
							scrollBox.css({
								transform: 'translateY('+(progressCoef * 100)+'px)'
							});
						}
					}

					parallaxEffect();

					$(window).scroll(function() {
						parallaxEffect();
					});
				});
			}
		},

		tabsInit: function () {
			var tabs = $( '.tabed-content' );

			tabs.each( function () {
				var tab = $( this ),
					option = tab.find( '.tabs-header .tab-link' ),
					content = tab.find( '.tab-item' );

				option.on( 'click', function () {
					var obj = $( this );

					if( !obj.hasClass( 'current' ) ) {
						option.removeClass( 'current' );
						obj.addClass( 'current' );

						if( tabs.hasClass( 'gallery-tabs' ) ) {
							tab.addClass( 'switching' );

							setTimeout( function () {
								content.removeClass( 'current' );
								$( '#' + obj.data( 'tab-link' ) ).addClass( 'current' );

								tabs.removeClass( 'switching' );
							}, 1795 );
						} else {
							content.removeClass( 'current' );
							$( '#' + obj.data( 'tab-link' ) ).addClass( 'current' );

							google.maps.event.trigger( document.querySelector( '.set-location-block .map-container' ) , 'resize');
						}
					}
				});
			});

			$( '.btn.add-listing-tab' ).on( 'click', function( e ) {
				e.preventDefault();

				$( '.tabed-content' ).find( '.tabs-header .tab-link' ).removeClass( 'current' );
				$( '.tabed-content' ).find( '.tab-item' ).removeClass( 'current' );

				$( '.tabed-content' ).find( '.tabs-header .tab-link' ).eq( 4 ).addClass( 'current' );
				$( '.tabed-content' ).find( '.tab-item' ).eq( 4 ).addClass( 'current' );

				window.scrollTo( 0, $( '.main-header' ).outerHeight( true ) );
			});
		},

		accordionInit: function () {
			var accordion = $('.accordion-group');

			accordion.each(function () {
				var accordion = $(this).find('.accordion-box');

				accordion.each(function () {
					var obj = $(this),
						header = $(this).find('.box-header h4'),
						body = $(this).find('.box-body');

					header.on('click', function () {
						if (obj.hasClass('open')) {
							body.velocity('slideUp', {
								duration: 150,
								complete: function () {
									obj.removeClass('open');
								}
							});
						} else {
							obj.addClass('open');
							body.velocity('slideDown', {duration: 195});
						}
					});
				});
			});
		},

		googleMaps: function () {
			// Describe Google Maps Init Function 
			function initialize_contact_map (customOptions) {
				var mapOptions = {
						zoom: 15,
						scrollwheel: false,
						disableDefaultUI: true,
						center: new google.maps.LatLng( 41.3827196, 2.1753804 ),
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						styles: [{ stylers: [{saturation: -100}]}]
					};
				var contact_map = new google.maps.Map( $( '#map-canvas' )[0], mapOptions ),
					marker = new google.maps.Marker({
						map: contact_map,
						position: new google.maps.LatLng( 41.380275, 2.177484 ),
						icon: 'assets/marker.png',
					});
			}
			
			if( $( '#map-canvas' ).length ) {
				google.maps.event.addDomListener( window, 'load', initialize_contact_map() );
			}
		},

		contactForms: function () {
			$( '.contact-form' ).each(function () {
				var t = $( this );
				var t_result = $( this ).find( '.submit-btn' );
				var t_result_init_val = t_result.text();
				var validate_email = function validateEmail(email) {
					var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
				};
				var t_timeout;
				t.submit(function (event) {
					event.preventDefault();
					var t_values = {};
					var t_values_items = t.find('input[name],textarea[name]');
					t_values_items.each(function () {
						t_values[this.name] = $(this).val();
					});

					if (t_values['name'] === '' || t_values['e-mail'] === '' || t_values['message'] === '') {
						t_result.val('Please fill in all the required fields.');
					} else
					if (!validate_email(t_values['e-mail']))
						t_result.val('Please provide a valid e-mail.');
					else
						$.post("php/contacts.php", t.serialize(), function (result) {
							t_result.val(result);
						});
					clearTimeout(t_timeout);
					t_timeout = setTimeout(function () {
						t_result.val(t_result_init_val);
					}, 3000);
				});
			});
		},

		toggles: function () {
			// Main Search Form
			$( '.search-form-toggle' ).on( 'click', function() {
				$( 'body' ).addClass( 'search-form-visible' );
			});

			$( '.main-search-form .close-search-form' ).on( 'click', function() {
				$( 'body' ).removeClass( 'search-form-visible' );
			});

			// Primary Nav
			$( '.main-header .primary-nav-toggle' ).on( 'click', function() {
				$( '.primary-nav' ).addClass( 'nav-visible' );
			});

			$( '.primary-nav .close-nav' ).on( 'click', function() {
				$( '.primary-nav' ).removeClass( 'nav-visible' );
			});

			// Navigation Submenus
			$( '.main-header .primary-nav ul li.menu-item-has-children > a' ).on( 'click', function( e ) {
				e.preventDefault();
				$( this ).next().slideToggle( 250 );
				return false;
			});

			// Facebook Comments Toggle
			var fbComments = $( '.facebook-comments' );

			fbComments.find( '.comments-toggle .toggle' ).on( 'click', function() {
				$( this ).css({
					'pointer-events': 'none'
				});
				fbComments.find( '.comments-wrapper' ).slideDown();
			});

			// Post Likes
			$( '.blog-post .likes-block > i' ).on( 'click', function() {
				var box = $('div .likes-block');
				var post_id = box.data('id');
				var likes = parseInt(box.text(),10);
				var likesCount = $( '.blog-post .likes-block .count' );
				
				//if(box.hasClass('liked'));
				
				$.ajax({
					url: ajaxurl,
					type: 'POST',
					data: {action: 'post_likes', postid:post_id},
				})
				.done(function(result) {
					if(result == true) {
						if(box.hasClass('liked')){
							likes--;
							box.removeClass('liked');
							likesCount.text(likes);
						} else {	
							likes++;
							likesCount.text(likes);
							box.addClass('liked')
						}
					}
				})
				.fail(function() {
					console.log("error-ajax");
				});
			});

			$( '.comment-reply-link' ).on( 'click', function( e ) {

				e.preventDefault();

				console.log( 'zzz' );
			});
		},

		/* ----- Theme Specific Functions ----- */

		facebookWidgetsInit: function () {
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		},

		fitVidsInit: function () {
			//$( '.blog-post.single .post-body' ).fitVids();
		}
	};

	$( document ).ready( function () {
		teslaThemes.init();

		$( 'html' ).on( 'click', 'a', function( e ) {
			var $this, linkHref, linkTarget;
			$this = $( this );
			linkTarget = $this.attr( 'target' ) || false;
			linkHref = $this.attr( 'href' ) || '#';

			if( linkTarget === false && linkHref[0] !== '#' && location.protocol !== 'file:' && !$this.hasClass( 'comment-reply-link' ) && !$this.is( '#cancel-comment-reply-link' ) ) {
				e.preventDefault();

				$( 'body' ).fadeOut( 450 );

				setTimeout( function() {
					window.location.href = linkHref;
				}, 450 );
			}
		});

		setTimeout( function () {
			$( 'body' ).addClass( 'dom-ready' );
		}, 300 );
	});
}( jQuery ));