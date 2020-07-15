function initialize() {
		
		var mapOptions = {
		zoom: 16,
		scrollwheel: false,
		center: new google.maps.LatLng(38.263716,140.867537)
		}
		var map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
		
		var image = 'img/icon_pointer_01.png';
		var myLatLng = new google.maps.LatLng(38.263716,140.867537);
		var beachMarker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image
		});
		
		var image_2 = 'img/icon_pointer_02.png';
		var myLatLng_2 = new google.maps.LatLng(38.262684, 140.877459);
		var beachMarker_2 = new google.maps.Marker({
			position: myLatLng_2,
			map: map,
			icon: image_2
		});

		var ada_map = [
			{
				"featureType": "water",
				"stylers": [
					{ "invert_lightness": true },
					{ "color": "#65778f" },
					{ "lightness": 57 }
				]
			},{
				"featureType": "road.local",
				"elementType": "geometry.fill",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "lightness": 77 },
					{ "saturation": 49 }
				]
			},{
				"featureType": "landscape",
				"elementType": "geometry.fill",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "lightness": 49 },
					{ "saturation": 51 },
					{ "gamma": 1.49 }
				]
			},{
				"featureType": "poi",
				"elementType": "labels.text",
				"stylers": [
					{ "visibility": "off" }
				]
			},{
				"featureType": "landscape.man_made",
				"elementType": "labels.text",
				"stylers": [
					{ "visibility": "off" }
				]
			},{
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
					{ "visibility": "on" },
					{ "color": "#8b7c5c" },
					{ "saturation": 24 },
					{ "gamma": 1.61 }
				]
			},{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
					{ "visibility": "simplified" },
					{ "invert_lightness": true },
					{ "gamma": 3.4 }
				]
			},{
				"featureType": "transit.line",
				"elementType": "labels.text.fill",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "gamma": 0.64 }
				]
			},{
				"elementType": "labels.text.stroke",
				"stylers": [
					{ "visibility": "off" }
				]
			},{
				"featureType": "administrative",
				"elementType": "labels",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "gamma": 0.62 }
				]
			},{
				"featureType": "poi.business",
				"elementType": "geometry",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "saturation": 41 },
					{ "lightness": 19 }
				]
			},{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
					{ "invert_lightness": true },
					{ "lightness": 59 },
					{ "saturation": -20 },
					{ "gamma": 4.74 }
				]
			},{
				"featureType": "transit.station",
				"elementType": "labels.text",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "gamma": 0.55 }
				]
			},{
				"featureType": "transit.station",
				"elementType": "geometry",
				"stylers": [
					{ "color": "#8b7c5c" },
					{ "saturation": 57 },
					{ "gamma": 1.98 }
				]
			},
		];
		
		  
		var ada_mapOptions = {
			name: "ワンリフレクションマップ"
		};
		
		var ada_mapType = new google.maps.StyledMapType(ada_map, ada_mapOptions);
		map.mapTypes.set('ada_map', ada_mapType);
		map.setMapTypeId('ada_map');
	
}