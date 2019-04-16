;jQuery(function ($) {

	'use strict';

	/* ======= Preloader ======= */
	(function () {
		$('.status').fadeOut();
		$('.preloader').delay(200).fadeOut('slow');
	}());

	document.querySelectorAll(".play-bar .range").forEach(function(el) {
		el.oninput =function(){
			var valPercent = (el.valueAsNumber  - parseInt(el.min)) /
				(parseInt(el.max) - parseInt(el.min));
			var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+ valPercent+', #1a2026), color-stop('+ valPercent+', #fff));';
			el.style = style;
		};
		el.oninput();
	});

	if ($('.screen-btn').length > 0) {
		$('.screen-btn').on('click', function () {
			$(this).toggleClass('playing');
		});
	}

	if ($('.plying-btn').length > 0) {
		$('.plying-btn').on('click', function () {
			$(this).toggleClass('playing');
		});
	}


});
