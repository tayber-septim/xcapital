// JavaScript Document


$(document).ready(function($) {
	//select_class();
	$('.chips').material_chip();
	//
	$('.modal').modal();
    //
    $(".button-collapse").sideNav();
	//
	$('select').material_select();
	
	$('.datepicker').pickadate();
	
    $('.slider').slider();
	
//	$('.carousel.carousel-slider').carousel({fullWidth: true});
	
	
	$('.dropdown-button').dropdown();
	// Scripts slider acrive on page registration (Скрипт ликновки слайдера на странице регистрации)
	$('.materialboxed').materialbox();
	
	  $('.pushpin-demo-nav').each(function() {
    var $this = $(this);
    var $target = $('#' + $(this).attr('data-target'));
		$this.pushpin({
		  top: $target.offset().top,
		  bottom: $target.offset().top + $target.outerHeight() - $this.height()
		});
	  });
	
	$('.dont_beta').click(function() {
		  var $toastContent = $('<span class="red-text">Данный раздел ещё не работает!</span>');
		  Materialize.toast($toastContent, 5000);
	});
	
	$('.target').pushpin({
      top: 0,
      bottom: 1000,
      offset: 0
    });

	// $sum = document.getElementById("paypalmodel");
	console.log(1212);

	

});