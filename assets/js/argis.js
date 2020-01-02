require([
  "esri/tasks/Locator",
  "esri/layers/TileLayer",
  "esri/Basemap",
  "esri/views/2d/draw/Draw",
  "esri/Map",
  "esri/views/MapView",
  "esri/symbols/SimpleMarkerSymbol",
  "esri/symbols/SimpleLineSymbol",
  "esri/Color",
  "esri/widgets/Locate",
  "esri/widgets/Search",
  "esri/Graphic",
  "esri/geometry/support/webMercatorUtils",
  "dojo/_base/array",
  "esri/geometry/Point",
  "esri/geometry/Polygon",
  "esri/geometry/geometryEngine",
  "esri/widgets/Sketch/SketchViewModel",
  "esri/layers/GraphicsLayer",
  "esri/geometry/geometryEngine",
  "dojo/domReady!",
  ], function(
    Locator,
    TileLayer, 
    Basemap,
    Draw,
    Map, 
    MapView,
    SimpleMarkerSymbol, 
    SimpleLineSymbol,
    Color,
    Locate,
    Search,
    Graphic,
    webMercatorUtils,
    arrayUtils,
    Point,
    Polygon,
    geometryEngine,
    SketchViewModel,
    GraphicsLayer,
    geometryEngine,
    ) {

    var locatorTask = new Locator({
      url: "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer"
    });

    var layer = new TileLayer({

      // url: "https://tataruang.jakarta.go.id/arcgis/rest/services/DCKTRP/CitraDKI2014Tile/MapServer"
      url: "https://jakartasatu.jakarta.go.id/server/rest/services/DCKTRP/Peta_Struktur_2018/MapServer"
    });

    var myBasemap = new Basemap({
      baseLayers: [layer],
      thumbnailUrl: "https://stamen-tiles.a.ssl.fastly.net/terrain/10/177/409.png",
      title: "Pusdatin",
      id: "myMap"
    });

    let editGraphic;
    const tempGraphicsLayer = new GraphicsLayer();

    var map = new Map({
      basemap: "hybrid",
      layers: [tempGraphicsLayer]
    });

    var view = new MapView({
      container: "viewDiv",
      map: map,
      center: [106.827130, -6.175876],
      zoom: 15
    });


 var searchWidget = new Search({
        view: view, 
      });

      view.ui.add(searchWidget, {
        position: "top-right",
        index: 2
      });
      
      searchWidget.on("select-result", function(event){
        view.graphics.removeAll();
        console.log(event);

        var lat = Math.round(event.result.feature.geometry.latitude * 1000000)/ 1000000;
        var lon = Math.round(event.result.feature.geometry.longitude * 1000000)/ 1000000;

        $("#long").val(lon);
        $("#lat").val(lat);

        view.popup.open({
          title: "Koordinat : [" + lat +" , "+ lon +" ] ",
          location : event.result.feature.geometry
        });

        locatorTask.locationToAddress(event.result.feature.geometry).then(function(response){
          view.popup.content = response.address;
          $("#alamat").val(response.address);
        }).catch(function(err) {
          view.popup.content =
          "Tidak ada lokasi yang ditemukan";
        });

        var point = {
          type: "point",
          longitude: lon ,
          latitude: lat
        };


        var makerSymbol = {
          type: "simple-marker",
          color: [226, 119, 40],
          outline:{
            color: [255, 255, 255],
            width: 2
          }
        };

        var pointGraphic = new Graphic({
          geometry: point,
          symbol: makerSymbol
        })

        view.graphics.add(pointGraphic);
      });
      // ------------------------------------------------------Ketika Klik dapat Lokasi
      view.on("click", function(event) {
        // event.stopPropagation(); 
        view.graphics.removeAll();

        
        var lat = Math.round(event.mapPoint.latitude * 1000000) / 1000000;
        var lon = Math.round(event.mapPoint.longitude * 1000000) / 1000000;

        document.getElementById("lat").value=lat;
        document.getElementById("long").value = lon;

        view.popup.open({
          title: "Koordinat [" + lat + ", " + lon + "]",
          location: event.mapPoint 
          
        });

        locatorTask.locationToAddress(event.mapPoint).then(function(
          response) {

          view.popup.content = response.address;
          document.getElementById("alamat").value=response.address;
        }).catch(function(err) {
          view.popup.content =
          "Tidak ada lokasi yang ditemukan";
        });


 //--------------------------------------------Drag Marker Dari Fahmi
 var points = [
 [lon, lat]
 ];


 var markerSymbol = {
  type: "simple-marker",
  color: [226, 119, 40],
  outline:{
    color: [255, 255, 255],
    width: 2
  }
};

arrayUtils.forEach(points, function(point) {
 var graphic = new Graphic(new Point(point), markerSymbol);

 view.graphics.add(graphic);
 view.hitTest(event).then(({ results }) => {
  const graphic = results[0].graphic;
  view.on("drag",(event) => {
            //console.log(event);
            event.stopPropagation();
            view.graphics.removeAll();
            const g = graphic.clone();
            const pt = view.toMap(event);
            g.geometry = pt;
            view.graphics.add(g);
            var mp = webMercatorUtils.webMercatorToGeographic(pt);
            console.log(pt);
            
            var lat = mp.y.toFixed(6);
            var lon =mp.x.toFixed(6);
            view.popup.open({

              title: "Koordinat: [" + lat + ", " + lon + "]",
              location: g.geometry 
            });
            $('#lat').val(lat);
            $('#long').val(lon);
            locatorTask.locationToAddress(g.geometry).then(function(
             response) {
              view.popup.content = response.address;
              $("#alamat").val(response.address);
            }).catch(function(err) {
              view.popup.content =
              "Tidak ada lokasi yang ditemukan";
            });
          });
});
});
});

//------------------------------------------------------------Buat Polygon
view.when(function() {
  const sketchViewModel = new SketchViewModel({
    view: view,
    layer: tempGraphicsLayer,

    polygonSymbol: {
      type: "simple-fill", 
      color: "rgba(138,43,226, 0.8)",
      style: "solid",
      outline: {
        color: "white",
        width: 1
      }
    }
  });

  setUpClickHandler();
  sketchViewModel.on("create-complete", addGraphic);
  sketchViewModel.on("update-complete", updateGraphic);
  sketchViewModel.on("update-cancel", updateGraphic);


  function addGraphic(event) {
    var content;
    const graphic = new Graphic({
      geometry: event.geometry,
      symbol: sketchViewModel.graphic.symbol
    });
         // Console ini sebenernya udh jadi Koordinat mas, tinggal masukin ke form aja 
         var jancok = event.geometry.rings;
         console.log(jancok);
          // Kita pecah dulu data polygonnya 
          jancok.forEach(function(array) {
            console.log(array);
          // Lalu Kita hitung panjang data poligonnya, untuk mengambil data array[0] sampai terakhir
          for (var i = 0; i < array.length; i++) {
            var ver = array;
            //Ini untuk misah data x dan y, secara manual
            content += ver[i][0]+','+ver[i][1]+'<br>';
          }
          // Karna di dalam kontent x dan y itu ada kata undifined maka saya potong kata undifined
          var res = content.split("undefined");
        // slice untuk menghapus koma(,) atau data  dalah array ke 1 atau di y
        var h =  res[1].slice(0, -1); 
        var hasil = h.replace(/\s/g, '');
        // untuk 
        $("#polygon").val(h);

        var area = geometryEngine.geodesicArea(geometryEngine.simplify(graphic.geometry), "hectares");
        var meter = geometryEngine.geodesicArea(geometryEngine.simplify(graphic.geometry), "square-meters");
        $("#meterpersegi").val(meter.toFixed(2));
        $("#hektar").val(area.toFixed(2));
      });

          // var res = contentString.split(",");

          // var potong = event.geometry.rings[1].split(',');

          // // var res = contentString.split("undefined");
          // // var h =  res[0].slice(0, -1);
          // console.log(potong);
        // var cordinate = h;
        // var area = google.maps.geometry.spherical.computeArea(poly.getPath().getArray());
        // $('#poly').val(cordinate);
        // $('#luas').val(area);

        tempGraphicsLayer.add(graphic);
        // kita buat id formnya di index namanya poli 




      }


      function updateGraphic(event) {
        event.graphic.geometry = event.geometry;
        tempGraphicsLayer.add(event.graphic);
        editGraphic = null;
      }


      function setUpClickHandler() {
        view.on("click", function(event) {
          view.hitTest(event).then(function(response) {
            var results = response.results;
            if (results.length && results[results.length - 1]
              .graphic) {
              if (!editGraphic) {
                editGraphic = results[results.length - 1].graphic;
                tempGraphicsLayer.remove(editGraphic);
                sketchViewModel.update(editGraphic);
              }
            }
          });
        });
      }
//---------------------------------------------------------------------------------- Tombol Polygon
var drawPolygonButton = document.getElementById("polygonButton");
drawPolygonButton.onclick = function() {
  view.graphics.removeAll();
  sketchViewModel.create("polygon");
  setActiveButton(this);
};     

       // ---------------------------------------------------------------------------Tombol Reset
       document.getElementById("resetBtn").onclick = function() {
        tempGraphicsLayer.removeAll();
        setActiveButton();
      };

      function setActiveButton(selectedButton) {
        view.focus();
        var elements = document.getElementsByClassName("active");
        for (var i = 0; i < elements.length; i++) {
          elements[i].classList.remove("active");
        }
        if (selectedButton) {
          selectedButton.classList.add("active");
        }
      }
    });
});