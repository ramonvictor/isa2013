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

	var twitter_bubble = $('.twitter-bubble');
	if( twitter_bubble.length ){
		
		twitter_bubble.sharrre({
		  share: {
		    twitter: true
		  },
		  enableHover: false,
		  enableTracking: true,
		  buttons: { 
		  	twitter: {via: 'ISAmerica13'}
		  },
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('twitter');
		  }
		});
	}
	var facebook_bubble = $('.facebook-bubble');
	if( facebook_bubble.length ){
		facebook_bubble.sharrre({
		  share: {
		    facebook: true
		  },
		  enableHover: false,
		  enableTracking: true,
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('facebook');
		  }
		});
	}

	var gplus_bubble = $('.gplus-bubble');
	if( gplus_bubble.length ){
		gplus_bubble.sharrre({
		  share: {
		    googlePlus: true
		  },
		  enableHover: false,
		  enableTracking: true,
		  urlCurl: '/2013/wp/wp-content/themes/wp-isa2013/sharrre.php',
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('googlePlus');
		  }
		});
	}

	var linkedin_bubble = $('.linkedin-bubble');
	if( linkedin_bubble.length ){
		linkedin_bubble.sharrre({
		  share: {
		    linkedin: true
		  },
		  enableHover: false,
		  enableTracking: true,
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('linkedin');
		  }
		});
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