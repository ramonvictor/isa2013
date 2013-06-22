(function($) {
	//last li main nav
	var main = gid('main'),
		external = main.find('a[rel=external]');
	if( external.length )
		external.external_link();

	// hover dropdown
	var dropdown_toggle = $('.dropdown-toggle');
	if(dropdown_toggle.length){
		console.log(dropdown_toggle.dropdownHover() );
	}

	// slideshow home header
	var hd_slider = $('.slider-wrapper');
	if( hd_slider.length ){
		var total_news = hd_slider.find('.item').length;
		if(total_news > 1) {
			hd_slider.cycle({
				fx:     'fade',
				speed:   1500,
				timeout: 3500,
				pause:   true,
			 	pager:  '#slider-pager'
			});
		}
	}

}(jQuery));

//get id with performance
function gid( theid ) {
	return $( document.getElementById( theid ) );
}

//debug
function log( m ) {
	console.log( m );
}

//attach external click function
$.fn.external_link = function() {
	var e_links = $(this);
	e_links.on('click', function( e ) {
		e.preventDefault();
		//open in a new tab
		window.open( this.href );
	});
}