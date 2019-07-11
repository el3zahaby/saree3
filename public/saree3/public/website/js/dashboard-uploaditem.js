(function($){
    var lineBars = [
		{ name: 'pg1', percent: 86 },
		{ name: 'pg2', percent: 92 },
		{ name: 'upload-pg1', percent: 100 },
		{ name: 'upload-pg2', percent: 100 },
		{ name: 'upload-pg3', percent: 68 },
		{ name: 'upload-pg4', percent: 73 },
		{ name: 'upload-pg5', percent: 92 }
	];

	lineBars.forEach(function( pg ){
		$('.' + pg.name).xmlinefill({
			percent: pg.percent,
			fillWidth: 10,
			gradient: true,
			gradientColors: ['#d6a32e', '#d6a32e'],
			speed: 1,
			outline: true,
            outlineColor: "#eff0f4",
			resizable: true,
            animateOnScroll: false
		});
	});
})(jQuery);