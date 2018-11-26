<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>The total distance between here</title>
</head>

<body>
	<div>
		The total distance between here and <a href="http://techbash.com">TECHbash 2012</a> is: 
		<span id="distance"></span> miles.
	</div>

	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js" 

		type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.0.6-development-only.js" 

		type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false" 

		type="text/javascript"></script>
	<script type="text/javascript">
		function getCurrentPosition() {
			if (Modernizr.geolocation) {
				navigator.geolocation.getCurrentPosition(locationSuccess,locationError);
			} else {
				// TODO: Decide what to do when the browser doesn't support Geolocation
			}
		}
		
		function locationSuccess(position)
		{
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;

			calculateRoute(latitude, longitude);
		}
		
		function locationError(err)
		{
			// TODO: We need to complete our error handling
			if (err.code == 1) { 
				// user won't grant permission 
			}
			if (err.code == 2) { 
				// position is currently unavailable 
			}
			if (err.code == 3) { 
				// a timeout has occurred 
			}
		}
	
		var directionsService = new google.maps.DirectionsService();
		
		function calculateRoute(lat, lon) {
			var distance = 0;
			var start = new google.maps.LatLng(lat, lon);
			var end = new google.maps.LatLng(41.195647, -75.992499);
			var request = {origin:start, destination:end, 
				travelMode: google.maps.DirectionsTravelMode.DRIVING};
			
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					distance  = response.routes[0].legs[0].distance.value;
					duration = response.routes[0].legs[0].duration.value;
					$("#distance").html(Math.round(distance / 1609.344));
				} else {
					// TODO: Handle the Google Maps exception
				}
			});
			
			return distance;
		}
		
		$(document).ready(function() { getCurrentPosition(); });
	</script>
</body>

</html>