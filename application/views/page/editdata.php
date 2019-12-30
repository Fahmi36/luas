  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Edit Data Luas Tanah</h4>
      </div>
      <div class="card-body">

                        <input type="text" placeholder="Masukan Nama Tempat" class="form-control" id="search_address">
        <p id="tampilkan"></p>
        <div id="mapsnya" style="height:400px;margin-bottom:20px;background: #FFF;padding: 10px;border:solid 1px #DDD"></div>
        <form method="post" action="javascript:void(0)" id="kirimeditpolygon">
          <div class="form-group label-floating has-success">
            <label class="control-label">Luas Tanah</label>
            <input type="text" name="luas" value="<?=$datanya->luas?>" id="luasedit" class="form-control" />
            <input type="hidden" name="idaset" value="<?=$datanya->id?>" class="form-control" />
            <span class="form-control-feedback">
              M<sup>2</sup>
            </span>
          </div>
          <div class="form-group label-floating has-success">
            <label class="control-label">Luas Tanah</label>
            <input type="text" name="luasha" value="<?=$datanya->luasha?>" id="luaseditha" class="form-control" />
            <span class="form-control-feedback">
              Hektar<sup>2</sup>
            </span>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamatedit"><?=$datanya->alamat?></textarea>
          </div>
          <div class="form-group" style="display: none;">
            <label for="exampleInputPassword1">polygon</label>
            <textarea class="form-control" name="polygon" id="polygonedit"><?=$datanya->polygon?></textarea>
          </div>
          <div class="form-group" style="display: none;">
            <label for="exampleInputPassword1">lat</label>
            <input type="text" name="lat" value="<?=$datanya->lat?>" id="latedit" class="form-control" />
          </div>
          <div class="form-group" style="display: none;">
            <label for="exampleInputPassword1">long</label>
            <input type="text" name="long" value="<?=$datanya->long?>" id="longedit" class="form-control" />
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= base_url('') ?>/assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/core/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js "></script>
        <script src="<?= base_url('') ?>/assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="<?= base_url('') ?>/assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <!-- <script src="<?= base_url('') ?>/assets/js/plugins/jquery.validate.min.js"></script> -->
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?= base_url('') ?>/assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="<?= base_url('') ?>/assets/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBPHCpWOiSncpkYHFh8zh6zDKBuT2a1c&language=id&region=id&libraries=places,geometry,drawing" type="text/javascript"></script>
        <script src="<?= base_url('') ?>/assets/js/maps.js"></script>
        <!-- Chartist JS -->

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="<?= base_url('') ?>/assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?= base_url('') ?>/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="<?= base_url('') ?>/assets/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
              $("#kirimeditpolygon").submit(function (event) {
              var data = new FormData($(this)[0]);
              Swal.fire({
                title: 'Data Sudah benar ?',
                text: "Klik Ya",
                type: 'success',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Ya',
                preConfirm: () => { 
                  $.ajax({
                    url: '<?= site_url('Main/acteditData') ?>',
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(argument) {
                        $(".loader-overlay").removeAttr('style');
                    },
                    success: function (response) {
                      Swal.fire(
                        'Data berhasil di ubah',
                        );
                      $("#kirimeditpolygon")[0].reset();
                      location.reload();
                    },
                    error: function () {
                      Swal.fire(
                        '"'+response.msg+'"',
                        'Hubungi Tim Terkait',
                        );
                    }
                  });
                  return false;
                }
              });
            });
    });
    var view = document.getElementById("tampilkan");
    var geocoder;
    var map;
    var marker;
    var contentString;
    var text = "";
    var id = [];
    var luas = [];
    var lokasi = [];
    var cords = '';
    var area = [];
    var po = [];
    var infowindow = new google.maps.InfoWindow;
    var infoWindows;

    function initialize() {
     $.ajax({
      url: '<?=site_url('Main/getPolygon');?>',
      dataType: 'json',
      data : {id:<?=$this->uri->segment(2);?>},
      type : 'POST',
      cache: false,
      success: function(msg){
        var polygon;
        var cords = [];
        var marker;

        var wilayah = new google.maps.LatLng(<?=$datanya->lat?>,<?=$datanya->long?>);
        var petaoption = {
          center: wilayah,
          zoom: 19,
          mapTypeId: "satellite",
        };

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

        for(i=0;i<msg.wilayah.lahan.length;i++){
          lokasi[i] = msg.wilayah.lahan[i].polygon;
          var str = lokasi[i].split("<br>"); 

          for (var j=0; j < str.length; j++) { 
            var point = str[j].split(",");
            cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
            console.log(point);
          }

          var ar = msg.wilayah.lahan[i].luas;

          polygon = new google.maps.Polygon({
            paths: [cords],
            strokeColor: '#FF5722',
            strokeOpacity: 3,
            strokeWeight: 1,
            fillColor:'#FF5722',
            fillOpacity: 0.5,
            editable : true
          }); 

          polygon.addListener('click', showArrays);
          infoWindows = new google.maps.InfoWindow;

          function showArrays(event) {
                    // Since this polygon has only one path, we can call getPath() to return the
                    // MVCArray of LatLngs.
                    var vertices = this.getPath();
                    var contentString = '';
                    // Iterate over the vertices.
                    for (var i =0; i < vertices.getLength(); i++) {
                      var xy = vertices.getAt(i);
                      contentString += xy.lat()+','+xy.lng()+ '<br>';
                    }
                    var h =  google.maps.geometry.spherical.computeArea(this.getPath()).toFixed(2);
                    var res = contentString.split("undefined");
                    var sli = res[0].slice(0, -4);
                    $('#polygonedit').val(sli);
                    $('#luasedit').val(h);
                    var hektar = h/10000;
                    $('#luaseditha').val(hektar.toFixed(2));

                    // Replace the info window's content and position.
                    infoWindows.setContent("Polygon Berhasil Dirubah");
                    infoWindows.setPosition(event.latLng);

                    infoWindows.open(map);
                  }


                  cords = []; 
                  polygon.setMap(map); 
                }               
              }
            });
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
     google.maps.event.addListener(drawingManager, 'polygoncomplete', function(poly) {

      poly.setEditable(true);
      var po = poly.getPath();

      for (var i =0; i < po.getLength(); i++) {
        var xy = po.getAt(i);
        contentString += xy.lat()+','+xy.lng()+ '<br>';
      }
      var res = contentString.split("undefined");
      var h =  res[1].slice(0, -1);
      var cordinate = h.replace(/\s/g, '');
      var area = google.maps.geometry.spherical.computeArea(poly.getPath().getArray()).toFixed(2);
      $('#polygonedit').val(cordinate);
      $('#luasedit').val(area);
      var hektar = area/10000;
      $('#luaseditha').val(hektar.toFixed(2));

      poly.getPaths().forEach(function(path, index){
        google.maps.event.addListener(path, 'set_at', function(){
                  // var coordinates = (poly.getPath().getArray());
                  // alert(coordinates);
                  for (var i =0; i < po.getLength(); i++) {
                    var xy = po.getAt(i);
                    contentString += xy.lat()+','+xy.lng()+ '<br>';
                  }

                  var area = google.maps.geometry.spherical.computeArea(poly.getPath().getArray()).toFixed(2);
                  var res = contentString.split("undefined");
                  var h =  res[1].slice(0, -1);
                  var cordinate = h.replace(/\s/g, '');
                  $('#polygonedit').val(cordinate);
                  $('#luasedit').val(area);
                  var hektar = area/10000;
                  $('#luaseditha').val(hektar.toFixed(2));
          // Point was moved
        });
      });

    });

     map = new google.maps.Map(document.getElementById('mapsnya',marker), {
       zoom: 18,
       center: {lat: <?=$datanya->lat?>, lng: <?=$datanya->long?>}
     });
     geocoder = new google.maps.Geocoder();
     var latlng = new google.maps.LatLng(<?=$datanya->lat?>, <?=$datanya->long?>);
     geocoder.geocode({'location': latlng}, function(results, status) {
      if (marker) {
        marker.setMap(null);
        if (infowindow) infowindow.close();
      }
      var mapOptions = {
        zoom: 18,
        center: latlng,
        mapTypeId: 'satellite',
      }
      var marker = new google.maps.Marker({
       position: latlng,
       map: map, 
     });
      infowindow.setContent(results[0].formatted_address);
      infowindow.open(map, marker);        
      google.maps.event.addListener(map, 'click', function() {
       infowindow.close();
     });

      var fx = results[0].formatted_address.split(',');
      $('hides').show();
      google.maps.event.addListener(marker, 'dragend', function(a) {
        geocodePosition(marker.getPosition());
        $('#latedit').val(a.latLng.lat());
        $('#longedit').val(a.latLng.lng());
        $('#alamatedit').val(results[0].formatted_address);
      });

      google.maps.event.addListener(marker, 'center_changed', function() {
        if (results[0].formatted_address) {
          infowindow.setContent(results[0].formatted_address + "<br>coordinates: " + marker.getPosition());
        }else {
          infowindow.setContent(location+ "<br>coordinates: " + marker.getPosition());
        }
        infowindow.open(map, marker);
      });
      google.maps.event.trigger(marker, 'center_changed');
    });

     drawingManager.setMap(map);
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
      infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
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
    $('#latedit').val(position.coords.latitude);
    $('#longedit').val(position.coords.longitude);
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

        $('#alamatedit').val(results[0].formatted_address);
        var fx = results[0].formatted_address.split(',');
        $('hides').show();
        google.maps.event.addListener(marker, 'dragend', function(a) {
          geocodePosition(marker.getPosition());
          $('#latedit').val(a.latLng.lat());
          $('#longedit').val(a.latLng.lng());
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

</script>