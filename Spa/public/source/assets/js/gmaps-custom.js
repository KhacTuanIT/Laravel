"use strict;";
/*----------------------------------------------------
 google map
 ----------------------------------------------------*/
var map;
map = new GMaps({
	el: '#googleMap',
	lat: 21.2334329,
	lng: 72.86372,
	scrollwheel: false
});
map.addMarker({
	lat: 21.2334329,
	lng: 72.86372,
	title: 'Marker with InfoWindow',
	infoWindow: {
		content: '<p>Phoenixcoded</p>'
	}
});