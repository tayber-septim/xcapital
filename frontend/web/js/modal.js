// JavaScript Document

$(document).ready(function() {
 $('.me_new_page').click(function () {
	falsh_block(); 
 });
});


function modal_page_me () {
	var modal_me_all = $('.MM_jb');
//	$('.me_new_page').click(function () { // Вызываем модальное окно
	$('body').css({'overflow' : 'hidden'});
	modal_me_all.fadeIn(100);
//	});
	$('.main_bg').click(function () { // Удаляем модальное окно по кику на background
	modal_me_all.css({'display' : 'none'});
	$('body').css({'overflow' : 'auto'});
	$('.falsh_block').fadeOut(0);
	});
	$('.nav_back').click(function () { // Удаляем модальное окно по кику на back
	modal_me_all.css({'display' : 'none'});
	$('body').css({'overflow' : 'auto'});
	$('.falsh_block').fadeOut(0);
	});
}	

function falsh_block () {
	var start_position = $('.me_new_page').offset();
	var falsh_block = $('.falsh_block');
	var animate_top = $(document).scrollTop() ;
//		falsh_block.css({'display' : 'block', 'left' : start_position.left, 'top' : start_position.top, 'width' : '50px', 'height' : '50px'});
//		falsh_block.animate({'width' : '100%',  'height' : '100vh', 'top' : animate_top + 'px', 'left' : '0'}, 300, "linear" , function(){modal_page_me ();});
}

//$('.main_modal').on('click', function() {
//	
//	$('body').css({'overflow' : 'hidden'});		// Отключаем скролл у всей страницы
//	$('.main_bg').css({'display' : 'block'});  // Вызываем беграунд
//	$('nav#nav_modal').css({'display' : 'block'}); /*Вызываем меню*/
//	$('MM_closed').css({'display' : 'block'}); /*Вызываем */
//	
//	var height_nav = $('nav#nav_modal').height();
//	$('.MM_wrapp').css({'display' : 'block', 'top' : height_nav}); /*Вызываем рабочию область всплывающего окна*/
//});
//
//
//$( '.nav_back').click(function(){
//	$('body').css({'overflow' : 'auto'});		/*Возрващаем скролл*/
//	$('.main_bg').css({'display' : 'none'}); /*Убираем бегаунд*/
//	$('nav#nav_modal').css({'display' : 'none'});/*Убираем верхнее меню*/
//	$('.MM_wrapp').css({'display' : 'none'});  /*Убираем рабочию область всплывающего окна*/
//});

