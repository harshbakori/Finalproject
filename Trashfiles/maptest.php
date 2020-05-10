<!DOCTYPE html>
<html>
  <head>
    <title>Place Searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
        <script src="https://maps.googleapis.com/maps/api/js?key=APIKEY" async defer></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      var map;

function initialize() {
  // Create a map centered in Pyrmont, Sydney (Australia).
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8666, lng: 151.1958},
    zoom: 15
  });

  // Search for Google's office in Australia.
  var request = {
    location: map.getCenter(),
    radius: '500',
    query: 'Google Sydney'
  };

  var service = new google.maps.places.PlacesService(map);
  service.textSearch(request, callback);
}

// Checks that the PlacesServiceStatus is OK, and adds a marker
// using the place ID and location from the PlacesService.
function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    var marker = new google.maps.Marker({
      map: map,
      place: {
        placeId: results[0].place_id,
        location: results[0].geometry.location
      }
    });
  }
}

    google.maps.event.addDomListener(window, 'load', initialize);


    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>