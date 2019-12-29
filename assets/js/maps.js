 var view = $("#tampilkan"); // Untuk mengambil id tampilkan 
 var geocoder;
 var map;
 var marker;
 var contentString;
 var po = [];
 var infowindow = new google.maps.InfoWindow({
  size: new google.maps.Size()
});
        //Untuk menampilkan tampilan awal maps
        function initialize() {
          var drawingManager = new google.maps.drawing.DrawingManager({
            drawingControl: true,
            drawingControlOptions: {
              position: google.maps.ControlPosition.TOP_CENTER,
              drawingModes: [
              google.maps.drawing.OverlayType.POLYGON,
              ]
            },
            polygonOptions: {
              fillColor: 'rgba(255, 87, 34, 0.11)',
              fillOpacity: 1,
              strokeWeight: 5,
              clickable: false,
              editable: true,
              draggable: true,
              zIndex: 1,
            }
          });
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(-6.1744651, 106.82274499999994);//untuk setting map di awal 
          var mapOptions = {
            center: latlng,
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggableCursor: "crosshair",
            myLocation: true
          };

          map = new google.maps.Map(document.getElementById('mapsnya'), mapOptions),
          google.maps.event.addListener(map, "dblclick", function (location) { 
            setLatLong(location.latLng.lat(), location.latLng.lng());
            placeMarker(location.latLng);
            setGeoCoder(location.latLng);
          });
          function placeMarker(location) {
            if ( marker ) {
              marker.setPosition(location);
            } else {
              marker = new google.maps.Marker({
                position: location,
                map: map
              });
            }
          }
      var input = document.getElementById('search_address');//Untuk memanggil id search autocomplete

      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      autocomplete.setTypes([]);

      var infowindow = new google.maps.InfoWindow();
      marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
      });

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
      //infowindow.close();
      marker.setVisible(true);
      var place = autocomplete.getPlace();

      if (!place.geometry) return;

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      marker.setIcon();
      marker.setPosition(place.geometry.location);
      geocodePosition(marker.getPosition());
      var namanya = place.name;
      var addrnya = place.formatted_address;
      marker.setVisible(true);
      setLatLong(place.geometry.location.lat(), place.geometry.location.lng(),namanya,addrnya);
    });
      google.maps.event.addListener(drawingManager, 'polygoncomplete', function(poly) {
       poly.setEditable(true);
       drawingManager.setMap(map);
       var po = poly.getPath();

       for (var i =0; i < po.getLength(); i++) {
        var xy = po.getAt(i);
        contentString += '<br>' + xy.lat()+','+xy.lng();
      }
      var area_t = google.maps.geometry.spherical.computeArea(poly.getPath().getArray()).toFixed(2);
      $('#polygon').val(contentString);
      $('#luas').val(area_t);
      $('#luasha').val(area_t/10000).toFixed(2);

      poly.getPaths().forEach(function(path, index){
        google.maps.event.addListener(path, 'set_at', function(){
                  // var coordinates = (poly.getPath().getArray());
                  // alert(coordinates);
                  for (var i =0; i < po.getLength(); i++) {
                    var xy = po.getAt(i);
                    contentString += '<br>' + xy.lat()+','+xy.lng();
                  }
                  var round = google.maps.geometry.spherical.computeArea(poly.getPath().getArray()).toFixed(2);
                  $('#polygon').val(contentString);
                  $('#luas').val(round);
                  $('#luasha').val(round/10000).toFixed(2);
        });
      });

    });
      drawingManager.setMap(map);
    }

    //fungsinya untuk mengambil id dari lat 
    function setLatLong(lat, long,nama,addr) {
      $('#lat').val(lat);
      $('#long').val(long);
      $('#alamat').val(addr);
    }

    function setGeoCoder(pos) {
      geocoder.geocode({'location': pos}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#alamat').val(results[0].formatted_address);
          } else {
            $('#search_address').val('');
          }
        } else {
          $('#search_address').val('');
        }
      });
    }

    function geocodePosition(pos) {
      geocoder.geocode({
        latLng: pos
      }, function(responses) {
        if (responses && responses.length > 0) {
          marker.formatted_address = responses[0].formatted_address;
        } else {
          marker.formatted_address = 'Cannot determine address at this location.';
        }
        $('#alamat').val(marker.formatted_address);

        infowindow.setContent(marker.formatted_address);
        infowindow.open(map, marker);
      });
    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        view.innerHTML = "Mohon maaf browser anda tidak mendukung Geolocation!";
      }
    }

    function showPosition(position) {
      $('#lat').val(position.coords.latitude);
      $('#long').val(position.coords.longitude);
      var address = position.coords.latitude+','+position.coords.longitude;
      var latlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      geocoder.geocode({
        'address': address
      }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          if (marker) {
            marker.setMap(null);
            if (infowindow) infowindow.close();
          }
          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: latlng
          });
          
          $('#alamat').val(results[0].formatted_address);
          var fx = results[0].formatted_address.split(',');
          $('hides').show();
          google.maps.event.addListener(marker, 'dragend', function(a) {
            geocodePosition(marker.getPosition());
            $('#lat').val(a.latLng.lat());
            $('#long').val(a.latLng.lng());
          });
          google.maps.event.addListener(marker, 'center_changed', function() {
            if (results[0].formatted_address) {
              infowindow.setContent(results[0].formatted_address + "<br>coordinates: " + marker.getPosition());
            }else {
              infowindow.setContent(address + "<br>coordinates: " + marker.getPosition());
            }
            infowindow.open(map, marker);
          });
          google.maps.event.trigger(marker, 'center_changed');
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });

    }


    function showError(error) {
      switch(error.code) {
        case error.PERMISSION_DENIED:
        view.innerHTML = "Tidak dapat mendeteksi lokasi anda"
        break;
        case error.POSITION_UNAVAILABLE:
        view.innerHTML = "Lokasi anda tidak dapat kami temukan"
        break;
        case error.TIMEOUT:
        view.innerHTML = "Requestnya timeout"
        break;
        case error.UNKNOWN_ERROR:
        view.innerHTML = "An unknown error occurred."
        break;
      }
    }


    google.maps.event.addDomListener(window, "load", initialize);