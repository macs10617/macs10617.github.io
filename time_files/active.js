$(document).ready(function() {
	
	/*
		Aleksey Skubaev

		askubaev@gmail.com
		icq - 322253350
		Разработка шаблонов для DLE и кроссбраузерная верстка
		------------------
		Необходимые jQuery скрипты.
	
	*/

	$('.top-menu-block li').hover(
	function() {
		$(this).find('.hidden-menu-block').css({'display':'block'});
		$(this).find('.menu-link').addClass('activ');
	}, function() {
		$(this).find('.hidden-menu-block').css({'display':'none'});
		$(this).find('.menu-link').removeClass('activ');
	});
	
	//slaider//
	
	
	$('.slaider-block-all:first').addClass('slaider-activ').find('.slaider-block-news').fadeIn();
	$('.slaider-block-all:first').find('.slaider-block-news-mini').addClass('mini-activ');
	
	
	function showNext() {
		clearTimeout(timerId);
		var currentBlock = $('.slaider-activ');
		var nextBlock = currentBlock.next('.slaider-block-all').length ? currentBlock.next('.slaider-block-all') : $('.slaider-block-all:first');
		currentBlock.find('.slaider-block-news').fadeOut();
		$('.slaider-block-all').removeClass('slaider-activ');
		nextBlock.addClass('slaider-activ').find('.slaider-block-news').fadeIn();
		currentBlock.find('.slaider-block-news-mini').removeClass('mini-activ');
		nextBlock.find('.slaider-block-news-mini').addClass('mini-activ');
		timerId = setTimeout(showNext, 8000);
	};
	
	timerId = setTimeout(showNext, 8000);

	
	$('.slaider-block-news-mini').click(function() {
		clearTimeout(timerId);
		$('.slaider-block-all').removeClass('slaider-activ');
		$('.slaider-block-news').fadeOut();
		$(this).parent().addClass('slaider-activ').find('.slaider-block-news').fadeIn();
		$(this).parent().addClass('slaider-activ').find('.slaider-block-news').fadeIn();
		$('.slaider-block-all').find('.slaider-block-news-mini').removeClass('mini-activ');
		$(this).parent().addClass('slaider-activ').find('.slaider-block-news-mini').addClass('mini-activ');
		
		
	});
	
	$('.next').click(showNext);
	
	function showPrev() {
		clearTimeout(timerId);
		var currentBlock = $('.slaider-activ');
		var prevBlock = currentBlock.prev('.slaider-block-all').length ? currentBlock.prev('.slaider-block-all') : $('.slaider-block-all:last');
		currentBlock.find('.slaider-block-news').fadeOut();
		$('.slaider-block-all').removeClass('slaider-activ');
		prevBlock.addClass('slaider-activ').find('.slaider-block-news').fadeIn();
		currentBlock.find('.slaider-block-news-mini').removeClass('mini-activ');
		prevBlock.find('.slaider-block-news-mini').addClass('mini-activ');
	};
	
	$('.prev').click(showPrev);
	
	$('.slaider-block').hover(
		function() {
		clearTimeout(timerId);
	}, function() {
		timerId = setTimeout(showNext, 8000);
	});

	
	//-slaider//
	
	

	$('.games-block-all').hover(
		function() {
			$('.treug').css({'display':'none'});
			$('.games-block-info').removeClass('games-activ');
			$('.games-block-news').css({'display':'none'});
			$(this).find('.games-block-news').css({'display':'block'});
			$(this).find('.games-block-info').addClass('games-activ');
			$(this).find('.treug').css({'display':'block'});
	}, function() {
		
	});
	
	$('.games-block-news-image').hover(
		function() {
			$('.games-img-hover').css({'display':'block'});
	}, function() {
		$('.games-img-hover').css({'display':'none'});
	});
	
	$('.treug:first').css({'display':'block'});
	$('.games-block-news:first').css({'display':'block'});
	$('.games-block-info:first').addClass('games-activ');
	
	
	$('#foo1').carouFredSel({
		height: 320,
		prev: '#prev1',
		next: '#next1',
		scroll: 1,
		auto: false
	});
	
	$('.slaider-kino-news').hover(
		function() {
			$(this).find('.slaider-kino-title').css({'display':'block'});
	}, function() {
		$(this).find('.slaider-kino-title').css({'display':'none'});
	});
	
	$('.tt-tabs').ttabs();
	$('.tt-tabs2').ttabs({
		activeClass: 'active-ttab2'
	});
	
	$('#foo2').carouFredSel({
		prev: '#prev2',
		next: '#next2',
		scroll: 1,
		auto: false
	});
});
