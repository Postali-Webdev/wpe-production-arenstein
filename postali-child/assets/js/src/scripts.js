/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

  //Hamburger animation
  var hamburger = jQuery('#menu-icon');
    hamburger.click(function() {
    hamburger.toggleClass('active');
    // Add class to prevent body scroll when menu open
    $('body').toggleClass('menu-open');
    $('#mobile-nav').toggleClass('menu-appear');
     return false;
  });

  // Toggle mobile menu
	$('.toggle-nav').click(function() {
	  //$('#mobile-nav').slideToggle(200);
	});

	$('.toggle-nav.active').click(function() {		 
	  $('#mobile-nav').slideUp(200);
  });	
  
	// Append a div that opens nested <ul> while maintaining clickability of parent <li><a>
	$('#menu-main-navigation > li.menu-item-has-children').append('<div class="accordion-toggle"><div class="fa fa-angle-down"></div></div>');
	  $('#mobile-nav .accordion-toggle, li.practice-areas-link a').click(function() {
	  $(this).parent().find('> ul').slideToggle(200);
	  $(this).toggleClass('toggle-background');
	  $(this).find('.fa').toggleClass('toggle-rotate');
  });

	$('.top-fifty h2').html(function (i, t) {
	  var hhNumber = $(this).attr('class').substring(4, 3);
	  var words = t.split(/\s+/);
		return "<span>" + words.slice(0,hhNumber).join(" ") + "</span> " + words.slice(hhNumber).join(" ");
	});

  $('.main-effect').click(function () {
    $(this).find('.x-plus').toggleClass('rotate');
    $(this).toggleClass('highlight');
    $(this).find('.sub-content').toggleClass('highlight');
    $(this).find('.push').slideToggle({
        duration: 500,
    });
  });  

  var header = $(".page-template-front-page header");
    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
  
      if (scroll >= 1) {
          header.addClass("back-color");
      } else {
          header.removeClass("back-color");
      }
  });

  $(document).ready(function() {
    $(".show-hide a[href]").click(function () {
      $( ".main-sidebar .sub-menu" ).slideToggle({
          duration: 500,
      });
      $(this).text($(this).text() == 'View More' ? 'View Less' : 'View More');
    });  
  });

});