/**
 * Slick Custom
 *
 * @package Postali Parent
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('.not-responsive').slick({
		dots: false,
		infinite: true,
  		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		prevArrow: $('.attorney-prev'),
		nextArrow: $('.attorney-next')
	});

	$('.not-responsive-new').slick({
		dots: false,
		infinite: true,
  		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		prevArrow: $('.slide-prev'),
		nextArrow: $('.slide-next')
	});

	$('.responsive').slick({
	  dots: false,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  swipeToSlide: true,
	  infinite: true,
	  cssEase: 'ease-in-out',
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	
});