//javascript.js
//set map options

var myLatLng = { lat: 51.5, lng: -0.1 };
var mapOptions = {
    center: myLatLng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};
var e = document.getElementById("to").value;
var c;
//create map
var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);



function getLocation() {
    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

    
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;
      window.c = position.coords.latitude+","+position.coords.longitude;
}
//define calcRoute function
function calcRoute() {
    //create request
    getLocation();
    var request = {
        origin: window.c,
        destination: window.e,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL
        
        
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
            $("#output").html("<div class='alert-info'>To: " + document.getElementById("to").value + ".<br /> Driving distance: " + result.routes[0].legs[0].distance.text + ".<br />Duration: " + result.routes[0].legs[0].duration.text + ".</div>");
            //display route
            directionsDisplay.setDirections(result);
        } else {
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            $("#output").html("<div class='alert-danger'>Could not retrieve driving distance.</div>");
        }
	

		window.open(
		  "http://localhost/PortKey-master/Distance/file.php?time=" + result.routes[0].legs[0].duration.text + "&unit=" + result.routes[0].legs[0].distance.text + "&to=" + window.e,
		  '_blank' // <- This is what makes it open in a new window.
		);


		//location.href = "http://localhost/Dis/file.php?time=" + result.routes[0].legs[0].duration.text + "&unit=" + result.routes[0].legs[0].distance.text;
    });

}



//create autocomplete objects for all inputs
var options = {
    types: ['(cities)']
}

var input1 = document.getElementById("from");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("to");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);


// await sleep(15000);

// }
